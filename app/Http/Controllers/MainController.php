<?php

namespace App\Http\Controllers;

use App\Models\membershiptype;
use App\Models\User;
use App\Models\user_payment;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class MainController extends Controller
{
    //
    public function role(Request $request){
        // return "Boom";
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"],  ['name' => "Role Manager"]
        ];
        // $data = Role:all
        $data = Role::all();
        return view('admin.role.view-role', compact('data', 'breadcrumbs'));
    }
    public function RoleCreate(Request $request){
        // return $request;
        $validator = Validator::make($request->all(), [ // <---
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }
        $role = Role::create(['name' => $request->name]);
        return response()->json(['success' => 'Role has been Added']);
    }
    public function members(Request $request){
        // return "Boom";
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"],  ['name' => "Members"]
        ];
        // $data = Role:all
        // $data = Role::all();
        $data = User::where('role','members')->withTrashed()->get();
        return view('admin.member.member', compact('data', 'breadcrumbs'));
    }
    public function MembershipAdd(Request $request){
        return view('admin.member.ajax.add-membership');
    }
    public function EditMembershipForm(Request $request){
        $data = membershiptype::findorfail($request->id);
        return view('admin.member.ajax.edit-membership',compact('data'));
    }
    public function membership(Request $request){
        // return "Boom";
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"],  ['name' => "Members"]
        ];
        // $data = Role:all
        // $data = Role::all();
        $data = membershiptype::all();
        return view('admin.member.member-ship', compact('data', 'breadcrumbs'));
    }
    // 
    public function MembershipCreate(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [ // <---
            'name' => [
                'required',
                Rule::unique('membershiptypes')->ignore($request->post_id),
            ],
            'amount' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }
        $data = membershiptype::updateOrCreate(['id' => $request->post_id], [
        // $data = membershiptype::create([
            'name' => $request->name,
            'amount' => $request->amount,
        ]);
        // $role = Role::create(['name' => $request->name]);
        return response()->json(['success' => 'Membership has been Added']);
    }
    // 
    // 
    public function MemberCreate(Request $request)
    {
        // return  Carbon::createFromFormat('Y-m', Carbon::today())->toDateTimeString(); // 1975-05-21 22:00:00

        // return $request;
        $validator = Validator::make($request->all(), [ // <---
            
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'gender' => 'required',
            'contact' => 'required',
            'emergency_contact' => 'required',
            'cnic' => 'required',
            'membership_type' => 'required',
            'amount' => 'required',
            'advance_amount' => 'required',
            'joining_date' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }
        $password = $hashed_random_password = Str::random(12);

        $data = User::updateOrCreate(['id' => $request->post_id], [
        // $data = membershiptype::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->first_name .' '. $request->last_name,
            'email' => $request->email,
            'gender' => $request->gender,
            'contact' => $request->contact,
            'emergency_contact' => $request->emergency_contact,
            'cnic_no' => $request->cnic,
            'membership_type' => $request->membership_type,
            'amount' => $request->amount,
            'advance' => $request->advance_amount,
            'joining_date' => $request->joining_date,
            'address' => $request->address,
            'password' => $password,
            'role' => 'members',
        ]);
        $data->assignRole('members');
        $data2 = user_payment::create([
            'userid' => $data->id,
            'amount' => $request->amount,
            'month' => Carbon::today(),
            'payment_date' => Carbon::today(),
        ]);

        // $role = Role::create(['name' => $request->name]);
        return response()->json(['success' => 'Member has been Added']);
    }
    // 
    public function MembershipAmount(Request $request){
        $data = membershiptype::findorfail($request->id);
        return $data->amount;
    }
    // 
    public function DeleteMembershipForm(Request $request){
        // return $request;
        if($request->status == 1){
            $data = membershiptype::findorfail($request->id);
            $data->status = 1;
            $data->save();

            return "2";
        }else{
            $data = membershiptype::findorfail($request->id);
            $data->status = 0;
            $data->save();
            return "1";
        }
    }
    // 
    public function member_register(Request $request){
        $membership = membershiptype::where('status','1')->get();
        return view('admin.member.register',compact('membership'));
    }
    // 
    public function MemberPaymentDtl(Request $request){
        // return $request->id;
         $id = $request->id;
        return view('admin.member.member-dues',compact('id'));
    }
    public static function MemberPaymentName($id){
         $data = User::select('users.name')
        // ->LeftJoin(
        //     'user_payments',
        //     'user_payments.userid',
        //     'users.id'
        // )
        ->where('users.id',$id)
        ->first();
        echo $data->name;
    }
    public static function MemberPaymentCount($id,$month){
         $data = User::select('users.name', 'user_payments.month', 'users.id', 'user_payments.amount')
        ->Join(
            'user_payments',
            'user_payments.userid',
            'users.id'
        )
        ->where('users.id',$id)
        ->whereMonth('user_payments.month',$month)
        ->first();
        if($data){
            echo "Paid";
        }else{
            echo "Un Paid";
        }
        // return $data->amount;
    }
    public static function MemberPaymentAmount($id,$month){
         $data = User::select('user_payments.amount')
        ->Join(
            'user_payments',
            'user_payments.userid',
            'users.id'
        )
        ->where('users.id',$id)
        ->whereMonth('user_payments.month',$month)
        ->first();
        if($data){
            echo $data->amount;
        }else{
        echo "Not Paid yet";
        }
        // return $data->amount;
    }
}
