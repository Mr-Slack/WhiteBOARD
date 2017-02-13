<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>{{ $article->title }}</h1>
    <hr>
    <p>{{ $article->body }}</p>
    <form action="/delete/{{ $article->id }}" method="article">
    {{ csrf_field() }}
    {{ method_field('delete') }}
    <input type="submit" value="Delete"> //←追加
    </form>
    @if(Session::get('flash_message'))
      <div>{{ session('flash_message') }}</div>
    @endif
    @foreach($articles as $article)
        <div>
            <p>{{ $article->title }}</p>
            <p>{{ $article->body }}</p>
        </div>
        <hr>
    @endforeach
  </body>
</html>
