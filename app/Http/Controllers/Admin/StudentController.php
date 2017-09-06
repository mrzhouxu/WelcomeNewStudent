<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use App\Model\students;

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
	//根据用户id得到信息
	public function getInfo($id){
		//大小写问题
		$number = '41152219990605515X';
		//if(!empty($number)){
			$res = students::getInfo($id);
			 if(!empty($res)){
			 	if($res->card_id==$number){
			 		return json_encode([1,$res]);
			 	}else
			 		return json_encode([0,'没有权限访问']);
			} else
			 	return json_encode([0,'没有这个用户']);
		 // }else{
		 // 	return json_encode([0,'请重新登录']);
		 // }
	}
}