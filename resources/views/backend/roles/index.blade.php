@extends('layouts.backend.master')
@section('admin')
    <div class="content">

        <!-- content HEADER -->
        <!-- ========================================================= -->
        <div class="content-header">
            <!-- leftside content header -->
            <div class="leftside-content-header">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">{{ $dashboard }}</a></li>
                    <li><a>{{ $subTitle }}</a></li>
                </ul>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--SEARCHING, ORDENING & PAGING-->

        <div class="row ">
            <div class="col-sm-12">


                <div class="panel">
                    <div class="panel b-primary bt-md">
                        <div class="panel-content p-none">
                            <div class="widget-list list-to-do" <div class="widget-list list-to-do" style="display: flex;justify-content: space-between; margin-top:10px; padding-right: 10px;">
                                <h4 class="list-title">{{ $subTitle }}</h4>
                                @can('role-create')
                                <a class="btn btn-success btn-sm mb-2" href="{{ route('admin.roles.create') }}"><i class="fa fa-plus"></i> Create New Role</a>
@endcan
                            </div>
                        </div>
                    </div>
                    <div class="panel-content">
                        <div class="table-responsive">
                            <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th width="100px">SN</th>
                                    <th>Name</th>
                                    <th width="280px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($roles as $key => $role)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @can('role-edit')

                                                <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.edit',$role->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
@endcan
@can('role-delete')

                                                <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                                                </form>
    @endcan

                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>



@endsection



