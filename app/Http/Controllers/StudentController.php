<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
   
    public function form(Request $request){

        if ($request->isMethod('get') && $request->id==null) {
            $data=student::all();
            return view('user',['data'=>$data]);
        }

        //insert
        if ($request->isMethod('post') && $request->uid==null) {
            $this->insert($request);
            return back();
        }

        //update
        if ($request->isMethod('post')) {
            $this->update($request); 
            return back();
        }

        //delete
        if ($request->isMethod('get')) {
            $this->delete($request);
            return back();
        }

    }

    public function insert($request){
        $user = new student();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
    }

    public function update($request){
        $user = student::findOrFail($request->uid);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
    }

    public function delete($request){
        student::find($request->id)->delete();
    }
}
