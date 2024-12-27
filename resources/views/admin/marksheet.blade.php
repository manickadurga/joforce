<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marksheet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 60%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Marksheet for {{ $student->name }}</h1>
        <table>
            <tr>
                <th>Subject</th>
                <th>Marks</th>
            </tr>
            <tr>
                <td>Tamil</td>
                <td>{{ $student->marks['tamil'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>English</td>
                <td>{{ $student->marks['english'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Social</td>
                <td>{{ $student->marks['social'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Science</td>
                <td>{{ $student->marks['science'] ?? 'N/A' }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
