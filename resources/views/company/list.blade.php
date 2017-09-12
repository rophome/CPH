@extends('admin.layouts.dashboard')
@section('page_heading','Companies')
@section('section')
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Companies
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="companyTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Company name</th>
                                <th>Contact persion</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Company name</th>
                                <th>Contact persion</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{$company->id}}</td>
                                    <td><a href="/companies/{{ $company->id}}">{{$company->name}}</a></td>
                                    <td>{{$company->contact->first_name}} {{$company->contact->last_name}}</td>
                                    <td><a href="/companies/{{$company->id}}/edit/"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>&nbsp; Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">
                footer
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
