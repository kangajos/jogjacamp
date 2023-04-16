@extends('layout.main')

@section('title', 'Edit Category')

@section('content')
    <form action="{{ route('category.update', $result->id) }}" method="post">
        @csrf
        @method('put')
        <div class="card">
            <div class="card-body">
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" id="floatingInput"
                        value="{{ old('name', $result->name) }}" placeholder="input..">
                    <label for="floatingInput">Category Name</label>
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-check">
                    <input name="is_publish" class="form-check-input" type="checkbox" value="1" id="flexCheckChecked"
                        {{ old('is_publish', $result->is_publish) == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexCheckChecked">
                        Is Publish ?
                    </label>
                </div>
                @error('is_publish')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="card-body">
                <a href="{{ route('category.index') }}" class="btn btn-md btn-info">Back</a>
                <button type="submit" class="btn btn-md btn-success">Submit</button>
            </div>
        </div>
    </form>
@endsection
