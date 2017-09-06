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
        return $result;
   }
}
