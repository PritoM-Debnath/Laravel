<?php

namespace App\Repositories;

use App\Models\TeacherRecord;

trait TeacherRecordRepo
{
    public static function teacherRecords(){
        return teacherRecords::orderby('Name');
    }
}