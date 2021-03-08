<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use Auth;
use Hash;

class UserController extends Controller
{
    // show form login
    public function showLoginForm(){
        return view('login');
    }
    // check login
    public function checkLogin(Request $request){
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->input('username');
		$password = $request->input('password');
        if( Auth::attempt(['username' => $username, 'password' =>$password])) {
			return redirect()->route('home');
		} else {
            $err = 'Tài khoản hoặc mật khẩu không chính xác!';
			return view('login')->with(['err'=>$err]);
		}
    }
    // show form register
    public function showRegisterForm(){
        return view('register');
    }
    // add user
    public function storeUser(Request $request){
        $validated = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|unique:users',
            'address' => 'required',
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect()->route('login');
    }
    // delete customer
    public function destroyUser($id){
        $customer = Customer::destroy($id);
        return redirect()->route('show-list-user');
    }
    // logout
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    // edit user's password
    public function editPasswordUser()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('component.editPasswordUser')->with(['email'=>$user->email]);
    }
    // update user's password
    public function updatePasswordUser(Request $request)
    {   
        $hashedPassword = Auth::User()->password;
        $Oldpassword = $request->input('Oldpassword');
        if (Hash::check($Oldpassword, $hashedPassword)) {
            $validated = $request->validate([
                'password' => 'required',
                'password-confirmation' => 'required|same:password'
            ]); 
                $user = User::find(Auth::user()->id);
                $user->password = bcrypt($request->password);
                $user->save();
            return redirect()->route('home');
        }else {
            $validated = $request->validate(['Oldpassword' => 'required']);
            $err = 'Mật khẩu không chính xác';
            return view('component.editPasswordUser')->with(['err'=>$err,'email'=>(User::find(Auth::user()->id))->email]);
        }
        
    }
}
