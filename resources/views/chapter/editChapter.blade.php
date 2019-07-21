@extends('layout')

@section('page_title')

    {{ 'Novel Heaven - Update Chapter' }}

@endsection

@section('content')

    <div class="container mainContainer shadow-sm p-3 mb-5 bg-white rounded">
        @include('includes.cmsNav')
    </div>

    <div class="container mainContainer shadow-sm p-3 mb-5 bg-white rounded">
        <h1 class="editTitleSection">Update Chapter for <span class="editTitle">{{ $novel->name }}</span> -> <span class="editTitle">{{ $chapter->chapter_name }}</span></h1>

        <div class="editChapterContent shadow-lg p-3 mb-5 bg-white rounded">
            <form action="/novels/{{$novel->slug}}/chapter/{{$chapter->slug}}" method="post">

                @csrf
                @method('patch')

                <div class="form-group">
                    <label for="chapter_name">Chapter Name:</label>
                    <input type="text" class="form-control {{ $errors->has('chapter_name') ? ' is-invalid' : '' }}"
                           id="chapter_name" name="chapter_name" value="{{ $chapter->chapter_name }}">
                    @if ($errors->has('chapter_name'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('chapter_name') }}</strong>
                </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="chapter_content">Chapter Content:</label>
                    <textarea
                            class="description form-control {{ $errors->has('chapter_content') ? ' is-invalid' : '' }}"
                            name="chapter_content" id="chapter_content" cols=""
                            rows="10">{{ $chapter->chapter_content }}</textarea>
                    @if ($errors->has('chapter_content'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('chapter_content') }}</strong>
                </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-outline-success formBtn">Update Chapter</button>
            </form>
        </div>

    </div>

@endsection