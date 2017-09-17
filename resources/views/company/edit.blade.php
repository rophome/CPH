@extends('admin.layouts.dashboard')
@section('page_heading','Create company')
@section('section')
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                <!--  Enter Company attributes -->
                </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                            <form action="/companies/{{$company->id}}" method="POST">
                            {{ method_field('PUT')}}
                            {{ csrf_field() }}

                            <input type="hidden" name="user_id" value="{{'hidden field not used at the moment' }}">
                                <div class="form-group col-sm-30">
                                    <label>Store name:</label>
                                    <input class="form-control" name="name" placeholder="Enter text" value="{{$company->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="sel">Contact user:</label>
                                    <select id="sel" class="form-control" name="company_contact_user_id">
                                        @foreach($users as $user)
                                            @if($user->user_id == $company->company_contact_user_id)
                                                <option selected value="{{$user->user_id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                            @else
                                                <option value="{{$user->user_id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-sm-30">
                                <button type="submit" class="btn btn-success">Save</button>
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
