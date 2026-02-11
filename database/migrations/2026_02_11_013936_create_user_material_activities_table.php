<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_material_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('material_id')->constrained('course_materials')->cascadeOnDelete();
            $table->enum('activity_type', ['watch', 'complete']);
            $table->dateTime('activity_time');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_material_activities');
    }
};

