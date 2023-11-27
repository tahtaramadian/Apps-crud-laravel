<?php

namespace App\Http\Controllers;

use App\Models\tableUser;
use Illuminate\Http\Request;

class TableUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tblUser= tableUser::paginate(10);
        return response()->json([
            'data'=>$tblUser
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tblUser = tableUser::create([
            'user_id'=>$request->user_id,
            'namalengkap'=>$request->namalengkap,
            'username'=>$request->username,
            'password'=>$request->password,
            'status'=>$request->status

        ]);
        return response()->json([
            'data'=>$tblUser
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(tableUser $tableUser)
    {
        return response()->json([
            'data'=>$tableUser
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tableUser $tableUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tableUser $tableUser)
    {
        $tableUser->user_id =$request->user_id;
        $tableUser->namelengkap =$request->namalengkap;
        $tableUser->username =$request->username;
        $tableUser->password =$request->password;
        $tableUser->status =$request->status;

        $tableUser->save();

        return response()->json([
            'data'=> $tableUser
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tableUser $tableUser)
    {
        $tableUser->delete();
        return response()->json([
            'message'=> 'user deleted'
        ],204);
    }
}
