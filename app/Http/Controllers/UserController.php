<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{

    public function userAuth(){
        // $user = auth()->guard('api')->user();
        // $user = auth()->user();
        // $user = Auth::id();
        $user = Auth::id();
        return $user;
        // return $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        try {
            $users = User::all();
            return $users;
        } catch (Exception $e) {
            $message = $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        try {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();

            $users = User::all();
            return response()->json(['users'=>$users,'user_added'=>$user,'status'=>'User added '], 200);
        } catch (Exception $e) {
            $message = $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::where('id', $id)->delete();
            $users = User::all();
            return response()->json(['users'=>$users,'status'=>'User deleted'], 200);
        } catch (Exception $e) {
            $message = $e->getMessage();
        }
    }
}
