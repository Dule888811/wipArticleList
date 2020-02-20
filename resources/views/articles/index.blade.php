@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
<form action="{{route('articles.list','title.val')}}" method="GET">
    <div class="form-input">
        <label for="title">title:</label>
        <select id="title" name="title">

            @foreach($articles as $article)
                <option  value="{{$article->id}}">{{$article->title}}</option>
            @endforeach
        </select>
        <input type="submit">
    </div>
</form>
@stop