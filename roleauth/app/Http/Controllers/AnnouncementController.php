<?php
// app/Http/Controllers/AnnouncementController.php
namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnnouncementController extends Controller
{
    // List for the logged-in user

    public function index(Request $request)
{
    $user = $request->user();

    $announcements = Announcement::query()
        ->where(function ($query) use ($user) {
            $query->whereNull('audience_type')
                  ->orWhere('audience_type', $user->role)
                  ->orWhere('audience_type', 'all'); // सबके लिए
        })
        ->orderByDesc('is_sticky')
        ->orderByDesc('starts_at')
        ->latest()
        ->get();

    $reads = DB::table('announcement_reads')
        ->where('user_id', $user->id)
        ->pluck('announcement_id')
        ->all();

    return view('announcements.index', compact('announcements', 'reads'));
}

    // Admin create
    public function store(Request $request) {
        $this->authorize('create', Announcement::class);

        $data = $request->validate([
            'title'         => 'required|string|max:150',
            'body'          => 'required|string',
            'audience_type' => 'required|in:all,admin,user',
            'targets'       => 'nullable|array',
            'targets.*'     => 'nullable',
            'starts_at'     => 'nullable|date',
            'ends_at'       => 'nullable|date|after_or_equal:starts_at',
            'is_sticky'     => 'boolean',
        ]);

        $data['created_by'] = $request->user()->id;

        Announcement::create($data);

        return back()->with('success','Announcement published');
    }

    // Mark as read
    public function markRead(Request $request, Announcement $announcement) {
        $user = $request->user();

        DB::table('announcement_reads')->updateOrInsert(
            ['announcement_id' => $announcement->id, 'user_id' => $user->id],
            ['read_at' => now(), 'updated_at' => now(), 'created_at' => now()]
        );

        return response()->json(['ok' => true]);
    }
}
