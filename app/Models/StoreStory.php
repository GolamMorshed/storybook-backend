<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class StoreStory extends Model
{
    use HasFactory;
    protected $table = "store_story";
    
    protected $fillable = [
        'user_id',
        'story_id',
        'page_number',
    ];
}
