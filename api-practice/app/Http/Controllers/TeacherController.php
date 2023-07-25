<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    private $getTeachers;

    public function __constract(TeacherService $getTeachers){
        $this->getTeachers= $getTeachers;
    }

    public function index(){
        try
        {
            $teachers=$this->getTeachers->getTeachers();

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
}
