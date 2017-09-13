@extends('admin.layouts.dashboard')
@section('page_heading','Stores')
@section('section')
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Stores
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="companyTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Store name</th>
                                <th>City</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stores as $store)
                                <tr>
                                    <td>{{$store->id}}</td>
                                    <td><a href="/stores/{{ $store->id}}">{{$store->name}}</a></td>
                                    <td>{{$store->zip}} {{$store->city}}</td>
                                    <td><a href="/stores/{{$store->id}}/edit/"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>&nbsp; Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">

            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function(){
        $('#companyTable').DataTable();
        });
    </script>
@endsection
