<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lists',
        'tasks'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
