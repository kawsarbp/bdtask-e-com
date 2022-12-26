@extends('admin.inc.layouts')
@section('title','Manage Category')

@section('main-contant')

    <div class="card-body">
        <div class="adv-table">
            <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline" role="grid">

                <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting">SL NO</th>
                        <th class="sorting">Category Name</th>
                        <th class="sorting">Status</th>
                        <th class="sorting">Action</th>
                    </tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->status }}</td>
                            <td>
                                <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure!')" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection



