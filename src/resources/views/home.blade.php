<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advent of Code</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold text-center mb-5">Advent of Code 2024</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        @foreach (range(1, 25) as $day)
            <a href="{{ url('/day' . $day) }}"
               class="block bg-blue-500 text-white text-center py-3 rounded shadow hover:bg-blue-600">
                Day {{ $day }}
            </a>
        @endforeach
    </div>
</div>
</body>
</html>
