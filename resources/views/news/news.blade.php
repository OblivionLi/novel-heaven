@extends('layout')

@section('page_title')

    {{ 'Novel Heaven - News' }}

@endsection

@section('content')
    @include('includes.mainNavbar')

    <div class="container newsContainer shadow-sm p-3 mb-5 bg-white rounded">
        <div class="newsContent">
            @include('includes.sessionSuccess')
            <div class="row">
                @foreach($news as $newss)
                    <div class="col-md-6">
                        <div class="card text-center">
                            <div class="card-header">
                                Featured by <span class="articleCreatedBy">{{ $newss->users['name'] }}</span>
                            </div>
                            <div class="card-body">
                                <p class="card-title limitedN">{{ $newss->title }}</p>
                                <p class="card-text limitedP">{{ $newss->article }}</p>
                            </div>
                            <div class="card-footer text-muted">
                                <div class="row">
                                    <div class="col">
                                        <a href="/news/{{ $newss->slug }}" class="btn btn-outline-success">Go to
                                            article to see more...</a>
                                    </div>

                                    <div class="col">
                                        Posted: <span class="articlePostedAt">{{ $newss->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $news->appends(\Request::except('page'))->links() }}
        </div>
    </div>
@endsection