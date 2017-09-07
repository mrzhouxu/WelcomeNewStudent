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

    public function getCount(){
        $students = Student::select(['class', 'sex', 'status'])->get();


        $classs = $students->groupBy('class')->toArray();

        $counts = [];   //所有统计信息

        $sum['class'] = '总计';  // 总计数
        $sum['enrollment'] = $students->count();  //班级录取人数
        $sum['reportMen'] = 0;
        $sum['reportWomen'] = 0;
        $sum['noreportMen'] = 0;
        $sum['noreportWomen'] = 0;



        $i = 0;


        $report = [];
        foreach ($classs as $key => $class) {
            $counts[$i]['class'] = $key; //获取班级
            $classcol = collect($class);
            $counts[$i]['enrollment'] = $classcol->count(); //获取班级录取人数


            $counts[$i]['reportMen'] = $classcol->where('status',1)->where('sex','男')->count();$counts[$i]['reportWomen'] = $classcol->where('status',1)->where('sex','女')->count();
            $counts[$i]['noreportMen'] = $classcol->where('status',0)->where('sex','男')->count();
            $counts[$i]['noreportWomen'] = $classcol->where('status',0)->where('sex','女')->count();


            $sum['reportMen'] += $counts[$i]['reportMen'];
            $sum['reportWomen'] += $counts[$i]['reportWomen'];
            $sum['noreportMen'] += $counts[$i]['noreportMen'];
            $sum['noreportWomen'] += $counts[$i]['noreportWomen'];


            $i++;
        }

        $counts[$i] = $sum;
        return ($counts);
    }


    public function getNum(){
        $students = Student::select(['status'])->get();

        $reportNum = $students->where('status', 1)->count();
        $noReportNum = $students->where('status', 0)->count();

        return ['report' => $reportNum, 'noReport' => $noReportNum];
    }

	//根据用户id得到信息
	public function getInfo($id){
		//大小写问题
		$number = session('card_id');
		if(!empty($number)){
			$res = students::getInfo($id);
			 if(!empty($res)){
			 	if($res->card_id==$number){
			 		return json_encode([1,$res]);
			 	}else
			 		return json_encode([0,'没有权限访问']);
			} else
			 	return json_encode([0,'没有这个用户']);
		 }else{
		 	return json_encode([0,'请重新登录']);
		 }
	}
}