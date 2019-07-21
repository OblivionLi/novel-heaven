@extends('layout')

@section('page_title')

    {{ 'Novel Heaven - Chapter',  $chapter->chapter_name}}

@endsection

@section('content')
    @include('includes.mainNavbar')

    <div class="container mainContainer">
        <div class="chapterArticle shadow-lg p-3 mb-5 bg-white rounded">
            <div class="chapterPag shadow-lg p-3 mb-5 bg-white rounded text-center">

                <div class="shadow-sm p-3 mb-5 bg-white rounded novelName">
                    <a href="{{url("/novels/{$novel->slug}")}}" class="novelName"><h3>{{$novel->name}}</h3></a>

                    <div class="search text-center">
                        <form action="/novels/{{ $novel->slug }}">
                            @csrf
                            @method('get')

                            <input type="search" name="search" class="form-control searchBarC"
                                   placeholder="Search by name..">
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 btnRow">
                        @if($previousChapter)
                            <a href="{{url("/novels/{$novel->slug}/chapter/{$previousChapter->slug}")}}"
                               class="chapterBtn btn btn-outline-success">Previous</a>
                        @endif
                    </div>

                    <div class="col-md-4 btnRow">
                        <div class="btn-group chapterBtnO">
                            <button type="button"
                                    class="btn btn-outline-success">{{ $chapter->chapter_name }}</button>
                            <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                @foreach($novel->chapters as $chapters)
                                    <a class="dropdown-item"
                                       href="{{url("/novels/{$novel->slug}/chapter/{$chapters->slug}")}}">{{ $chapters->chapter_name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 btnRow">
                        @if($nextChapter)
                            <a href="{{url("/novels/{$novel->slug}/chapter/{$nextChapter->slug}")}}"
                               class="chapterBtn btn btn-outline-success">Next</a>
                        @endif
                    </div>
                </div>
            </div>

            @include('includes.sessionSuccess')

            <div class="chapterContent shadow-lg p-3 mb-5 bg-white rounded">
                <p class="pre">
                    {{ $chapter->chapter_content }}
                </p>
            </div>
        </div>
    </div>

@endsection