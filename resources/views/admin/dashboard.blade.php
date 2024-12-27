<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body  style="background-color:beige;">
    <div class="container">
        <h1>Admin Dashboard</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Add Student Button -->
        <div class="mb-3">
        <form action="{{ route('student.create') }}" method="GET" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-primary" style="background-color: #dc2f2f; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; font-size: 14px; cursor: pointer;">
        Add Student
        </button>
        </form>
        </div>

        <!-- Student List -->
        <h2>Student List</h2>
        @if ($students->isEmpty())
            <p>No records found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Roll No</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->rollno }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phoneno }}</td>
                            <td>
                                <!-- Edit Button -->
                            <form action="{{ route('student.edit', $student->id) }}" method="GET" style="display:inline;">
                                <button type="submit" class="btn btn-warning btn-sm" style="background-color:#5585b5;">Edit</button>
                            </form>

<!-- Add Marks Button -->
                            <form action="{{ route('student.addMarks', $student->id) }}" method="GET" style="display:inline;">
                                 <button type="submit" class="btn btn-success btn-sm" style="background-color:#53a8b6;">Add Marks</button>
                            </form>

<!-- Download Marksheet Button -->
                            <form action="{{ route('student.downloadMarksheet', $student->id) }}" method="GET" style="display:inline;">
                                    <button type="submit" class="btn btn-info btn-sm" style="background-color:#79c2d0;">Download Marksheet</button>
                            </form>

                                <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="background-color:#bbe4e9;" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger" style="background-color:#dc2f2f; color:white;" >Logout</button>
        </form>
    </div>
</body>
</html>
