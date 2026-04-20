<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Notification extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id', 'type', 'message',
        'notifiable_type', 'notifiable_id',
        'is_read', 'read_at',
    ];

    protected function casts(): array
    {
        return [
            'is_read'    => 'boolean',
            'read_at'    => 'datetime',
            'created_at' => 'datetime',
        ];
    }

    // --- Relationships ---
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function notifiable(): MorphTo
    {
        return $this->morphTo();
    }

    // --- Helpers ---
    public function markAsRead(): void
    {
        $this->update(['is_read' => true, 'read_at' => now()]);
    }
}
