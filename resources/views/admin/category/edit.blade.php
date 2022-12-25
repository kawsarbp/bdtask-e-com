@extends('admin.inc.layouts')
@section('title','Manage Category')

@section('main-contant')

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <section class="card">
                <header class="card-header">
                    Category Add Form
                </header>
                <div class="card-body">
                    <form action="{{ route('category.update',$category->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control" id="category_name" aria-describedby="emailHelp" placeholder="Category Name">
                            @error('category_name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <div>
                                <label for="category_name">status</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" {{ $category->status == 'active'?'checked=""':'' }} type="radio" name="status" id="active" value="active">
                                <label class="form-check-label" for="active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" {{ $category->status == 'inactive'?'checked=""':'' }} type="radio" name="status" id="inactive" value="inactive">
                                <label class="form-check-label" for="inactive">Inactive</label>
                            </div>
                            @error('status') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </form>

                </div>
            </section>
        </div>
    </div>

@endsection



