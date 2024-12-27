<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Marks</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .container {
            width: 60%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .total-section {
            margin-top: 20px;
        }
        .grade {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Marks for {{ $student->name }}</h1>
        <form method="POST" action="{{ route('student.saveMarks', $student->id) }}">
            @csrf
            <div class="form-group">
                <label for="marks[tamil]">Tamil</label>
                <input type="number" id="marks[tamil]" name="marks[tamil]" oninput="calculateTotal()" required>
            </div>
            <div class="form-group">
                <label for="marks[english]">English</label>
                <input type="number" id="marks[english]" name="marks[english]" oninput="calculateTotal()" required>
            </div>
            <div class="form-group">
                <label for="marks[social]">Social</label>
                <input type="number" id="marks[social]" name="marks[social]" oninput="calculateTotal()" required>
            </div>
            <div class="form-group">
                <label for="marks[science]">Science</label>
                <input type="number" id="marks[science]" name="marks[science]" oninput="calculateTotal()" required>
            </div>
            <div class="total-section">
                <label for="total">Total</label>
                <input type="text" id="total" name="total" readonly>
                <div class="grade">
                    <label for="grade">Grade</label>
                    <input type="text" id="grade" name="grade" readonly>
                </div>
            </div>
         <!--   <button type="button" onclick="calculateTotal()">Calculate Total</button> -->
            <button type="submit" style="background-color: #f95959;">Submit</button>
        </form>
    </div>
    <script>
        function calculateTotal() {
            const tamil = parseFloat(document.getElementById('marks[tamil]').value) || 0;
            const english = parseFloat(document.getElementById('marks[english]').value) || 0;
            const social = parseFloat(document.getElementById('marks[social]').value) || 0;
            const science = parseFloat(document.getElementById('marks[science]').value) || 0;

            const total = tamil + english + social + science;
            document.getElementById('total').value = total;

            let grade = '';
            if (total >= 360) grade = 'A';
            else if (total >= 320) grade = 'B';
            else if (total >= 280) grade = 'C';
            else if (total >= 240) grade = 'D';
            else grade = 'E';

            document.getElementById('grade').value = grade;
        }
    </script>
</body>
</html>
