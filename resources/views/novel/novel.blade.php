@extends('layout')

@section('page_title')

    {{ 'Novel Heaven - Novels' }}

@endsection

@section('content')
    @include('includes.mainNavbar')

    <div class="container mainContainer shadow-sm p-3 mb-5 bg-white rounded">
        <div class="novelsContent">
            <div class="row">
                <div class="col-md-6 filterNav">
                    {{--<form action="/novels" method="get">
                        @csrf
                        @method('get')

                        <ul id="tab-filter">
                            <li class="filterOpt" id="tab-filter-0"><a href="#" id="tab-0" class="filterLink">Recent
                                    Updates</a></li>
                            <li class="filterOpt" id="tab-filter-1"><a href="#" id="tab-1" class="filterLink">Recent
                                    Additions</a></li>
                            <li class="filterOpt" id="tab-filter-2"><a href="#" id="tab-2" class="filterLink">Most
                                    Popular</a></li>
                        </ul>

                        --}}{{--<select class="btn btn-outline-success btn-sm" name="basicSortBy" id="sortie"
                                onchange="this.form.submit();">
                            <option disabled selected>Sort By</option>
                            <span class="dropdown-divider"></span>
                            <option value="recentUpdates">Recent Updates</option>
                            <option value="recentAdditions">Recent Additions</option>
                            <option value="mostPopular">Most Popular</option>
                        </select>--}}{{--
                    </form>--}}

                    <ul id="tab-filter">
                        <li class="filterOpt">
                            <a href="/novel/filter" class="filterLink">Go to Novel Filter..</a>
                        </li>
                    </ul>
                </div>


                <div class="col-md-6">
                    <form action="/novels">
                        @csrf
                        @method('get')

                        <input type="search" name="search" class="form-control searchBar"
                               placeholder="Search by name..">
                    </form>
                </div>
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