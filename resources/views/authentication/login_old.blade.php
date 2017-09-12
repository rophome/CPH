<@extends('layouts.master')
@section('content')
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Login</h3>
                    </div>
                    <div class="panel-body">
                        <form id="login-form" >
                            {{csrf_field()}}
                                <div class="alert alert-danger" style="display: none"></div>
                                <div class="alert alert-success" style="display: none"></div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="example@example.com" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">Remember me
                                    <input type="checkbox" name="remember_me">
                                </div>
                            </div>

                            <a href="/forgot-password">Forgot your password?</a>
                            <div class="form-group">
                                <input type="submit" value="Login" class="btn btn-success pull-right">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').
                attr('content')
            }
        })
        $('#login-form').submit(function(event) {
            event.preventDefault()

            var postData = {
                'email': $('input[name=email]').val(),
                'password': $('input[name=password]').val() ,
                'remember_me' : $('input[name=remember_me]').is(':checked')
            }

            $.ajax({
                type: 'POST',
                url:  '/login',
                data:postData,
                success: function(response) {
                    window.location.href=response.redirect
                },
                error: function(response) {
                    $('.alert-danger').text(response.responseJSON.error)
                    $('.alert-danger').show()
                }
            })
        })
    </script>

@endsection


