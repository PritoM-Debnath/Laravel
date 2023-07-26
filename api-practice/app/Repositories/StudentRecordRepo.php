<?php

namespace App\Repositories;

use App\Models\StudentRecord;

trait StudentRecordRepo{
    public static function studentRecords(){
        return StudentRecord::orderby('Name');
    }
    public static function studentRecordByID(int $id): ?StudentRecord{
        return StudentRecord::find($id);
    }
    public static function Create(array $data): StudentRecord{
        //return StudentRecord::create($data);
        $StudentRecord = new StudentRecord($data);
        $StudentRecord->save();
        return $StudentRecord;
    }
    public static function deleteRecord(string $id){
        $student= StudentRecord::find($id);
        if(!$student){
            return false;
        }
        $student->delete($student);
        return $student;
    }
    public function updateRecord(string $id,array $data): bool
    {
        $studentRecord=StudentRecord::find($id);

        if(!$studentRecord)
        {
            return false;
        }

        $studentRecord->update($data);
        return true;
    }

}
