@extends('layout')

@section('page_title')

    {{ 'Novel Heaven - Novel Filter' }}

@endsection

@section('content')
    @include('includes.mainNavbar')

    <div class="container mainContainer shadow-sm p-3 mb-5 bg-white rounded">
        <div class="novelsContent">
            <div class="form shadow-lg p-3 mb-3 bg-white rounded">
                @include('includes.novelFilter')
            </div>

            <div class="novelArticle shadow-lg p-3 mb-5 bg-white rounded">
                @if($novels->isEmpty())
                    <p>Record/s not found.</p>
                @else
                    @foreach($novels as $novel)
                        <div class="novel">
                            <div class="novelCover">
                                <img class="img-fluid" src="{{asset('storage/' . $novel->cover)}}"
                                     alt="Cover Picture">
                            </div>

                            <div class="content">
                                <div class="novelName">
                                    <a href="/novels/{{ $novel->slug }}">{{ $novel->name }}</a>
                                </div>

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
                                    <p><span class="novelDet">Status:</span>
                                        <span class="novelDetailsS">{{ $novel->status }}</span>
                                    </p>
                                </div>

                                <div class="novelDetails">
                                    <p><span class="novelDet">Year release:</span>
                                        <span class="novelDetailsS">{{ date('Y', strtotime($novel->date_release)) }}</span>
                                    </p>
                                </div>

                                <div class="novelDescriptionBig">
                                    <p class="desc">
                                        {{ $novel->description }}
                                    </p>
                                </div>

                                <div class="novelDescriptionSmall">
                                    <p>
                                        <a class="btn btn-outline-success" data-toggle="collapse"
                                           href="#{{ $novel->slug }}" role="button" aria-expanded="false"
                                           aria-controls="collapseExample">
                                            Show Description
                                        </a>
                                    </p>
                                    <div class="collapse" id="{{ $novel->slug }}">
                                        <p class="desc">
                                            {{ $novel->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            {{ $novels->appends(\Request::except('page'))->links() }}
        </div>
    </div>

@endsection