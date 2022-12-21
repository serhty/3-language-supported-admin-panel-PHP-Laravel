<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/admin/')}}/assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('public/admin/')}}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('public/admin/')}}/assets/css/app.css">
    <link rel="stylesheet" href="{{asset('public/admin/')}}/assets/css/pages/error.css">
</head>

<body>
    <div id="error">
        

<div class="error-page container">
    <div class="col-md-8 col-12 offset-md-2">
        <div class="text-center">
            <h1 class="error-title">Error</h1>
            <p class="fs-5 text-gray-600">Login Failed</p>
            <a href="{{route('admin.login')}}" class="btn btn-lg btn-outline-primary mt-3">Back to Home Page</a>
        </div>
    </div>
</div>


    </div>
</body>

</html>
