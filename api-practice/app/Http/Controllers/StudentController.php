<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StudentService;

class StudentController extends Controller
{
    private $getStudents;
    private $getStudentById;
    private $getCreate;
    private $getDelete;
    private $getUpdate;

    public function __construct( StudentService $getStudents, StudentService $getStudentById, StudentService $getCreate, StudentService $getDelete, StudentService $getUpdate){
        $this->getStudents = $getStudents;
        $this->getStudentById = $getStudentById;
        $this->getCreate =$getCreate;
        $this->getDelete =$getDelete;
        $this->getUpdate =$getUpdate;
    }

    public function index(){
        try{
            $students = $this->getStudents->getStudents();

            return response()->json([
                'status' => true,
                'message' => 'Students data retrived',
                'data' => $students,
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => 'Failed to Students retrieved. Please try again later.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function StudentRecordByID(int $id){
        try{
            $student = $this->getStudentById->getStudentById($id);
            return response()->json([
                'status' => true,
                'message' => 'Students data retrived',
                'data' => $student,
            ], 200);            
        }
        catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => 'Failed to Students retrieved.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function create(Request $request){
        try{
            $validatedData = $request->validate([
                'Name'=>'required|string',
                'Tid'=>'required|integer'
            ]);
            $student = $this->getCreate->getCreate($validatedData);
            return response()->json([
                'status' => true,
                'message' => 'Student record created successfully.',
                'data' => $student
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => 'Operation Failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function delete(string $id){
        try{
            $student = $this->getDelete->getDelete($id);
            return response()->json([
                'status' => true,
                'message' => 'Student deleted ',
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to delete student record.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function update(Request $request, string $id)
    {
        try {
            $validatedData = $request->validate([
                'Name'=>'required|string',
                'Tid'=>'required|integer'
            ]);
    
            $studentRecord = $this->getUpdate->getUpdate($id, $validatedData);
    
            return response()->json([
                'status' => true,
                'message' => 'Student updated successfully.',
                'data' => $studentRecord,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Student update failed.',
                'data' => $e->getMessage(),
            ], 500);
        }
    }
}

