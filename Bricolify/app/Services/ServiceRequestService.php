<?php

namespace App\Services;

use App\Models\ServiceRequest;
use App\Models\Notification;
use Illuminate\Support\Facades\Storage;

class ServiceRequestService
{
    public function createRequest($clientId, $categoryId, $title, $description, $location, $scheduledDate, $image)
    {
        $imageUrl = null;
        if ($image) {
            $imageUrl = $image->store('requests', 'public');
        }

        $request = ServiceRequest::create([
            'client_id'      => $clientId,
            'category_id'    => $categoryId,
            'title'          => $title,
            'description'    => $description,
            'location'       => $location,
            'scheduled_date' => $scheduledDate,
            'image_url'      => $imageUrl,
            'status'         => 'pending',
        ]);

        Notification::create([
            'user_id'         => $clientId,
            'type'            => 'Request Published',
            'message'         => 'Your request "' . $request->title . '" has been published. You will receive quotes soon.',
            'notifiable_type' => ServiceRequest::class,
            'notifiable_id'   => $request->id,
        ]);

        return $request;
    }

    public function cancelRequest(ServiceRequest $serviceRequest, $role, $reason)
    {
        $serviceRequest->update([
            'status'            => 'cancelled',
            'cancelled_by_role' => $role,
            'cancel_reason'     => $reason,
            'cancelled_at'      => now(),
        ]);
    }

    public function updateStatus(ServiceRequest $serviceRequest, $newStatus, $updatedBy = 'system')
    {
        $allowedTransitions = [
            'accepted'    => 'in_progress',
            'in_progress' => 'completed'
        ];

        if (!isset($serviceRequest->status) || !isset($allowedTransitions[$serviceRequest->status]) || $allowedTransitions[$serviceRequest->status] !== $newStatus) {
            return back()->with('error', "Cannot change request status from {$serviceRequest->status} to {$newStatus}.");
        }

        $serviceRequest->update(['status' => $newStatus]);

        $statusLabel = str_replace('_', ' ', $newStatus);

        // Notify client
        Notification::create([
            'user_id'         => $serviceRequest->client_id,
            'type'            => 'Mission Status Updated',
            'message'         => 'Your mission "' . $serviceRequest->title . '" is now ' . $statusLabel . '.',
            'notifiable_type' => ServiceRequest::class,
            'notifiable_id'   => $serviceRequest->id,
            'is_read'         => false,
        ]);

        // Notify assigned worker if exists
        if ($serviceRequest->assigned_worker_profile_id) {
            $worker = \App\Models\WorkerProfile::find($serviceRequest->assigned_worker_profile_id);
            if ($worker) {
                Notification::create([
                    'user_id'         => $worker->user_id,
                    'type'            => 'Mission Status Updated',
                    'message'         => 'Mission "' . $serviceRequest->title . '" is now ' . $statusLabel . '.',
                    'notifiable_type' => ServiceRequest::class,
                    'notifiable_id'   => $serviceRequest->id,
                    'is_read'         => false,
                ]);
            }
        }
    }

    public function updateRequest(ServiceRequest $serviceRequest, $categoryId, $title, $description, $location, $scheduledDate, $image)
    {
        $imageUrl = $serviceRequest->image_url;
        
        if ($image) {
            if ($imageUrl) {
                Storage::disk('public')->delete($imageUrl);
            }
            $imageUrl = $image->store('requests', 'public');
        }

        $serviceRequest->update([
            'category_id'    => $categoryId,
            'title'          => $title,
            'description'    => $description,
            'location'       => $location,
            'scheduled_date' => $scheduledDate,
            'image_url'      => $imageUrl,
        ]);

        return $serviceRequest;
    }

    public function deleteRequest(ServiceRequest $serviceRequest)
    {
        if ($serviceRequest->image_url) {
            Storage::disk('public')->delete($serviceRequest->image_url);
        }

        $serviceRequest->notifications()->delete();
        $serviceRequest->delete();
    }
}
