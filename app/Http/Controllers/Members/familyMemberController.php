<?php

namespace App\Http\Controllers\Members;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\family_member;

class familyMemberController extends Controller
{
    public function index(Request $req)
    {
        $family_member = family_member::leftJoin('users', 'family_members.user_id', '=', 'users.id')->select('family_members.*', 'users.name as employee_name')->where('user_id', $req->input('id'))->get();
        return view('Owner.Members.index', compact('family_member'));
    }

    public function add(Request $req)
    {
    	if($req->isMethod('post')){
    		$user = new Family_member;
            $user->user_id = $req->user_id;
            $user->name = $req->name;
            $user->relation = $req->relation;
            $user->dob = $req->dob;
            $user->blood_group = $req->blood_group;
            $user->age = $req->age;
            $user->sex = $req->gender;
            $user->save();
            
            return redirect('owner/employee/family/?id='.$req->user_id.'&type='.$req->input('type'))->with('success', 'Added successfully.');
    	}
    	$employee_id = User::where('user_type', $req->input('type'))->get();
    	return view('Owner.Members.add', compact('employee_id'));
    }
    public function edit(Request $req)
    {

        if($req->isMethod('post')){
            $params = ['user_id' => $req->input('id'),
            'name' => $req->name,
            'relation' => $req->relation,
            'dob' => $req->dob,
            'blood_group' => $req->blood_group,
            'age'=> $req->age,
            'sex' => $req->gender,
            ];
            $query = family_member::where('id', $req->input('member_id'))->update($params);
            return redirect('owner/employee/family/?id='.$req->input('id').'&type='.$req->type)->with('success', 'Updated successfully.');
        }
        $family_member = family_member::where('id', $req->member_id)->get();
        return view('Owner.Members.edit', compact('family_member'));
    }
    public function delete(Request $req)
    {
        $delete = family_member::where('id', $req->id)->delete();
        if($delete == true){
            $message = "Deleted successfully.";
            return $message;
        } 
    }

    
}
