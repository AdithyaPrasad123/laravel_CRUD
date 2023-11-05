<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function register()
    {
        return view('register');
    }
    public function doregister(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'dob'=>'date',
            'place'=>'required',
        ]);
        Register::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'dob'=>$request->dob,
            'place'=>$request->place,
        ]);
        return redirect()->route('register')->with('success',"registered Successfully");
    }

    // first
    public function view()
    {
        $data=Register::all();
        return view('view',compact('data'));
    }

    public function edit($id)
    {
        $row=Register::find($id);
        return view('edit',compact('row'));
    }

    public function update(Request $request,$id)
    {
        $data=Register::find($id);
        $data->name=$request->input('name');
        $data->email=$request->input('email');
        $data->dob=$request->input('dob');
        $data->place=$request->input('place');
        $data->update();
        return redirect()->route('view')->with('success',"Updated Successfully");
    }
    public function delete($id)
    {
        $row=Register::find($id);
        if(!$row)
        {
            return redirect()->route('view')->with('error',"record not found");
        }
        $row->delete();
        return redirect()->route('view')->with('success',"Deleted Successfully");

    }




    // second
    // public function view()
    // {
    //     $data=Register::where('id',1)->first();
    //     return view('view',compact('data'));
    // }
    // third
    // public function view()
    // {
    //     $data=Register::select('name','email','dob','place')->distinct()->get();
    //     return view('view',compact('data'));
    // }
    // public function view()
    // {
    //     $data=Register::groupby('name')->get();
    //     return view('view',compact('data'));
    // }
}
