<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Index;


class IndexController extends Controller
{
   function login(Request $request){
        $id_card = $request->id_card; 
        $result = Index::login($id_card);
        return json_encode($result);
   }

   function getInfo(Request $request){
       $id = $request->id;
       $result = Index::getInfo($id);
       return json_encode($result);
    }

    function updateInfo(Request $request){
        $stu_info = $request->stu_info;
        $result = Index::updateInfo($stu_info);
        if($result == 1){
            return json_encode(['status'=>1,'msg'=>"成功！"]);
        }else{
            return json_encode(['status'=>0,'msg'=>"失败！"]);
        }
    }
}
