<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'category_id', 'assigned_worker_profile_id',
        'title', 'description', 'location', 'scheduled_date',
        'image_url', 'status', 'cancelled_by_role',
        'cancel_reason', 'cancelled_at',
    ];

    protected function casts(): array
    {
        return [
            'scheduled_date' => 'datetime',
            'cancelled_at'   => 'datetime',
        ];
    }

    // --- Relationships ---
    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function assignedWorker(): BelongsTo
    {
        return $this->belongsTo(WorkerProfile::class, 'assigned_worker_profile_id');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }

    public function notifications(): MorphMany
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }

    // --- Helpers ---
    public function isPending(): bool   { return $this->status === 'pending'; }
    public function isCompleted(): bool { return $this->status === 'completed'; }
    public function isCancelled(): bool { return $this->status === 'cancelled'; }
}
