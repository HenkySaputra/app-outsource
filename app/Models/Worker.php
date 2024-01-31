<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $with = ['user', 'skill', 'education', 'experience', 'license'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function skill()
    {
        return $this->hasMany(Skill::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function experience()
    {
        return $this->hasMany(Experience::class);
    }

    public function license()
    {
        return $this->hasMany(License::class);
    }
}
