@extends('layout')

@section('page_title')

    {{ 'Novel Heaven - Edit Novel' }}

@endsection

@section('content')
    <div class="container mainContainer shadow-sm p-3 mb-5 bg-white rounded">
        @include('includes.cmsNav')
    </div>

    <div class="container mainContainer shadow-lg p-3 mb-5 bg-white rounded">
        <h1 class="editTitleSection">Update Novel -> <span class="editTitle">{{ $novel->name }}</span></h1>

        <div class="editNovelContent shadow-lg p-3 mb-5 bg-white rounded">
            <form action="/novels/{{ $novel->slug }}" method="post" enctype="multipart/form-data">

                @csrf
                @method('patch')

                <div class="form-group">
                    <label for="name">Novel Name:</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name"
                           name="name" value="{{ $novel->name }}">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                    @endif
                </div>

                <div class="form-group">
                    <p>Genre:</p>
                    @foreach($genres as $genre)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"
                                   {{ $novel->genres->contains('id', $genre->id) ? 'checked' : '' }} type="checkbox"
                                   id="{{ $genre->id }}" name="genres[]"
                                   value="{{ $genre->id }}">
                            <label class="form-check-label" for="{{ $genre->id }}">{{ $genre->genre_name }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="author">Author:</label>
                    <input type="text" class="form-control {{ $errors->has('author') ? ' is-invalid' : '' }}"
                           id="author"
                           name="author" value="{{ $novel->author }}">
                    @if ($errors->has('author'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('author') }}</strong>
                </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="date_release">Date Release:</label>
                    <input type="date" class="form-control {{ $errors->has('date_release') ? ' is-invalid' : '' }}"
                           name="date_release" id="date_release"
                           value="{{ $novel->date_release }}">
                    @if ($errors->has('date_release'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('date_release') }}</strong>
                </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="status">Novel status:</label>
                    <input type="text" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}"
                           name="status"
                           id="status" value="{{ $novel->status }}">
                    @if ($errors->has('status'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="translator">Novel Translator:</label>
                    <input type="text" class="form-control {{ $errors->has('translator') ? ' is-invalid' : '' }}"
                           name="translator" id="translator" value="{{ $novel->translator }}">
                    @if ($errors->has('translator'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('translator') }}</strong>
                </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="description">Novel Description:</label>
                    <textarea class="description form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
                              name="description" id="description" cols="" rows="10">
                {{ $novel->description }}
            </textarea>
                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="cover">Novel Picture <img class="coverPic" src="{{asset('storage/' . $novel->cover)}}"
                                                          alt="Cover Picture"></label>
                    <input type="file" class="form-control {{ $errors->has('cover') ? ' is-invalid' : '' }}"
                           name="cover"
                           id="cover" value="">
                    @if ($errors->has('cover'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('cover') }}</strong>
                </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-outline-success formBtn">Update Novel</button>
            </form>
        </div>
    </div>
@endsection