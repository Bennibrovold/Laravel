<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body> 

    @foreach ($tasks as $task)

    <a>{{ $task->body }} This is a link</a>

    @endforeach
</body>
</html>