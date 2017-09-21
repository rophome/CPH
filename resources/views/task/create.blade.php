@extends('admin.layouts.dashboard')
@section('page_heading','Create Task')
@section('section')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create Task
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="/taskss" method="POST">
                                    {{ method_field('POST')}}
                                    {{ csrf_field() }}

                                    <input type="hidden" name="user_id"
                                           value="{{'hidden field not used at the moment' }}">
                                    <div class="form-group col-sm-30">
                                        <label>Name:</label>
                                        <input class="form-control" name="name" placeholder="Enter text"
                                               value="">
                                    </div>
                                    <div class="form-group col-sm-30">
                                        <label>Address line 1:</label>
                                        <input class="form-control" name="address_line1" placeholder="Enter text"
                                               value="">
                                    </div>
                                    <div class="form-group col-sm-30">
                                        <label>Address line 2:</label>
                                        <input class="form-control" name="address_line2" placeholder="Enter text"
                                               value="">
                                    </div>
                                    <div class="form-group col-sm-30">
                                        <label>Zip code:</label>
                                        <input class="form-control" name="zip" placeholder="Enter text"
                                               value="">
                                    </div>
                                    <div class="form-group col-sm-30">
                                        <label>City:</label>
                                        <input class="form-control" name="city" placeholder="Enter text"
                                               value="">
                                    </div>
                                    <div class="form-group col-sm-30">
                                        <label>Country:</label>
                                        <input class="form-control" name="country" placeholder="Enter text"
                                               value="">
                                    </div>
                                    <div class="form-group col-sm-30">
                                        <label>Telephone:</label>
                                        <input class="form-control" name="telephone" placeholder="Enter text"
                                               value="">
                                    </div>
                                    <div class="form-group col-sm-30">
                                        <label>Email:</label>
                                        <input class="form-control" name="email" placeholder="Enter text"
                                               value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="sel">Contact user:</label>
                                        <select id="sel" class="form-control" name="contact_person_id">
                                            @foreach($users as $user)
                                                <option selected
                                                        value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
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
