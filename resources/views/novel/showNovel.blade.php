@extends('layout')

@section('page_title')

    {{ 'Novel Heaven - Novel ', $novel->name }}

@endsection

@section('content')
    @include('includes.mainNavbar')

    <div class="container mainContainer shadow-sm p-3 mb-5 bg-white rounded">
        <div class="row">
            <div class="col-md-8 novelName">
                <a href="/novels/{{ $novel->slug }}">{{ $novel->name }}</a>
            </div>

            <div class="col-md-4">
                <form action="/novels/{{ $novel->slug }}">
                    @csrf
                    @method('get')

                    <input type="search" name="search" class="form-control searchBar"
                           placeholder="Search by name..">
                </form>
            </div>
        </div>

        <div class="novelsContent">
            <div class="novelArticle shadow-lg p-3 mb-5 bg-white rounded">
                <div class="novel">
                    <div class="novelCover">
                        <img class="img-fluid" src="{{asset('storage/' . $novel->cover)}}"
                             alt="Cover Picture">
                    </div>

                    <div class="content">

                        <div class="novelDetails">
                            <p><span class="novelDet">Genre:</span>
                                @foreach($novel->genres->sortBy('genre_name') as $genre)
                                    <span class="novelDetailsS">
                                                        {{ $genre->genre_name }}
                                                     </span>
                                @endforeach
                            </p>
                        </div>

                        <div class="novelDetails">
                            <p><span class="novelDet">Author:</span>
                                <span>{{ $novel->author }}</span>
                            </p>
                        </div>

                        <div class="novelDetails">
                            <p><span class="novelDet">Status:</span>
                                <span class="novelDetailsS">{{ $novel->status }}</span>
                            </p>
                        </div>

                        <div class="novelDetails">
                            <p><span class="novelDet">Year release:</span>
                                <span class="novelDetailsS">{{ date('Y', strtotime($novel->date_release)) }}</span>
                            </p>
                        </div>

                        <div class="novelDetails">
                            <p><span class="novelDet">Translator:</span>
                                <span>{{ $novel->translator }}</span>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="novelDescriptionBig text-center">
                    <p class="normalDesc">
                        {{ $novel->description }}
                    </p>
                </div>

                <div class="novelDescriptionSmall text-center">
                    <p>
                        <a class="btn btn-outline-success" data-toggle="collapse"
                           href="#{{ $novel->slug }}" role="button" aria-expanded="false"
                           aria-controls="collapseExample">
                            Show Description
                        </a>
                    </p>
                    <div class="collapse" id="{{ $novel->slug }}">
                        <p class="normalDesc">
                            {{ $novel->description }}
                        </p>
                    </div>
                </div>

                @if($novel->chapters->count())
                    <div class="novelChaptersContent shadow-lg p-3 mb-5 bg-white rounded">
                        {{--<div class="row">
                            --}}{{--@foreach($novel->chapters as $chapter)
                                <div class="col-auto">
                                    <ul>
                                        <li>
                                            <a href="{{url("/novels/{$novel->slug}/chapter/{$chapter->slug}")}}">{{ $chapter->chapter_name }}</a>
                                            <span class="chapterDate">( {{ date('d-M-Y', strtotime($chapter->created_at)) }} )</span>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach--}}{{--

                        </div>--}}

                        <table class="table table-hover" id="chapterT">
                            <thead>
                            <tr class="trHeading">
                                <th>Novel Chapter Name</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($novel->chapters as $chapters)
                                <tr>
                                    <td>
                                        <a href="{{url("/novels/{$chapters->novels->slug}/chapter/{$chapters->slug}")}}"
                                           class="tableLinks">{{ $chapters->chapter_name }}</a>
                                    </td>

                                    <td>{{ $chapters->created_at->diffForHumans() }}
                                        ({{ date('M.Y', strtotime($chapters->created_at)) }})
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="chapterError shadow-lg p-3 mb-5 bg-white rounded">No chapters released YET,
                        <small>come back later.</small>
                    </p>
                @endif

            </div>
        </div>
    </div>
@endsection