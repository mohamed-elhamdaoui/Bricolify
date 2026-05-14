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
        Schema::create('worker_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->text('bio')->nullable();
            $table->integer('experience_years')->default(0);
            $table->decimal('rating_average', 3, 2)->default(0.00);
            $table->integer('rating_count')->default(0);
            $table->enum('status', ['pending', 'active', 'suspended'])->default('pending');
            $table->boolean('is_validated')->default(false);
            $table->timestamp('validated_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worker_profiles');
    }
};
