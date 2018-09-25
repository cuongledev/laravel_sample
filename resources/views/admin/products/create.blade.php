@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="col-md-12">
                    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">Tên sản phẩm:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                   value="{{ old('name') }}">
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                            <label for="name">Mã sản phẩm:</label>
                            <input type="text" class="form-control" id="code" name="code" placeholder="Code"
                                   value="{{ old('code') }}">
                            <div class="invalid-feedback">{{ $errors->first('code') }}</div>
                        </div>
                        <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                            <label for="name">Nội dung:</label>
                            <textarea name="content" id="" cols="30" rows="10" class="form-control">{{ old('content') }}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('content') }}</div>
                        </div>
                        <div class="form-group {{ $errors->has('regular_price') ? 'has-error' : '' }}">
                            <label for="name">Giá thị trường:</label>
                            <input type="number" min="1" class="form-control" id="regular_price" name="regular_price" placeholder="Regular price"
                                   value="{{ old('regular_price') }}">
                            <div class="invalid-feedback">{{ $errors->first('regular_price') }}</div>
                        </div>
                        <div class="form-group {{ $errors->has('sale_price') ? 'has-error' : '' }}">
                            <label for="name">Giá thị trường:</label>
                            <input type="number" min="1" class="form-control" id="sale_price" name="sale_price" placeholder="sale_price"
                                   value="{{ old('sale_price') }}">
                            <div class="invalid-feedback">{{ $errors->first('sale_price') }}</div>
                        </div>
                        <div class="form-group {{ $errors->has('original_price') ? 'has-error' : '' }}">
                            <label for="name">Giá gốc:</label>
                            <input type="number" min="1" class="form-control" id="original_price" name="original_price" placeholder="original_price"
                                   value="{{ old('original_price') }}">
                            <div class="invalid-feedback">{{ $errors->first('original_price') }}</div>
                        </div>
                        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                            <label for="name">Số lượng:</label>
                            <input type="number" min="1" class="form-control" id="quantity" name="quantity" placeholder="quantity"
                                   value="{{ old('quantity') }}">
                            <div class="invalid-feedback">{{ $errors->first('quantity') }}</div>
                        </div>
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label for="name">Hình sản phẩm:</label>
                            <input type="file" class="form-control" id="image" name="image"
                                   value="{{ old('image') }}">
                            <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                        </div>
                        <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                            <label for="username">Chuyên mục cha:</label>
                            <select name="category_id" id="" class="form-control">
                                <option value="0">Không</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                            </select>
                            <div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection