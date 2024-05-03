<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;


class StudentController extends Controller
{

    // use of abstract class
    public function index(){
        $res=$this->testcase('hello');
        dd($res);
    }

    public function testcase($data)
    {
        return 'From abstratc => '.$data;
    }

    //end use of abstract class

    public function blog(){
        return 'hiii';
    }

    public function form(Request $request)
    {

        if ($request->isMethod('get') && $request->id == null) {
            $data = student::all();
            return view('user', ['data' => $data]);
        }

        //insert
        if ($request->isMethod('post')) {
            $this->insert($request);
            return back();
        }

        //update
        if ($request->isMethod('PUT')) {
            $this->update($request);
            return redirect()->route('form');
        }

        //delete
        if ($request->isMethod('get') && $request->id) {
            if (is_numeric($request->id)) {
                $this->delete($request);
                return back();
            } else {
                $data = $this->edit($request);
                return view('edit', ['data' => $data]);
            }
        }
    }


    public function insert($request)
    {
        $user = new student();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
    }

    public function edit($request)
    {
        $id = str_replace('edit-', '', $request->id);
        $data = student::findOrFail($id);
        return $data;
    }

    public function update($request)
    {
        $user = student::findOrFail($request->uid);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
    }

    public function delete($request)
    {
        student::find($request->id)->delete();
    }
}
