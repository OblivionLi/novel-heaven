@extends('layout')

@section('page_title')

    {{ 'Novel Heaven - Add News' }}

@endsection

@section('content')

    @include('includes.mainNavbar')

    <div class="container newsContainer shadow-sm p-3 mb-5 bg-white rounded">
        <h1>Add News</h1>

        <div class="createNewsContent shadow-lg p-3 mb-5 bg-white rounded">

            <form action="/news" method="post">

                @csrf
                @method('post')

                <div class="form-group">
                    <label for="name">Article Title:</label>
                    <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title"
                           name="title" placeholder="Enter name" value="{{ old('title') }}">
                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="description">Article Content:</label>
                    <textarea class="description form-control {{ $errors->has('article') ? ' is-invalid' : '' }}"
                              name="article"
                              id="description" cols="" rows="10"
                              placeholder="Article here..">{{ old('article') }}</textarea>
                    @if ($errors->has('article'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('article') }}</strong>
                </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-outline-success formBtn">Add Article</button>
            </form>
        </div>
    </div>

@endsection