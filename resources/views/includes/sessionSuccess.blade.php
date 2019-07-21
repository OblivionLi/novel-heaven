@if(Session::has('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <b>{{ Session::get('success') }}</b>
    </div>
@endif