<?php /** @var \App\Models\User $user * */ ?>
@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Профиль</h4>
        </div>

        <form method="post" action="{{route('admin.profile.update.data',$user)}}" class="m-4">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    @include('admin.layouts.partials.inputs.default-input',['title'=>'Имя пользователя','name'=>'name','value'=>$user->name])
                </div>
            </div>
            @include('admin.layouts.partials.buttons.save')
        </form>

    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Изменение пароля</h4>
        </div>

        <form method="post" action="{{route('admin.profile.update.password',$user)}}" class="m-4">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-4">
                    @include('admin.layouts.partials.inputs.password-input',['title'=>'Старый пароль','name'=>'oldPassword'])
                </div>
                <div class="col-md-4">
                    @include('admin.layouts.partials.inputs.password-input',['title'=>'Новый пароль','name'=>'newPassword'])
                </div>
                <div class="col-md-4">
                    @include('admin.layouts.partials.inputs.password-input',['title'=>'Повторить новый пароль','name'=>'repeatNewPassword'])
                </div>
            </div>
            @include('admin.layouts.partials.buttons.save')
        </form>

    </div>
@endsection
