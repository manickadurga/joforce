<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body  style="background-color:beige;">
    <div class="container">
        <h1>Student Dashboard</h1>
        <h2>Welcome, {{ $student->name }}</h2>
        <p>Email: {{ $student->email }}</p>
        <p>Roll No: {{ $student->rollno }}</p>
        <p>Phone No: {{ $student->phoneno }}</p>

        <h3>Marks</h3>
        <ul>
            @if (is_array($student->marks))
                @foreach ($student->marks as $subject => $mark)
                    <li>{{ ucfirst($subject) }}: {{ $mark }}</li>
                @endforeach
            @endif
        </ul>
        <p>Total Marks: {{ $student->total }}</p>
        <p>Grade: {{ $student->grade }}</p>

        <a href="{{ route('student.downloadMarksheet', $student->id) }}" class="btn btn-primary">Download Marksheet</a>
        <form action="{{ route('student.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger" style="background-color: #f95959;">Logout</button>
        </form>
     
    </div>
</body>
</html>

