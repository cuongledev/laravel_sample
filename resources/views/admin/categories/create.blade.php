@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="col-md-12">
                    <form action="{{ route('admin.category.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">Tên chuyên mục:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                   value="{{ old('name') }}">
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="form-group {{ $errors->has('order') ? 'has-error' : '' }}">
                            <label for="username">Thứ tự:</label>
                            <input type="text" class="form-control" id="order" name="order" placeholder="Order"
                                   value="{{ old('order') }}">
                            <div class="invalid-feedback">{{ $errors->first('order') }}</div>
                        </div>
                        <div class="form-group {{ $errors->has('parent') ? 'has-error' : '' }}">
                            <label for="username">Chuyên mục cha:</label>
                            <select name="parent" id="" class="form-control">
                                <option value="0">Không</option>
                                @if(count($categories) > 0)
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('parent') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="invalid-feedback">{{ $errors->first('parent') }}</div>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection