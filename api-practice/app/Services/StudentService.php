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
}