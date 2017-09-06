<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Index extends Model
{
    /*
        输入身份证号登陆
    */
    static function login($id_card){
        $result = DB::table('students')
                    ->where('card_id',$id_card)
                    ->first();
        if($result){
            return json_encode(['status'=>1,'msg'=>'成功！']);
        }else{
            return json_encode(['status'=>2,'msg'=>'身份证号码有误，请重新输入！']);
        }
    }

}