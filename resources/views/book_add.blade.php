<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<h2>Send Book</h2>
@if($success)
    <p>Sent successfully</p>
@endif
@if($errors !== null)
    @foreach($errors as $error)
        <p class="error">{{$error}}</p>
    @endforeach
@endif
<form method="POST" action="{{route('book_post')}}">
    @csrf
    <div>
        <label>Title</label>
        <input class="form-control" name="title" type="text"
               value="{{request()->isMethod('post') ? old('title') : ''}}"/>
    </div>
    <br>
    <div>
        <label>Description</label>
        <textarea class="form-control" name="description" maxlength="100"
                  rows="5">{{request()->isMethod('post') ? old('description') : ''}}</textarea>
    </div>
    <br>
    <div>
        <label>Page count</label>
        <input class="form-control" name="page_count" type="integer"
               value="{{request()->isMethod('post') ? old('page_count') : ''}}"/>
    </div>
    <br>
    <div>
        <label>Author Id</label>
        <input class="form-control" name="author_id" type="integer"
               value="{{request()->isMethod('post') ? old('author_id') : ''}}"/>
    </div>
    <br>
    <input type="submit">
</form>
</body>

</html>
