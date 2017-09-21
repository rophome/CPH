@extends('admin.layouts.dashboard')
@section('page_heading','Tasks')
@section('section')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tasks
                    </div>

                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table compact" id="companyTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Description</th>
                                @if(Sentinel::inRole('admin'))
                                    <th>Company</th>
                                @endif
                                @if(Sentinel::inRole('manager'))
                                    <th>Store</th>
                                @endif
                                <th>priority</th>
                                <th>status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td><a href="/tasks/{{ $task->id}}">{{$task->id}}</a></td>
                                    <td>{{$task->short_description}}</td>
                                    @if(Sentinel::inRole('admin'))
                                        <td>{{$task->company->name}}</td>
                                    @endif
                                    @if(Sentinel::inRole('manager'))
                                        <td>{{$task->store->name}}</td>
                                    @endif
                                    <td>{{$task->priority}}</td>
                                    <td>{{$task->status}}</td>
                                    <td><a href="/tasks/{{$task->id}}/edit/"><i class="fa fa-pencil fa-fw"
                                                                                aria-hidden="true"></i>&nbsp; Edit</a>
                                        {!! Form::open(['method' => 'DELETE',
                                      'route' => ['tasks.destroy', $task->id],
                                      'id' => 'form-delete-companies-' . $task->id]) !!}
                                        <a href="" class="data-delete text-danger"
                                           data-form="companies-{{ $task->id }}">
                                            <i class="glyphicon glyphicon-remove icon-spacer"></i>&nbsp; Delete</a>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="/tasks/create" class="btn btn-success">Create new</a>
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
    </script>
    <script>
        $(document).ready(function () {
            $('#companyTable').DataTable();
        });
    </script>
@endsection
