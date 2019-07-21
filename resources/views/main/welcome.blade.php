@extends('layout')

@section('page_title')

    {{ 'Novel Heaven - Welcome' }}

@endsection

@section('content')
    @include('includes.mainNavbar')

    <div class="container mainContainer shadow-sm p-3 mb-5 bg-white rounded">
        @include('includes.sessionSuccess')
        <div class="aboutTitle">
            About Novel Heaven
        </div>

        <div class="aboutContent shadow-lg p-3 mb-5 bg-white rounded">
            <p>
                The website is made for people that want to read novels (the majority of them are light novels). You
                will
                find any genre you want and if you don't, then contact us and tell us your desired light novel/novel.
                The
                database contains all kinds of novel/light novels, from family/kids friendly to adult ones. We try to
                cover
                everything for everyone.
            </p>

            <div class="disclaimerContent shadow-lg p-3 mb-5 bg-white rounded">
                <small class="disclaimerSpan">Disclaimer:</small>
                <p>
                    Novel Heaven team's attention it's directed towards the consumer. They will listen your complains
                    and
                    try to
                    fix them as soon as possible. If you found a bug somewhere or a novel/light novel it's written
                    poorly or
                    misplaced, contact us in details and the team will make sure it will be fixed in no time.
                </p>

                <p>
                    If you think you can improve the website with your ideas, they are welcome and we expect them, then
                    we
                    will discuss between our team and decide if your idea should be implemented or not.
                    Also, have fun and a good reading !
                </p>
            </div>
        </div>
    </div>
@endsection