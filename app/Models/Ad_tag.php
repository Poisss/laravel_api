<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad_tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'ad_id',
        'tag_id'
    ];
    // public function ad()
    // {
    //     return $this->belongsTo(Ad::class);
    // }
    // public function tag()
    // {
    //     return $this->belongsTo(Tag::class);
    // }
}
