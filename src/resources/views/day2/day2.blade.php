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
<h2 style="text-align: center;">Solution day 2 is: {{$similarityScore}}</h2>

<h2 style="text-align: center;">Numbers Table 1</h2>
<table>
    <tbody>
    @foreach ($table1 as $row)
        <tr>
                <td>{{ $row }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<h2 style="text-align: center;">Numbers Table 2</h2>
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
