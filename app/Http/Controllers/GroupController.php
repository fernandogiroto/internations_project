<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        try {
            $groups = Group::all();
        } catch (Exception $e) {
            $message = $e->getMessage();
        }
        return response()->json(['groups'=>$groups], 200);
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
            $group = new Group;
            $group->name = $request->name;
            $group->users = [];
            $group->save();
        } catch (Exception $e) {
            $message = $e->getMessage();
        }
        return response()->json(['group'=>$group,'group_added'=>$group,'status'=>'Group successfully added'], 200);
    }

    public function add_user_to_group(Request $request)
    {
        try {
            $group = Group::find($request->group_id);
            if (in_array($request->user_name, $group->users)) {
                return response()->json(['group'=>$group,'status'=>'User already belongs to the group'], 201);
            }else{
                $users = $group->users;
                array_push($users, $request->user_name);
                $group->users = $users;
                $group->save(); 
            }
        } catch (Exception $e) {
            $message = $e->getMessage();
        }
        return response()->json(['group'=>$group,'status'=>'User successfully added to the group'], 200);
    }

    public function edit_users_group(Request $request)
    {
        try {
            $group = Group::find($request->group_id);
            $users = $group->users;

            if (in_array($request->user_name, $users)) {
                if (($key = array_search($request->user_name, $users)) !== false) unset($users[$key]);
            }else{
                return response()->json(['group'=>$group,'status'=>'User not founded'], 201);
            }
            $group->users = $users;
            $group->save();
            return response()->json(['group'=>$group,'status'=>'User successfully removed to the group'], 200);

        }catch (Exception $e) {
            $message = $e->getMessage();
        }
    }

    public function get_users_group($group_id){
        try {
            $group = Group::find($group_id);
            $users = $group->users;
            return $users;
        }catch (Exception $e) {
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
            $group = Group::find($id);
            if(empty($group->users)){
                Group::where('id', $id)->delete();
                $groups = Group::all();
                return response()->json(['groups'=>$groups, 'status'=>'Group deleted'], 200);
            }else{
                $groups = Group::all();
                return response()->json(['groups'=>$groups, 'status'=>'There are users in this group. Remove them first and try again.'], 201);
            }
        } catch (Exception $e) {
            $message = $e->getMessage();
        }

    }
}
