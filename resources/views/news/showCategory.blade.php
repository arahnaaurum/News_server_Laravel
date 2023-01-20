@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-8 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                {{$category['title']}}
            </h3>
            @foreach($category['newslist'] as $news)
                <div class="blog-post">
                    <h2 class="blog-post-title">{{ $news['title'] }}</h2>
                    <p class="blog-post-meta">{{ $news['created_at'] }} by <a href="#">{{ $news['author'] }}</a></p>
                    <p>{{ $news['description'] }}</p>
                    <a href="<?=route('news.show', ['id' => $news['id']])?>">Read full text</a>
                </div><!-- /.blog-post -->
            @endforeach
        </div><!-- /.blog-main -->
    </div><!-- /.row -->
@endsection
