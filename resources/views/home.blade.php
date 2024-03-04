<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body>
    <h1>{{ $heading }}</h1>

    <ul>
        @foreach($items as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>

    @if($condition)
        <p>The condition is true.</p>
    @else
        <p>The condition is false.</p>
    @endif

</body>
</html>
