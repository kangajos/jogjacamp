@extends('layout.main')

@section('title', 'List Categories')

@section('content')
    <div class="card">
        <div class="card-header bg-transparent">
            <div class="row">
                <div class="col-md-4">
                    <p>List Category</p>
                </div>
                <div class="col-md-4 d-flex justify-content-center">
                    <form action="" method="get">
                        <div class="input-group border-success">
                            <input type="text" name="q" value="{{ request()->get('q') }}" class="form-control"
                                placeholder="category name"aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 d-flex justify-content-end">
                    <a href="{{ route('category.create') }}" class="btn btn-md btn-success">Add New Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Is Publish?</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result as $key => $item)
                        <tr>
                            <td>{{ $key + $result->firstItem() }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->is_publish ? 'Yes' : 'No' }}</td>
                            <td>
                                <a href="{{ route('category.edit', $item->id) }}"
                                    class="btn btn-sm btn-outline-dark">Edit</a>
                                <button type="button" data-url="{{ route('category.destroy', $item->id) }}"
                                    class="btn btn-sm btn-outline-danger delete" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-center bg-transparent py-2">
            {!! $result->links() !!}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post" id="form-delete">
                    @csrf
                    @method('delete')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-danger" id="staticBackdropLabel">Warning !</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete data?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-info" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-md btn-danger">Yes, Delete!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('.delete').on('click', function() {
                const url = $(this).data('url');
                $('#form-delete').attr('action', url);
                console.log(url);
            })
        });
    </script>
@endsection
