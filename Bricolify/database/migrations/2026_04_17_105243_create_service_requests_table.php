<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('assigned_worker_profile_id')
                ->nullable()
                ->constrained('worker_profiles')
                ->nullOnDelete();
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->dateTime('scheduled_date');
            $table->string('image_url')->nullable();
            $table->enum('status', [
                'pending',
                'accepted',
                'in_progress',
                'completed',
                'cancelled'
            ])->default('pending');
            $table->enum('cancelled_by_role', ['client', 'worker', 'admin'])->nullable();
            $table->text('cancel_reason')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
