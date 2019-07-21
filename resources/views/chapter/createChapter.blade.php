@extends('layout')

@section('page_title')

    {{ 'Novel Heaven - Add Chapter' }}

@endsection

@section('content')
    <div class="container mainContainer shadow-sm p-3 mb-5 bg-white rounded">
        @include('includes.cmsNav')
    </div>

    <div class="container mainContainer shadow-sm p-3 mb-5 bg-white rounded">
        <h1>Add Chapter for -> {{ $novel->name }}</h1>

        <div class="createChapterContent shadow-lg p-3 mb-5 bg-white rounded">
            <form action="/novels/{{ $novel->slug }}/chapter" method="post">

                @csrf

                <div class="form-group">
                    <label for="chapter_name">Chapter Name</label>
                    <input type="text" class="form-control {{ $errors->has('chapter_name') ? ' is-invalid' : '' }}"
                           id="chapter_name" name="chapter_name" placeholder="Enter name">
                    @if ($errors->has('chapter_name'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('chapter_name') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="chapter_content">Chapter Content</label>
                    <textarea class="form-control {{ $errors->has('chapter_content') ? ' is-invalid' : '' }}"
                              name="chapter_content" id="chapter_content" cols="30" rows="10"
                              placeholder="Content here.."></textarea>
                    @if ($errors->has('chapter_content'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('chapter_content') }}</strong>
                    </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-outline-success formBtn">Add Chapter</button>
            </form>
        </div>
    </div>
@endsection