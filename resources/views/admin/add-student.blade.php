<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Add Student</h1>
        <form method="POST" action="{{ route('student.store') }}">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="rollno">Roll No</label>
                <input type="text" id="rollno" name="rollno" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <label for="phoneno">Phone No</label>
                <input type="text" id="phoneno" name="phoneno" required>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
