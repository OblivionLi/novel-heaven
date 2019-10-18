@extends('layout')

@section('page_title')

    {{ 'Novel Heaven - CMS Users' }}

@endsection

@section('content')

    <div class="container mainContainer shadow-sm p-3 mb-5 bg-white rounded">
        @include('includes.cmsNav')
    </div>

    <div class="mainContainer shadow-sm p-3 mb-5 bg-white rounded">
        @include('includes.sessionSuccess')
        <div id="main">
            <div class="cmsTitle">
                Users count: {{ count($user) }}
            </div>
        </div>

        <div class="userContainer row shadow-lg p-3 mb-5 bg-white rounded">
            <div class="col-lg">
                <div class="cmsCardTitle text-center">
                    User Notifications
                </div>
                <table class="table table-hover" id="userCMST">
                    @if($user->isEmpty())
                        <p>There are no users registered yet.</p>
                    @else
                        <thead>
                        <tr class="trHeading">
                            <th>Username</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Options</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($user as $users)
                            <tr>
                                <td>{{ $users->name }}</td>
                                @foreach($users->roles as $role)
                                    <td>{{ $role->name }}</td>
                                @endforeach
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->created_at->diffForHumans() }}
                                    ({{ date('M.Y', strtotime($users->created_at)) }})
                                </td>
                                <td>{{ $users->updated_at->diffForHumans() }}
                                    ({{ date('M.Y', strtotime($users->updated_at)) }})
                                </td>
                                <td>
                                    @if(Auth::user()->isModerator())
                                        @if($users->isAdmin())
                                            <p>You can't edit an administrator.</p>
                                        @else
                                            <a href="{{ route('users.edit', $users->id) }}" class="tableLink">Edit</a>
                                            {{-- <form action="{{ route('users.delete', $users->id) }}" method="post">
                                                 @csrf
                                                 @method('DELETE')
                                                 <button class="tableLink deleteBut">Delete</button>
                                             </form>--}}

                                        @endif
                                    @else
                                        <p>You don't have permission to access this.</p>
                                    @endif
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
