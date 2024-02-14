<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    // public function ad_tag()
    // {
    //     return $this->hasMany(Ad_tag::class);
    // }
    public function ad()
    {
        return $this->belongsToMany(Ad::class)->withTimestamps();
    }
}
