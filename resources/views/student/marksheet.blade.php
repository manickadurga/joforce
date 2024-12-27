<!DOCTYPE html>
<html>
<head>
    <title>Marksheet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .marks-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .marks-table th, .marks-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .marks-table th {
            background-color: #f2f2f2;
        }
        .total, .grade {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Marksheet</h1>
            <p>Student: {{ $student->name }}</p>
            <p>Roll No: {{ $student->rollno }}</p>
        </div>

        <table class="marks-table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Marks</th>
                </tr>
            </thead>
            <tbody>
                @foreach($marks as $subject => $mark)
                    <tr>
                        <td>{{ ucfirst($subject) }}</td>
                        <td>{{ $mark }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p class="total">Total: {{ $total }}</p>
        <p class="grade">Grade: {{ $grade }}</p>
    </div>
</body>
</html>
