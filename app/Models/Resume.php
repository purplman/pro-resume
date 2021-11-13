<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'template_id', 'profession', 'description'];

    public function experiences() {
        return $this->hasMany(Experience::class);
    }

    public function educations() {
        return $this->hasMany(Education::class);
    }

    public function languages() {
        return $this->hasMany(Language::class);
    }
    
    public function skills() {
        return $this->hasMany(Skill::class);
    }

    public function contact() {
        return $this->hasOne(Contact::class);
    }
}
