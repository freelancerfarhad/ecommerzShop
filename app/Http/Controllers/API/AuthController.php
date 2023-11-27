<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller

{

    // done
public function loadRegister()
{
if(Auth::user()){
 $route = $this->redirectDash();
 return redirect($route);
 }
 return view('page.AuthPage.register');
}
public function loadLogin()
{
 if(Auth::user()){
     $route = $this->redirectDash();
     return redirect($route);
 }
 return view('page.AuthPage.login');
}
public function LoginPage(): View{
 return view('Page.AuthPage.login');
}
// done
public function register(Request $request)
{
$request->validate([
    'name' => 'string|required|min:2',
    'email' => 'string|email|required|max:100|unique:users',
    'password' =>'string|required|confirmed|min:6'
]);

$user = new User;
$user->name = $request->name;
$user->email = $request->email;
$user->password = Hash::make($request->password);
$user->save();

return back()->with('success','Your Registration has been successfull.');
}
// done

public function login(Request $request)
{
 $request->validate([
     'email' => 'string|required|email',
     'password' => 'string|required'
 ]);

 $userCredential = $request->only('email','password');
 if(Auth::attempt($userCredential)){

    $route = $this->redirectDash();
      return redirect($route);

 }
 else{
     return back()->with('error','Username & Password is incorrect');
 }
}
public function loadDashboard()
{
//    return view('user.dashboard');
 return ('page.AuthPage.users.dashboard');
}
//done
public function redirectDash()
{
    $redirect = '';

    if(Auth::user() && Auth::user()->role == 1){
        $redirect = '/super-admin/dashboard';
    }
    else if(Auth::user() && Auth::user()->role == 2){
        $redirect = '/vendor/dashboard';
    }
    else{
        $redirect = '/dashboard';
    }

    return $redirect;
}
public function logout(Request $request)
{
    $request->session()->flush();
    Auth::logout();
    return redirect('/');
}
}

