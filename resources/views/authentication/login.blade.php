@extends('admin.layouts.dashboard')
@section('page_heading','Login')
@section('section')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="/login" method="post">
                            {{csrf_field()}}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember_me" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <div class="form-group">
                                    <input type="submit" value="Login" class="btn btn-success pull-right">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                @if(session('error'))
                    <div class="alert alert-danger">
                     {{session('error')}}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

