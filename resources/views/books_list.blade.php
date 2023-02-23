<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<h1>Books</h1>
@foreach ($books_list as $book)
    <p>{{$book->title}}</p>
    <p>{{$book->name}}</p>
    <p>{{$book->description}}</p>
    <br>
@endforeach
</body>
</html>
