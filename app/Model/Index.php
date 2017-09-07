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
            $id = $result->id;
            if($result->phone_num && $result->family_num && $result->address && $result->wechat_id && $result->qq_id){
                return ['status'=>3,'msg'=>'成功！','id'=>$id];
            }
            return ['status'=>1,'msg'=>'成功！','id'=>$id];
        }else{
            return ['status'=>2,'msg'=>'身份证号码有误，请重新输入！'];
        }
    }

    /*
        得到学生信息
    */
    static function getInfo($id){
        $result = DB::table('students')
                    ->where('id',$id)
                    ->first();
        return $result;
    }

    /*
        更新学生信息
    */
    static function updateInfo($result){
        if($result['status'] == 0){
            $data = [
                'phone_num'=>$result['phone_num'],
                'family_num'=>$result['family_num'],
                'address'=>$result['address'],
                'wechat_id'=>$result['wechat_id'],
                'qq_id'=>$result['qq_id'],
                'created_at'=>time(),
                'status'=>1,
                'updated_at'=>time(),
            ];
        }else{
            $data = [
                'phone_num'=>$result['phone_num'],
                'family_num'=>$result['family_num'],
                'address'=>$result['address'],
                'wechat_id'=>$result['wechat_id'],
                'qq_id'=>$result['qq_id'],
                'updated_at'=>time(),
            ];
        }
        $result = DB::table('students')
                ->where('id',$result['id'])
                ->update($data);
        return $result;
    }
    
}