@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="col-md-12">
                    <form action="{{ route('admin.user.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="username">Name:</label>
                            <input type="text" class="form-control" id="username" name="name" placeholder="Name" value="{{ old('name') }}">
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                        </div>
                        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            <label for="password_confirmation">Confirm Password:</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-Password">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection