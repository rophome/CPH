@extends('admin.layouts.dashboard')
@section('page_heading','Company')
@section('section')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Show company</div>

                    <div class="panel-body">
                        {{$company}}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
