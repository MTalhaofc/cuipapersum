<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PastPaperImage;

class PastPaper extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'coursecode',
        'teachers',
        'department',
        'subject'
        
    ];
    public function images()
{
    return $this->hasMany(PastPaperImage::class);
}
}
