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
<h2 style="text-align: center;">Scroll at end for solution</h2>

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

<h1 style="text-align: center;">Solution day 1 is total distance of: {{$sumDiff}}</h1>

</body>
</html>
