<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'contractor_id',
        'title',
        'text',
        'from',
        'until',
    ];
    // public function image()
    // {
    //     return $this->hasMany(Image::class);
    // }
    // public function ad_tag()
    // {
    //     return $this->hasMany(Ad_tag::class);
    // }
    public function tag()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
