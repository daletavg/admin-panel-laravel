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
    public function index()
    {
        $data = $vars = [];
        $vars['user']= Auth::user();
        $this->setCardTitle('Редактирование профиля');
         $this->setContent(view('admin.profile.index',$vars));
        return $this->main();
    }

    public function updateUserData(UpdateUserDataRequest $request,User $user)
    {
        $user->update(['name'=>$request->name]);
        return redirect()->back()->with('success','Имя пользователя успешно обновлено!');
    }
    public function updateUserPassword(UpdateUserPasswordRequest $request, User $user)
    {
        $user->update(['password'=>Hash::make($request->newPassword)]);
        return redirect()->back()->with('success','Пароль успешно изменен!');
    }
}
