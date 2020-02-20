@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <a href="{{route('articles.create')}}">Create new article</a>
                <div></div>
                    <a href="{{route('articles.list')}}">All</a>
                        <div></div>
                        <a href="{{route('article')}}">Choose one article</a>
                        <div></div>
                        <a href="{{route('article.users')}}">Choose one article by author</a>
                </div>
            </div>

  
        </div>
    </div>
</div>

@endsection
