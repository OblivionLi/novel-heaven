@extends('layout')

@section('page_title')

    {{ 'Novel Heaven - CMS Novels' }}

@endsection

@section('content')

    <div class="container mainContainer shadow-sm p-3 mb-5 bg-white rounded">
        @include('includes.cmsNav')
    </div>

    <div class="novelContainer shadow-sm p-3 mb-5 bg-white rounded">
        @include('includes.sessionSuccess')
        <div class="row">
            <div class="col-md-4 cmsTitle">
                Novels count: {{ count($novel) }}
            </div>

            <div class="col-md-6 shadow-lg p-3 mb-5 bg-white rounded text-center">
                <a href="/novels/create" class="crudAddBut">Add Novel</a>
            </div>
        </div>

        <div class="row shadow-lg p-3 mb-5 bg-white rounded">
            <div class="col-lg">
                <div class="cmsCardTitle text-center">
                    Novels Notifications
                </div>

                <table class="table table-hover" id="novelCMST">
                    @if($novel->isEmpty())
                        <p>There are no novels uploaded yet.</p>
                    @else
                        <thead>
                        <tr class="trHeading">
                            <th>Novel Name</th>
                            <th>Modified by</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Options</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($novel as $novels)
                            <tr>
                                <td><a href="/novels/{{ $novels->slug }}" target="_blank" class="tableLinks">{{ $novels->name }}</a></td>
                                <td>{{ $novels->users->name ?? '-' }}</td>
                                <td>{{ $novels->created_at->diffForHumans() }}
                                    ({{ date('M.Y', strtotime($novels->created_at)) }})
                                </td>
                                <td>{{ $novels->updated_at->diffForHumans() }}
                                    ({{ date('M.Y', strtotime($novels->updated_at)) }})
                                </td>
                                <td>
                                    <a href="/novels/{{ $novels->slug  }}/edit" class="tableLink">Edit</a>
                                    <form action="/novels/{{ $novels->slug  }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="tableLink deleteBut">Delete</button>
                                    </form>
                                    <a href="/novels/{{ $novels->slug }}/chapter/create" class="tableLink">Add
                                        Chapter</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>

    <div class="novelContainer shadow-sm p-3 mb-5 bg-white rounded">
        <div id="main">
            <div class="cmsTitle">
                Novels chapters count: {{ count($chapter)  }}
            </div>
        </div>

        <div class="row shadow-lg p-3 mb-5 bg-white rounded">
            <div class="col-lg">
                <div class="cmsCardTitle text-center">
                    Novels Chapter Notifications
                </div>
                <table class="table table-hover" id="chapterCMST">
                    @if($chapter->isEmpty())
                        <p>There are no chapters uploaded yet.</p>
                    @else
                        <thead>
                        <tr class="trHeading">
                            <th>Novel Name</th>
                            <th>Novel Chapter Name</th>
                            <th>Modified by</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($chapter as $chapters)
                            <tr>
                                <td>{{ $chapters->novels->name }}</td>
                                <td>
                                    <a href="{{url("/novels/{$chapters->novels->slug}/chapter/{$chapters->slug}")}}" target="_blank" class="tableLinks">{{ $chapters->chapter_name }}</a>
                                </td>
                                <td>{{ $chapters->users->name ?? '-' }}</td>
                                <td>{{ $chapters->created_at->diffForHumans() }}
                                    ({{ date('M.Y', strtotime($chapters->created_at)) }})
                                </td>
                                <td>{{ $chapters->updated_at->diffForHumans() }}
                                    ({{ date('M.Y', strtotime($chapters->updated_at)) }})
                                </td>
                                <td>
                                    <a href="/novels/{{ $chapters->novels->slug }}/chapter/{{ $chapters->slug }}/edit" class="tableLink">Edit</a>
                                    <form action="/novels/{{ $chapters->novels->slug }}/chapter/{{ $chapters->slug }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="tableLink deleteBut">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>

@endsection