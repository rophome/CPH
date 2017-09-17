@extends('admin.layouts.dashboard')
@section('page_heading','Edit company')
@section('section')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create Company
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="/companies" method="POST">
                                    {{ method_field('POST')}}
                                    {{ csrf_field() }}

                                    <input type="hidden" name="user_id" value="{{'hidden field not used at the moment' }}">
                                    <div class="form-group col-sm-30">
                                        <label>Store name:</label>
                                        <input class="form-control" name="name" placeholder="Enter text" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="sel">Contact user:</label>
                                        <select id="sel" class="form-control" name="company_contact_user_id">
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-30">
                                        <button type="submit" class="btn btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
