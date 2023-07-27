<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\TeacherRecordRepo;
use App\Models\TeacherRecord;


class TeacherService{
    public function getTeachers(){ 
        return TeacherRecordRepo::teacherRecords()->get();
    }
    public function getTeachertById(int $id){
        return TeacherRecordRepo::teacherRecordByID($id);
    }
    public function storeTeacher(array $data){
        return TeacherRecordRepo::teacherStore($data);
    }
    public function destroyTeacher(int $id){
        return DB::transaction(function () use ($id){
            $teacher = TeacherRecordRepo::teacherRecordByID($id);
            if(!$teacher){
                return false;
            }
            $teacher->teacherDestroy($id);
            return $teacher;
        });
    }
}