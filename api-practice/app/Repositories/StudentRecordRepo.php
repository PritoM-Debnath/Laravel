<?php

namespace App\Repositories;

use App\Models\StudentRecord;

trait StudentRecordRepo{
    public static function StudentRecords(){
        return StudentRecord::orderby('Name');
    }
    public static function StudentRecordByID(int $id): ?StudentRecord{
        return StudentRecord::find($id);
    }
    public static function Create(array $data): StudentRecord{
        return StudentRecord::create($data);
    }
}
