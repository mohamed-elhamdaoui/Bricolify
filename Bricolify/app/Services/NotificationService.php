<?php

namespace App\Services;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Model;

class NotificationService
{
    public function sendNotification(int $userId, string $type, string $message, Model $notifiable): Notification
    {
        return Notification::create([
            'user_id'         => $userId,
            'type'            => $type,
            'message'         => $message,
            'notifiable_type' => get_class($notifiable),
            'notifiable_id'   => $notifiable->id,
            'is_read'         => false,
        ]);
    }

    public function markAsRead(Notification $notification): void
    {
        $notification->markAsRead();
    }

    public function markAllAsReadForUser(int $userId): void
    {
        Notification::where('user_id', $userId)
            ->where('is_read', false)
            ->update([
                'is_read' => true,
                'read_at' => now(),
            ]);
    }
}
