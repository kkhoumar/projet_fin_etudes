<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    //insertion d'un administrateur
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required'
        ]);

        $admin =Admin::where('email',$request->input('email'))->first();
        $password = Admin::where('password',$request->input('password'))->first();

     if($admin && $password)
     {
        return view('admin.dashboard')->with('status','connexion avec succès');

       
     }elseif($admin || $password){
        
        return back()->with('status','Le mot de passe ou l\'adresse email est incorrect');
     }
     else{
          return back()->with('status','vous ne pouvez pas ouvrir de session en tant qu’administrateur ');
     }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
