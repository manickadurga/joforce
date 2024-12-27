<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body style="background-color:beige;">
    <div class="container text-center">
        <h1>Welcome</h1>
        <div class="btn-group" role="group">
        <form action="{{ route('admin.register') }}" method="GET" style="display:inline;">
                <button type="submit" class="btn btn-primary" style="background-color: #dc2f2f; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; font-size: 14px; cursor: pointer;">Admin Register</button>
            </form>
            <form action="{{ route('student.register') }}" method="GET" style="display:inline;">
                <button type="submit" class="btn btn-secondary" style="background-color: #79c2d0; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; font-size: 14px; cursor: pointer;">Student Register</button>
            </form>
            <form action="{{ route('admin.login') }}" method="GET" style="display:inline;">
                <button type="submit" class="btn btn-success" style="background-color: #dc2f2f; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; font-size: 14px; cursor: pointer;">Admin Login</button>
            </form>
            <form action="{{ route('student.login') }}" method="GET" style="display:inline;">
                <button type="submit" class="btn btn-info" style="background-color: #79c2d0; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; font-size: 14px; cursor: pointer;">Student Login</button>
            </form>
    </div>
</body>
</html>
