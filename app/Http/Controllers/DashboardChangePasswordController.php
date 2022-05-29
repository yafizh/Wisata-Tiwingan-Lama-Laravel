<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardChangePasswordController extends Controller
{
    public function index()
    {
        return view('dashboard.change_password.index');
    }

    public function change_password(Request $request)
    {
        if (Hash::check($request->get('old_password'), Auth::user()->password)) {
            if ($request->get('new_password') === $request->get('confirm_new_password'))
                User::where('id', Auth::user()->id)->update(['password' => bcrypt($request->get('new_password'))]);
            else return view('dashboard.change_password.index');
        } else return view('dashboard.change_password.index');
        return view('dashboard.change_password.index');
    }
}
