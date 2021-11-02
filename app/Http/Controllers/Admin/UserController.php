<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view("admin.users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate all data coming users
        $this->validate($request, [
            "name" => ["required", "string"],
            "email" => ["required", "string", "email", "unique:users"],
            "password" => ["required", "password", "confirmed"],
        ]);

        User::create([
            "name"      => $request->name,
            "email"     => $request->email,
            "password"  => Hash::make($request->password),
            "is_admin"  => 0,
        ]);

        return redirect()->route("users.index");

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
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    // Make admin
    public function makeAdmin($id){

        $user = User::find($id);

        if($user->is_admin == 0){

            $user->update([

                "is_admin" => 1

            ]);

        }

        return redirect()->back();
    }

    // Remove admin
    public function removeAdmin($id){

        $user = User::find($id);

        if($user->is_admin == 1){

            $user->update([

                "is_admin" => 0

            ]);

        }

        return redirect()->back();
    }

}
