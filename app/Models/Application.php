<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'ad_id',
        'user_id',
        'price',
        'marked',
    ];
    public function message()
    {
        return $this->hasMany(Message::class);
    }
    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
