<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = \App\Models\Admin::all();
        return view("admins.index", ['admins'=>$admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admins.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required','string','max:50'],
            'email' => ['required','string','max:50','email:rfc','unique:admins'],
            'password'=> ['required','confirmed','min:8'],
        ]);
        $admin = new Admin();
        $admin -> name = $request -> name;
        $admin -> email = $request -> email;
        $admin -> password = bcrypt($request->password);
        $admin->save();
        return redirect(route('admins.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        if($admin->id != \Auth::user()->id){
            return redirect(route('admins.index'));
        }
        return view('admins.edit',['admin'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {   
        $this->validate($request,[
            'name' => ['required','string','max:50'],
            'email' => ['required','string','max:50','email:rfc', Rule::unique('admins')->ignore($admin->id)],
            'password'=> ['required','confirmed','min:8'],
            
        ]);
        $admin -> name = $request -> name;
        $admin -> email = $request -> email;
        $admin -> password = bcrypt($request->password);
        $admin->save();
        return redirect(route('admins.index'));
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect('/login');
    }
}
