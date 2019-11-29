<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png">
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        Login
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/admin/material-dashboard.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/admin/admin-main.css') }}"/>
    <script src="{{asset( 'js/core/jquery.min.js') }}"></script>
</head>

<body id="login" class="">
<div class="wrapper ">
    <div class="main-panel login_panel">
        <div class="content d-flex flex-column justify-content-center">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title text-center">Авторизация</h4>
                                <!-- <p class="card-category">Complete your profile</p> -->
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.login.login') }}" class="form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                @if ($errors->has('username')) <p class="text-danger">{{ $errors->first('username') }}</p> @endif
                                                <label class="bmd-label-floating">Имя пользователя</label>
                                                <input type="username" class="form-control" name="username" value="{{ old('username') }}" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                @if ($errors->has('password')) <p class="text-danger">{{ $errors->first('password') }}</p> @endif
                                                <label class="bmd-label-floating">Пароль</label>
                                                <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">Запомнить</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button type="submit" class="btn btn-primary login_btn col-md-6">Авторизироватся</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--   Core JS Files   -->
<script src="{{ asset('js/core/jquery.min.js') }}"></script>
<script src="{{ asset('js/core/popper.min.js') }}"></script>
<script src="{{ asset('js/core/bootstrap-material-design.min.js') }}"></script>



</body>

</html>
