<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct() {
      $this->middleware('guest:admin')->except('logout');
    }
    public function showLoginForm() {
      return view('admin.admin-login');
    }

    public function login(Request $request) {
      // validate data
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6',
      ]);

      // attemp login
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if success
        return redirect()->intended(route('admin-dashboard'));
      }

      return redirect()->back()->withInput($request->only('email', 'password'));
    }

    public function logout()
    {
      Auth::guard('admin')->logout();
      return redirect('/');
    }
}
