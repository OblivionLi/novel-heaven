@extends('layout')

@section('page_title')

    {{ 'Novel Heaven - Add Genre' }}

@endsection

@section('content')
    @include('includes.mainNavbar')

    <div class="container mainContainer shadow-sm p-3 mb-5 bg-white rounded">
        <form action="/genre" method="post" id="genresForm">
            @csrf
            @method('post')


            <div class="form-group">
                <label for="genres">Genre:</label>
                <input class="form-control" type="text" name="genre[]" id="genres" placeholder="Type genre here.."><br>
                <div class="row">
                    <div class="col">
                        <input class="form-control plusG btn-outline-success" type="button" value="+"
                               onClick="addInput();">
                    </div>

                    <div class="col">
                        <button type="submit" class="btn btn-outline-success formBtn">Add Genre/s</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="genres">
            <h3>All existing genres at the moment: </h3>
            @foreach($genres as $genre)
                <h5 class="d-inline-block">{{ $genre->genre_name }} <span>/</span></h5>
            @endforeach
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.mdb-select').materialSelect();
        });

        function addInput() {
            var newdiv = document.createElement('div');
            //newdiv.id = dynamicInput[counter];
            newdiv.innerHTML =
                "<div class='row'>" +
                "<div class='col-md-6'>" +
                "Another Genre: <br>" +
                "<input type='text' class='form-control' name='genre[]' placeholder='Type another genre here..'> " +
                "<br>" +
                "<input type='button' class='form-control minusG btn-outline-success float-right' value='-' onClick='removeInput(this);'>" +
                "</div>" +
                "</div>" +
                "<br>";
            document.getElementById('genresForm').appendChild(newdiv);
        }

        function removeInput(btn) {
            btn.parentNode.remove();
        }
    </script>
@endsection