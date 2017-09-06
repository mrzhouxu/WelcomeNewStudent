<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Student;

class StudentController extends Controller
{
    public function index(){
        return view('index');
    }

    public function count(){
        $this->validate(request(), [
            'status' => 'required|numeric',
            'page' => 'required|numeric',
        ]);

        $status = request('status');
        $page = request('page');

        $students = Student::select(['name','class', 'sex'])->where('status', '=', $status)->skip($page * 50)->take(50)->get();

        return $students;
    }
}