@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Tạo chuyên mục</a><br/>

                <div class="panel panel-body">

                    @if(session('messager'))
                        <div class="alert alert-success">
                            {{ session('messager') }}
                        </div><br/>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div><br/>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Order</th>
                                <th>Parrent</th>
                                <th>Date created</th>
                                <th>Date updated</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->order }}</td>
                                    <td>{{ $category->parrent }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>{{ $category->updated_at }}</td>
                                    <td><a href="{{ route('admin.category.show' , ['id' => $category->id]) }}"
                                           class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin.category.show' , ['id' => $category->id]) }}"
                                           class="btn btn-danger" onclick="event.preventDefault();
                                           window.confirm('Bạn chắc chắn xóa chuyên mục này?') ? document.getElementById('category-delete-{{ $category->id }}').submit() : 0;">Delete</a>
                                        <form action="{{ route('admin.category.delete' , ['id' => $category->id]) }}" method="post"
                                              id="category-delete-{{ $category->id }}">

                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No data</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection