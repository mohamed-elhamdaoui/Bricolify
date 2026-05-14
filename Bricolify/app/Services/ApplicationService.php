<?php

namespace App\Services;

use App\Models\Application;
use App\Models\Notification;
use App\Models\ServiceRequest;

class ApplicationService
{
    public function submitApplication($serviceRequestId, $workerProfileId)
    {
        $exists = Application::where('service_request_id', $serviceRequestId)
            ->where('worker_profile_id', $workerProfileId)
            ->exists();

        if ($exists) {
            return back()->with('error', 'You have already applied for this request.');
        }

        $application = Application::create([
            'service_request_id' => $serviceRequestId,
            'worker_profile_id'  => $workerProfileId,
            'cover_message'      => null,
            'status'             => 'pending',
        ]);

        $serviceRequest = ServiceRequest::find($serviceRequestId);
        $workerProfile = $application->workerProfile;

        Notification::create([
            'user_id'         => $serviceRequest->client_id,
            'type'            => 'New Application',
            'message'         => $workerProfile->user->name . ' has applied to your request "' . $serviceRequest->title . '".',
            'notifiable_type' => Application::class,
            'notifiable_id'   => $application->id,
            'is_read'         => false,
        ]);

        return $application;
    }

    public function acceptApplication(Application $application)
    {
        $serviceRequest = $application->serviceRequest;

        if (!$serviceRequest->isPending()) {
            return back()->with('error', 'This request is no longer available.');
        }

        $application->update(['status' => 'accepted']);

        Application::where('service_request_id', $serviceRequest->id)
            ->where('id', '!=', $application->id)
            ->update(['status' => 'rejected']);

        $serviceRequest->update([
            'assigned_worker_profile_id' => $application->worker_profile_id,
            'status'                     => 'accepted',
        ]);

        Notification::create([
            'user_id'         => $application->workerProfile->user_id,
            'type'            => 'Application Accepted',
            'message'         => 'Congratulations! Your application for "' . $serviceRequest->title . '" has been accepted. You can now start working on the job.',
            'notifiable_type' => Application::class,
            'notifiable_id'   => $application->id,
            'is_read'         => false,
        ]);
    }

    public function cancelApplication(Application $application)
    {
        if (!$application->isPending()) {
            return back()->with('error', 'You can only cancel pending applications.');
        }

        $application->update(['status' => 'cancelled']);
    }

    public function refuseApplication(Application $application)
    {
        if (!$application->isPending()) {
            return back()->with('error', 'You can only refuse pending applications.');
        }

        $application->update(['status' => 'rejected']);
    }

    public function updateApplication(Application $application)
    {
        if (!$application->isPending()) {
            return back()->with('error', 'You can only edit pending applications.');
        }

        $application->update([
            'cover_message'  => null,
        ]);
    }
}
