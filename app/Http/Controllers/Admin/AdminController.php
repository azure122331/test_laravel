<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Hash;
use Validator;

class AdminController extends Controller
{
    //
    public function dashboard(){
        return view("admin.dashboard");
    }
    public function login(Request $request){
        if($request->isMethod("post")){
            $data=$request->all();
            $rules=[
                'email' => 'required|email|max:255',
                'password' => 'required|max:30',
            ];
            $customMessages=[
                'email.required'=>'Мэйл хаягаа бичнэ үү',
                'email.email'=>'Мэйл хаягаа зөв бичнэ үү',
                'password.required'=>'Нууц үгээ бичнэ үү',
            ];
            $this->validate($request, $rules,$customMessages);
            if(Auth::guard("admin")->attempt(["email"=>$data['email'],"password"=>$data['password']])){
                return redirect('admin/dashboard')->with('success','');
            }else{
                return redirect()->back()->with('login_error_message','Мэйл эсвэл нууц үг буруу.');
            }
        }
        return view("admin.login");
    }
    
    public function logout(){
        Auth::guard("admin")->logout();
        return redirect("admin/login");
    }
}
