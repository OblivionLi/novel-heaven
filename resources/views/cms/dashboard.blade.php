@extends('layout')

@section('page_title')

    {{ 'Novel Heaven - CMS' }}

@endsection

@section('content')

    <div class="container mainContainer shadow-sm p-3 mb-5 bg-white rounded">

        @include('includes.cmsNav')

        <div class="row shadow-lg p-3 mb-5 bg-white rounded">
            <div class="col-lg">

                <div class="cmsCardTitle text-center">
                    Novels Notifications
                </div>

                <table class="table table-borderless table-hover" id="novelCMSTD">
                    <thead>
                    <tr class="trHeading">
                        <th>Novel Name</th>
                        <th>Modified by</th>
                        <th>Created At</th>
                        <th>Updated At</th>
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row shadow-lg p-3 mb-5 bg-white rounded">
            <div class="col-lg">
                <div class="cmsCardTitle text-center">
                    Users Notifications
                </div>
                <table class="table table-borderless table-hover" id="userCMSTD">
                    <thead>
                    <tr class="trHeading">
                        <th>Username</th>
                        <th>Email</th>
                        <th>Joined At</th>
                        <th>Updated At</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($user as $users)
                        <tr>
                            <td>
                                {{ $users->name }}
                            </td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->created_at->diffForHumans() }}
                                ({{ date('M.Y', strtotime($users->created_at)) }})
                            </td>
                            <td>{{ $users->updated_at->diffForHumans() }}
                                ({{ date('M.Y', strtotime($users->updated_at)) }})
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection