<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
    <meta name="robots" content="noindex" />
    <meta name="robots" content="nofollow" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/admin/')}}/assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('public/admin/')}}/assets/css/app.css">
    <link rel="stylesheet" href="{{asset('public/admin/')}}/assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="#">
                    <img src="{{asset('public/')}}/images/admin.png">
                </a>
            </div>
            <form method="post" action="{{route('admin.login_check')}}">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" placeholder="Username" name="username" id="username">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" placeholder="Password" name="password" id="password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Login</button>
            </form>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
</body>
</html>
