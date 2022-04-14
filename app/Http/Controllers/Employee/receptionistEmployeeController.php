<?php
namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\{family_member, receipt};
use File, Validator, PDF;
ini_set('max_execution_time', 180);

class receptionistEmployeeController extends Controller
{
    public function index(Request $req)
    {
        $user = User::where('user_type', $req->input('type'))->get();
        return view('Receptionist.Employee.index', compact('user'));
    }

    public function add(Request $req)
    {
        if($req->isMethod('post')){
            $rule = ['image' => "mimes:jpeg,jpg,png|max:2048"];
            $validator = Validator::make($req->all(), $rule);
           if($validator->fails()){
                $errors = $validator->errors()->first();
                return redirect()->back()->withErrors($errors);
            }else{
                $check_if_exist = User::where('mobile', $req->mobile)->count();
                if($check_if_exist == TRUE){
                    return redirect()->back()->withErrors(['Phone number already exists.']);
                }else{
                    $photo = "";
                    $fileModel = new File;
                    if($req->file()) {
                        $data = $req->input('image');
                        $photo = $req->file('image')->getClientOriginalName();
                        $destination = base_path() . '/public/user_asset/images';
                        $req->file('image')->move($destination, $photo);
                    }
                    
                    $user = new User;
                    $user->user_type = $req->input('type');;
                    /*$user->user_type = $req->input('type');*/
                    $user->name = $req->name;
                    $user->mobile = $req->mobile;
                    $user->email = $req->email;
                    $user->designation = $req->designation;
                    $user->division = $req->division;
                    $user->employee_id = $req->employee_id;
                    $user->dob = $req->dob;
                    $user->date_of_retirement = "$req->date_of_retirement";
                    $user->employee_address = $req->employee_address;
                    $user->family_member = "";
                    $user->image = $photo;
                    $user->ppo_no = $req->ppo_no;
                    $user->ward = $req->ward;
                    $user->cont_amt = $req->contribution_amt;
                    $user->age = $req->age;
                    $user->sex = $req->gender;
                    $user->password = base64_encode($req->password);
                    $user->employee_type = $req->employee_type;
                    $user->blood_group = $req->blood_group;
                    $user->save();
                    $url =$req->url;
                    if($req->input('type') == 1){
                        $url = 'employee';
                    }elseif($req->input('type') == 2){
                        $url = 'receptionist';
                    }else{
                        $url = 'doctor';
                    }
                    return redirect('receptionist_user/'.$url.'/?type='.$req->input('type'))->with('success', 'Added successfully.');
                }
            }
        }

        return view('Receptionist.Employee.add');
    }

    public function edit(Request $req)
    {
         if($req->isMethod('post')){
            $data = $req->input('image');
            $rule = ['image' => "mimes:jpeg,jpg,png|max:2048"];
            $validator = Validator::make($req->all(), $rule);
           if($validator->fails()){
                $errors = $validator->errors()->first();
                return redirect()->back()->withErrors($errors);
            }else{
                $photo = "";
                $fileModel = new File;
                if($req->file()) {
                    $data = $req->input('image');
                    $photo = $req->file('image')->getClientOriginalName();
                    $destination = base_path() . '/public/user_asset/images';
                    $req->file('image')->move($destination, $photo);
                    $params = ['name' => $req->name,
                    'mobile' => $req->mobile,
                    'email' => $req->email,
                    'designation' => $req->designation,
                    'division' => $req->division,
                    'employee_id' => $req->employee_id,
                    'dob' => $req->dob,
                    'age' => $req->age,
                    'sex' => $req->gender,
                    'date_of_retirement' => "$req->date_of_retirement",
                    'employee_address' => $req->employee_address,/*
                    'family_member' => $req->family_member,*/
                    'image' => $photo,
                    'ppo_no' => $req->ppo_no,
                    'ward' => $req->ward,
                    'cont_amt' => $req->contribution_amt,
                    'password' => base64_encode($req->password),
                    'employee_type' => $req->employee_type,
                    'blood_group' => $req->blood_group,
                    ];
                }else{
                    $params = ['name' => $req->name,
                    'mobile' => $req->mobile,
                    'email' => $req->email,
                    'designation' => $req->designation,
                    'division' => $req->division,
                    'employee_id' => $req->employee_id,
                    'dob' => $req->dob,
                    'age' => $req->age,
                    'sex' => $req->gender,
                    'ppo_no' => $req->ppo_no,
                    'ward' => $req->ward,
                    'cont_amt' => $req->contribution_amt,
                    'date_of_retirement' => "$req->date_of_retirement",
                    'employee_address' => $req->employee_address,
                    'password' => base64_encode($req->password),
                    'employee_type' => $req->employee_type,
                    'blood_group' => $req->blood_group,
                    ];
                }     
                
                $query = User::where('id', $req->id)->update($params);
                $check_if_receipt_exist = receipt::where('emp_id', $req->id)->where('family_id', NULL)->count();
                if(!empty($check_if_receipt_exist) && $check_if_receipt_exist !== 0){
                    $receipt = receipt::where('emp_id', $req->id)->where('family_id', NULL)->update(['patient_name' => $req->name]);
                }
                if($req->input('type') == 1){
                    $url = 'employee';
                }elseif($req->input('type') == 2){
                    $url = 'receptionist';
                }else{
                    $url = 'doctor';
                }
                return redirect('receptionist_user/'.$url.'/?type='.$req->type)->with('success', 'Updated successfully.');
            }
        }
        $user = User::where('id', $req->id)->get();
        return view('Receptionist.Employee.edit', compact('user'));
    }

    public function delete(Request $req)
    {
        $delete = User::where('id', $req->id)->delete();
        if($delete == true){
            $message = "Deleted successfully.";
            return $message;
        } 
    }

     public function card(Request $req)
    {
        
        $user = User::where('id', $req->id)->get();
        $family_member = family_member::where('user_id', $req->id)->count(); 
        return view('Receptionist.Employee.card', compact('user', 'family_member'));
    }
     public function generate_pdf(Request $req)
    {
      $user = User::where('id', $req->id)->get();
      $family_member = family_member::where('user_id', $req->id)->count(); 
      $pdf = new \Mpdf\Mpdf();
      $pdf = PDF::loadView('Receptionist.Employee.pdf', ['user' => $user, 'family_member' => $family_member]);
      return $pdf->download('card.pdf');
    }
     public function detail(Request $req)
    {
        $family_member = family_member::leftJoin('users', 'family_members.user_id', '=', 'users.id')->select('family_members.*', 'users.name as employee_name')->where('user_id', $req->input('id'))->get();
        $noOfMember = family_member::where('user_id', $req->input('id'))->count();
        $employee = User::where('id', $req->input('id'))->get();
        return view('Receptionist.Employee.detail', compact('family_member', 'employee', 'noOfMember'));
    }

}
