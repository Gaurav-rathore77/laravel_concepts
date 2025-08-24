<?php
use App\Models\User;
use App\Notifications\RoleChangedNotification;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function changeRole($id, $role)
    {
        $user = User::findOrFail($id);
        $user->role = $role;
        $user->save();

         Mail::to($user->email)->send(new WelcomeMail($user));
        $user->notify(new RoleChangedNotification($role));

         return response()->json(['message' => 'User registered successfully & email sent!']);
    }
}
