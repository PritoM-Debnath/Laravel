<?php

namespace App\Repositories;

use App\Models\TeacherRecord;

trait TeacherRecordRepo
{
    public static function teacherRecords(){
        return TeacherRecord::orderby('Name');
    }
    public static function teacherRecordByID(int $id): ?TeacherRecord{
        return TeacherRecord::find($id);
    }
    public static function teacherStore(array $data): TeacherRecord{
        //return StudentRecord::create($data);
        $teacher = new TeacherRecord($data);
        $teacher->save();
        return $teacher;
    }
    public static function teacherDestroy(string $id){
        $teacher= TeacherRecord::find($id);
        if(!$teacher){
            return false;
        }
        $teacher->delete($teacher);
        return $teacher;
    }
    public static function updateRecord(int $id, array $data){
        $teacher=TeacherRecord::find($id);
        if(!$teacher)
        {
            return false;
        }
        $teacher->update($data);
        return $teacher;
    }
}