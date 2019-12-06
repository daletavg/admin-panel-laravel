<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateUserDataRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $vars = [];
        $vars['user']= Auth::user();
        $this->setCardTitle(__('admin.profile.edit'));
        return view('admin.profile.index',$vars);
    }

    public function updateUserData(UpdateUserDataRequest $request,User $user)
    {
        $user->update(['name'=>$request->name]);
        return redirect()->back()->with('success',__('admin.row.edit_name'));
    }
    public function updateUserPassword(UpdateUserPasswordRequest $request, User $user)
    {
        $user->update(['password'=>Hash::make($request->newPassword)]);
        return redirect()->back()->with('success',__('admin.row.edit_password'));
    }
}
