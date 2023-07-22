<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\TeacherRecordRepo;

class TeacherRecord extends Model
{
    use HasFactory,TeacherRecordRepo;

    public function studentRecord(){
        return $this->hasone(StudentRecord::class);
    }

    protected $fillable = ['id','Name'];
}
