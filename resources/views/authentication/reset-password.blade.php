@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel primary">
                <div class="panel-heading">
                    <h3 class="panel-title"> Forgot password</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="post">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{csrf_field()}}

                        @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">{{session('error')}}</div>
                        @endif

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="New password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Retype new password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Update Password" class="btn btn-success pull-right">
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

