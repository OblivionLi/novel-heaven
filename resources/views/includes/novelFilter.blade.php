<form action="/novel/filter" method="get">
    @csrf
    @method('get')

    <div class="form-group row">
        <div class="col">
            <div class="name">
                <label class="col-form-label">Novel Name</label>
                <input class="form-control" type="text" name="searchF" placeholder="Search by name..">
            </div>
        </div>

        <div class="col">
            <div class="status">
                <label for="filterByStatus" class="col-form-label">Status</label>
                <select name="status" id="filterByStatus" class="form-control form-control">
                    <option value="All">All</option>
                    <option value="Completed">Completed</option>
                    <option value="Ongoing">Ongoing</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col">
            <div class="order">
                <label for="filterByOrder" class="col-form-label">Order By</label>
                <select id="filterByOrder" name="order" class="form-control form-control">
                    <option value="name">Name (asc)</option>
                    <option value="date_release">Date Release (desc)</option>
                    <option value="created_at">Latest Additions (desc)</option>
                    <option value="updated_at">Latest Updates (desc)</option>
                    {{--<option value="">Most Popular</option>--}}
                </select>
            </div>
        </div>

        <div class="col">
            <div class="genre">
                <label for="filterByGenre" class="col-form-label">Genre</label>
                <select id="filterByGenre" name="genres" class="form-control">
                    <option value="All">All</option>
                    @foreach($genres->sortBy('genre_name') as $genre)
                        <option value="{{ $genre->genre_name }}">{{ $genre->genre_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-outline-success formBtn">Filter</button>
</form>
