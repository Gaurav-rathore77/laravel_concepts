<?php
// app/Models/Announcement.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Announcement extends Model
{
    protected $fillable = [
        'title','body','audience_type','targets','starts_at','ends_at','is_sticky','created_by'
    ];

    protected $casts = [
        'targets'   => 'array',
        'starts_at' => 'datetime',
        'ends_at'   => 'datetime',
        'is_sticky' => 'boolean',
    ];

    public function creator(): BelongsTo {
        return $this->belongsTo(User::class, 'created_by');
    }

    /** Scope: currently active window */
    public function scopeActive(Builder $q): Builder {
        $now = now();
        return $q->where(function ($q) use ($now) {
            $q->whereNull('starts_at')->orWhere('starts_at','<=',$now);
        })->where(function ($q) use ($now) {
            $q->whereNull('ends_at')->orWhere('ends_at','>=',$now);
        });
    }

    /** Scope: visible for a given user (role or id match) */
 public function scopeForUser(Builder $q, User $user): Builder {
    return $q->where(function ($q) use ($user) {
        $q->where('audience_type', 'all')
          ->orWhere(function ($q) use ($user) {
              $q->where('audience_type', 'admin')
                ->whereJsonContains('targets', $user->role);
          })
         ->orWhere(function ($q) use ($user) {
    $q->where('audience_type', 'user')
  ->where(function($q) use ($user) {
      $q->whereNull('targets')
        ->orWhereJsonContains('targets', (int) $user->id);
  });

});

    });
}

}
