<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'classroom_id', 'nama_ortu'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
