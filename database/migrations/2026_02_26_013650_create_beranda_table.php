<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('beranda', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title')->nullable();
            $table->string('hero_sub_title')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('about_title')->nullable();
            $table->string('about_sub_title')->nullable();
            $table->string('material_title')->nullable();
            $table->string('material_sub_title')->nullable();
            $table->string('feature_title')->nullable();
            $table->string('feature_sub_title')->nullable();
            $table->string('feature_image')->nullable();
            $table->string('testimonial_title')->nullable();
            $table->string('testimonial_sub_title')->nullable();
            $table->string('cta_title')->nullable();
            $table->string('cta_sub_title')->nullable();
            $table->string('footer_about')->nullable();
            $table->string('footer_email')->nullable();
            $table->string('footer_hp')->nullable();
            $table->string('footer_website')->nullable();
            $table->string('footer_cp')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beranda');
    }
};