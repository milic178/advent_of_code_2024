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
<h2 style="text-align: center;">Day 1 part one total distance of: {{$sumDiff}}</h2>
<h2 style="text-align: center;">Day 1 part two similarity score: {{$similarityScore}}</h2>
<div style="text-align: center;" >
    <a href="https://adventofcode.com/2024/day/1">Link Day 2 assignment</a>
</div>
<h1 style="text-align: center;">Numbers Table 1</h1>
<table>
    <tbody>
    @foreach ($table1 as $row)
        <tr>
                <td>{{ $row }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<h1 style="text-align: center;">Numbers Table 2</h1>
<table>
    <tbody>
    @foreach ($table2 as $row)
        <tr>
            <td>{{ $row }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
