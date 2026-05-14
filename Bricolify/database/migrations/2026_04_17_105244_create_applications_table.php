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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_request_id')->constrained()->cascadeOnDelete();
            $table->foreignId('worker_profile_id')->constrained()->cascadeOnDelete();
            $table->enum('status', [
                'pending',
                'accepted',
                'rejected',
                'cancelled'
            ])->default('pending');
            $table->text('cover_message')->nullable();
            $table->decimal('proposed_price', 10, 2)->nullable();
            $table->timestamps();

            $table->unique(['service_request_id', 'worker_profile_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
