<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TeacherService;


class TeacherController extends Controller
{
    private $teacher;

    public function __construct(TeacherService $teacher)
    {
        $this->teacher = $teacher;
    }
    public function index(){
        try
        {
            $teachers = $this->teacher->getTeachers();
            return response()->json([
                'status' => true,
                'message' => 'Teachers data retrived',
                'data' => $teachers,
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => 'Failed !!',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function show(int $id){
        try{
            $teacherRecord = $this->teacher->getTeachertById($id);
            return response()->json([
                'status' => true,
                'message' => 'Students data retrived',
                'data' => $teacherRecord,
            ], 200);            
        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function store(Request $request){
        try{
            $validatedData = $request->validate([
                'Name'=>'required|string'           
            ]);
            $teacherRecord = $this->teacher->storeTeacher($validatedData);
            return response()->json([
                'status' => true,
                'message' => 'Record created successfully.',
                'data' => $teacherRecord
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => 'Operation Failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function destroy(int $id){
        try{
            $teacherRecord = $this->teacher->destroyTeacher($id);
            return response()->json([
                'status' => true,
                'message' => 'Teacher deleted ',
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to delete record.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function edit(string $id)
    {
        try {
            $teacherRecord = $this->teacher->getTeachertById($id);
    
            if (!$teacherRecord) {
                return response()->json([
                    'status' => false,
                    'message' => 'Record not found.',
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Retrieve record for editing.',
                'data' => $teacherRecord,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve student record for editing. Please try again later.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function update(int $id,Request $request){
        try {
            $validatedData = $request->validate([
                'Name'=>'Required|string'
            ]);
    
            $teacherRecord = $this->teacher->putUpdate($id, $validatedData);
    
            return response()->json([
                'status' => true,
                'message' => 'Updated successfully.',
                'data' => $teacherRecord,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Update failed.',
                'data' => $e->getMessage(),
            ], 500);
        }
    }
}