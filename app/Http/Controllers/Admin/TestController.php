<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class TestController extends Controller
{
    public function login(Request $r){
        // 获取前端传的数据
        $user = $r->input('user');
        $pwd = $r->input('pwd');
        
        //状态码
        $code = 200;
        $t  = DB::table('user')->where('user',"$user");
        if($t->get()->count() !== 0){//在数据库有这个用户名
            $a = $t -> value('pwd');
            if($pwd == $a){
                return response()->json(['user'=>$user,'pwd'=>$pwd,'code'=>$code]);
            }
            return  response()->json(['code'=>500]);
        } 
        return response()->json(['code'=>404]);
    }
    public function tea(Request $r){
        //规定每页的数量
        $pagesize = 3;
        // $data = Tea::orderBy('成绩','desc')->paginate(10);
        $t = DB::table('tea')->limit($pagesize)->offset(($r -> query()['page'] -1) * $pagesize)->get();
        $num = DB::table('tea')->count();
        $yeshu = ceil($num / $pagesize);
        return response()->json([
            "result" => $t,
            "pageNum" => $yeshu
        ]);
    }
    
    public function register(Request $r) {
        // 获取前端传的数据
        $user = $r->input('user');
        $pwd = $r->input('pwd');
        $email = $r->input('email');
        $data = [
            'user' => $user,
            'pwd' => $pwd,
            'email' => $email,
            'level' => 2
        ];
         //状态码
        $code = 200;
        $t  = DB::table('user')->where('user',"$user");
        if($t->get()->count() !== 0){//在数据库有这个用户名
            return  response()->json(['code'=>500]);
        }else {
                DB::table('user')->insert($data);
                return  response()->json(['code'=>$code]);
            }
    }
    public function user(Request $r) {
        $t  = DB::table('user')->get();
        return $t;
    }    
    public function deleteUser(Request $r){
        $id = $r -> input('id');
        DB::table('user')->where('id', $id)->delete();
        $t  = DB::table('user')->get();
        return $t;
    }
    public function updateUser(Request $r){
        //获取前端数据
        $id = $r -> input('id');
        $user= $r -> input('user');
        $pwd = $r -> input('pwd');
        $email = $r -> input('email');
        // $data = ['user'=>$user,'pwd'=>$pwd,'email'=>$email];
        DB::table('user')->where(['id' => $id])->update(['pwd'=>555]);
        // dd(DB::table('user')->where('id', $id)->update($data));
        $t  = DB::table('user')->get();
        return $t;
    }
    public function deleteCommodity(Request $r){
        $id = $r -> input('id');
        DB::table('tea')->where('id', $id)->delete();
        $t  = DB::table('tea')->get();
        return $t;
    }
    public function updateCommodity(Request $r){
        //获取前端数据
        $id = $r -> input('id');
        $name= $r -> input('name');
        $oldprice = $r -> input('oldprice');
        $newprice = $r -> input('newprice');
        $img = $r -> input('img');
        DB::table('tea')->where('id', $id)->update(['name'=>$name,'oldprice'=>$oldprice,'newprice'=>$newprice,'img' => $img]);
        $t  = DB::table('tea')->get();
        return $t;
    }

    public function commodity(Request $r) {
        $t  = DB::table('tea')->get();
        return $t;
    }  
    public function indent(Request $r){
        //获取前端数据
        $user = $r -> input('user');
        $name= $r -> input('name');
        $newprice = $r -> input('newprice');
        $num = $r -> input('num');
        $data = [
            'user' => $user,
            'name' => $name,
            'newprice' => $newprice,
            'num' => $num
        ];
        DB::table('indent')->insert($data);
    }
    public function getIndent()
    {
        $t  = DB::table('indent')->get();
        return $t;
    }
}
