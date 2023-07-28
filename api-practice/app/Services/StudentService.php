<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\StudentRecordRepo;
use App\Models\StudentRecord;

class StudentService
{
    public function getStudents(){
        return StudentRecordRepo::StudentRecords()->get();
    }
    public function getStudentById(int $id){
        return StudentRecordRepo::StudentRecordByID($id);
    }
    public function getCreate(array $data){
        return StudentRecordRepo::Create($data);
    }
    public function getDelete(int $id){
        return DB::transaction(function () use ($id){
            $student = StudentRecordRepo::StudentRecordByID($id);
            if(!$student){
                return false;
            }
            $student->deleteRecord($id);
            return $student;
        });
    }
    public function getUpdate(string $id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $studentRecord = StudentRecordRepo::StudentRecordByID($id);

            if (!$studentRecord) {
                return null;
            }
            $studentRecord->updateRecord($id, $data);

            return $studentRecord;
        });
    }
}