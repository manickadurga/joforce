@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Student</h1>

        <form action="{{ route('student.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $student->name) }}" required>
            </div>

            <div class="form-group">
                <label for="rollno">Roll No:</label>
                <input type="text" class="form-control" id="rollno" name="rollno" value="{{ old('rollno', $student->rollno) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $student->email) }}" required>
            </div>

            <div class="form-group">
                <label for="phoneno">Phone No:</label>
                <input type="text" class="form-control" id="phoneno" name="phoneno" value="{{ old('phoneno', $student->phoneno) }}" required>
            </div>

            <button type="submit" class="btn btn-primary" style="background-color: #dc2f2f; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; font-size: 14px; cursor: pointer;">Update</button>
            <form action="{{ route('admin.dashboard') }}" method="GET" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-secondary" style="background-color: #303841; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; margin:5px; font-size: 14px; cursor: pointer;">
            Cancel
            </button>
            </form>

        </form>
    </div>
@endsection

