<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\student;

class mark extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->hasOne(student::class,'id','sid');
    }
}
