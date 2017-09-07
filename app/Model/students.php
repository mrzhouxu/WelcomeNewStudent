<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
	public static function getInfo($id){
		$res = students::find($id);
		return $res;
	}
}
