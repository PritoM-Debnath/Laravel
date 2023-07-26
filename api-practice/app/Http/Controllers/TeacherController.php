<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TeacherService;


class TeacherController extends Controller
{
    private $tec;

    public function __construct(TeacherService $tec)
    {
        $this->tec = $tec;
    }
    public function index(){
        try
        {
            $teachers = $this->tec->getTeachers();
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