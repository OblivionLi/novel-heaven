@extends('layout')

@section('page_title')

    {{ 'Novel Heaven - CMS News' }}

@endsection

@section('content')

    <div class="container newsContainer shadow-sm p-3 mb-5 bg-white rounded">
        @include('includes.cmsNav')

        <div id="main">
            <div class="cmsTitle"><span class="cmsMenu" onclick="openNav()">&#9776;</span>
                News #in total
            </div>
        </div>
    </div>

    <div class="newsContainer shadow-sm p-3 mb-5 bg-white rounded">
        <div class="newsNot shadow-lg p-3 mb-5 bg-white rounded">
            <div class="cmsTitle">
                News Notifications
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Latest Updates</th>
                    <th scope="col">News Title</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Updated By</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Date Updated</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td class="tableTdLimitTitle"><a href="" class="tableLink">Article 1</a></td>
                    <td>admin</td>
                    <td>editor</td>
                    <td>*show tooltip*</td>
                    <td>10-10-2010</td>
                    <td>10-10-2010</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>
                        <a href="" class="tableLink">Article 1</a>
                    </td>
                    <td>admin</td>
                    <td>editor</td>
                    <td>*show tooltip*</td>
                    <td>10-10-2010</td>
                    <td>10-10-2010</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>
                        <a href="" class="tableLink">Article 1</a>
                    </td>
                    <td>admin</td>
                    <td>editor</td>
                    <td>*show tooltip*</td>
                    <td>10-10-2010</td>
                    <td>10-10-2010</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="shadow-lg p-3 mb-5 bg-white rounded text-center">
            <a href="" class="crudAddBut">Add News</a>
        </div>

        <div class="newsNot shadow-lg p-3 mb-5 bg-white rounded">
            <div class="cmsTitle">
                News CRUD
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Latest Added</th>
                    <th scope="col">News Title</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">U/D</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td class="tableTdLimitTitle">
                        <a href="" class="tableLink">Article 13: Memes exempt as EU backs controversial copyright
                            law</a>
                    </td>
                    <td>admin</td>
                    <td>10-10-2010</td>
                    <td>
                        <a href="" class="tableLink">Edit</a>
                        <a href="" class="tableLink">Delete</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>
                        <a href="" class="tableLink">Article 1</a>
                    </td>
                    <td>admin</td>
                    <td>10-10-2010</td>
                    <td>
                        <a href="" class="tableLink">Edit</a>
                        <a href="" class="tableLink">Delete</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>
                        <a href="" class="tableLink">Article 1</a>
                    </td>
                    <td>admin</td>
                    <td>10-10-2010</td>
                    <td>
                        <a href="" class="tableLink">Edit</a>
                        <a href="" class="tableLink">Delete</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection