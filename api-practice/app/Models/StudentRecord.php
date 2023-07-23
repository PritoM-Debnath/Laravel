<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\StudentRecordRepo;

class StudentRecord extends Model
{
    use HasFactory, StudentRecordRepo;

    // many2one
    public function teacherRecord(){
        return $this->belongsTo(TeacherRecord::class);
    }

    protected $fillable = ['id','Name', 'Tid'];
}
