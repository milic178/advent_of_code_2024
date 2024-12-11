<!DOCTYPE html>
<html>
<head>
    <title>Numbers Table</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
<h2 style="text-align: center;">Solution day 2 is safe reports: {{$safeReportsCount}}</h2>
<div style="text-align: center;" >
    <a href="https://adventofcode.com/2024/day/2">Link Day 2 assignment</a>
</div>
<h2 style="text-align: center;">Data</h2>
<table>
    <tbody>
    @foreach ($data as $line)
        <tr>

        @foreach($line as $value)
                <td>{{ $value }}</td>
        @endforeach
        </tr>

    @endforeach
    </tbody>
</table>

</body>
</html>
