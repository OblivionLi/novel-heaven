@extends('layout')

@section('page_title')

    {{ 'Novel Heaven - Update User' }}

@endsection

@section('content')

    <div class="container newsContainer shadow-sm p-3 mb-5 bg-white rounded">
        @include('includes.cmsNav')
    </div>

    <div class="container newsContainer shadow-sm p-3 mb-5 bg-white rounded">
        <h1 class="editTitleSection">Update User <span class="editTitle">{{ $user->name }}</span></h1>

        <div class="editChapterContent shadow-lg p-3 mb-5 bg-white rounded">
            <form action="{{ route('users.update', $user) }}" method="post">

                @csrf
                @method('patch')

                <div class="form-group">
                    <label for="chapter_name">Name:</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                           id="name" name="name" value="{{ $user->name }}">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                    @endif
                </div>

                <div class="form-group">
                    <p>Role:</p>
                    @foreach($role as $roles)

                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input"
                                       {{ $user->roles->contains('id', $roles->id) ? 'checked' : '' }} type="radio"
                                       id="{{ $roles->id }}" name="role"
                                       value="{{ $roles->id }}">
                                <label class="form-check-label" for="{{ $roles->id }}">{{ $roles->name }}</label>
                            </label>
                        </div>

                        {{--<div class="form-check form-check-inline">
                            <input class="form-check-input"
                                   {{ $user->roles->contains('id', $roles->id) ? 'checked' : '' }} type="checkbox"
                                   id="{{ $roles->id }}" name="role"
                                   value="{{ $roles->id }}">
                            <label class="form-check-label" for="{{ $roles->id }}">{{ $roles->name }}</label>
                        </div>--}}
                    @endforeach
                </div>

                <button type="submit" class="btn btn-outline-success formBtn">Update User</button>
            </form>
        </div>

    </div>

@endsection