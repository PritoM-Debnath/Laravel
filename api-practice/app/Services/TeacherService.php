<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\TeacherRecordRepo;
use App\Models\TeacherRecord;

class TeacherService{
    public function getTeachers(){
        return TeacherRecordRepo::teacherRecords()->get();
    }
}