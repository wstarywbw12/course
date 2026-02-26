<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beranda extends Model
{
    use HasFactory;

    protected $table = 'beranda';

    protected $fillable = [
        'hero_title',
        'hero_sub_title',
        'hero_image',
        'about_title',
        'about_sub_title',
        'material_title',
        'material_sub_title',
        'feature_title',
        'feature_sub_title',
        'feature_image',
        'testimonial_title',
        'testimonial_sub_title',
        'cta_title',
        'cta_sub_title',
        'footer_about',
        'footer_email',
        'footer_hp',
        'footer_website',
        'footer_cp',
    ];
}