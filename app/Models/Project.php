<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'ptoject_image','description','project_url','project_source_code', 'duration', 'start_date', 'end_date'];

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }
}
