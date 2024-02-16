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
    public function image()
    {
        return $this->hasMany(Image::class);
    }
    public function tag()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    public function application()
    {
        return $this->hasMany(Application::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function contractor()
    {
        return $this->belongsTo(User::class);
    }
}
