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
<h2 style="text-align: center;">Solution day 4 part one, 'XMAS' matches found: {{$countMatchesPartOne}}</h2>
<h2 style="text-align: center;">Solution day 4 part two, 'XMAS' matches found: {{$countMatchesPartTwo}}</h2>


<div style="text-align: center;" >
    <a href="https://adventofcode.com/2024/day/4">Link Day 4 assignment</a>
</div>
<h2 style="text-align: center;">Searchable table</h2>
<table>
    <tbody>
    @foreach ($grid as $line)
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
