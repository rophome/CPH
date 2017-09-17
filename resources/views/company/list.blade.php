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
                        <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{$company->id}}</td>
                                    <td><a href="/companies/{{ $company->id}}">{{$company->name}}</a></td>
                                    <td>{{$company->contact->first_name}} {{$company->contact->last_name}}</td>
                                    <td width="10%"><a href="/companies/{{$company->id}}/edit/"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Edit</a><br>
                                        {!! Form::open(['method' => 'DELETE',
                                      'route' => ['companies.destroy', $company->id],
                                      'id' => 'form-delete-companies-' . $company->id]) !!}
                                        <a href="" class="data-delete text-danger"
                                           data-form="companies-{{ $company->id }}">
                                            <i class="glyphicon glyphicon-remove icon-spacer"></i>Delete</a>
                                        {!! Form::close() !!}
                                      </td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="/companies/create" class="btn btn-success">Create new</a>

                </div>
            </div>
            <div class="card-footer small text-muted">

            </div>
        </div>
    </div>
    </div>
    <script>
        $(function () {
            $('.data-delete').on('click', function (e) {
                if (!confirm('Are you sure you want to delete?')) return;
                e.preventDefault();
                $('#form-delete-' + $(this).data('form')).submit();
            });
        });

        $(document).ready(function(){
            $('#companyTable').DataTable();
        });
    </script>

@endsection
