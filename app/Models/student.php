<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\teacher;

class student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'gender',
        'rep_teacher'
    ];

    public function teacher()
    {
        return $this->hasOne(teacher::class,'id','rep_teacher');
    }
}
