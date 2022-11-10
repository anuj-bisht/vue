<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index(){
        $data= DB::table('users')->get();
        return response(['data'=>$data]);
    }


    public function insert(Request $request){
        // $request->validate([
        //     'name'=>'required',
        //     'title'=>'required'
        // ]);
        $data= DB::table('users')->insert(['name'=>$request->name,'title'=>$request->title]);
        return response(['data'=>$data]);
    }

    public function show(User $user){

        return $user;
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'title'=>'required'
        ]);
        $data= DB::table('users')->where('id',$id)->update(['name'=>$request->name,'title'=>$request->title]);
        return response(['data'=>$data]);
    }
    public function delete(Request $request,$id){

        $data= DB::table('users')->where('id',$id)->delete();
        return response(['data'=>$data]);
    }
}
