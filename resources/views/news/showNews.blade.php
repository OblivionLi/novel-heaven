@extends('layout')

@section('page_title')

    {{ 'Novel Heaven - Read ' . $news->title }}

@endsection

@section('content')

    @include('includes.mainNavbar')
    <div class="container newsContainer shadow-sm p-3 mb-5 bg-white rounded">
        <div class="newsContent">
            @include('includes.sessionSuccess')

            <div class="newsTitle">
                {{ $news->title }}
            </div>

            <div class="newsCredentials">
                <p>
                    Written by <span class="userName">{{ $news->users['name'] }}</span>
                </p>


                {{--<p class="likesCount">
                    {{ $news->likes }}

                    @if($news->likes < 2)
                        reader
                    @elseif($news->likes > 1)
                        readers
                    @elseif($news->likes < 1)
                        readers
                    @endif

                    @if(Auth::check())
                        <a href="/news/like/{{ $news->id }}" class="likesHeart">

                            @if($like)
                                <i class="fa fa-heart"></i>
                            @else
                                <i class="far fa-heart"></i>
                            @endif
                        </a>
                    @else
                        <i class="fa fa-heart"></i>
                    @endif

                    this article.
                </p>--}}

                <p>
                    <span class="text-sm-left">Date created: {{ date('d-M-Y', strtotime($news->created_at)) }}</span>
                </p>
            </div>

            <div class="NewsArticle shadow-lg p-3 mb-5 bg-white rounded">
                <div class="newsBody container">
                    <p class="pre">
                        {{ $news->article }}
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
