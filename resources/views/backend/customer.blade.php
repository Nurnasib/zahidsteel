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

                @include('backend.modal.customer')
                <div class="panel">
                    <div class="panel b-primary bt-md">
                        <div class="panel-content p-none">
                            <div class="widget-list list-to-do">
                                <h4 class="list-title">{{ $subTitle }}</h4>
                                @can('user-create')
                                    <button class="add-item btn btn-o btn-primary btn-xs" data-toggle="modal" data-target="#addRowModal">{{ $title }}<i class="fa fa-plus" style="padding-left: 10px"></i></button>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="panel-content">
                        <div class="table-responsive">
                            <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>SN</th>

                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>

                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($dataList as $data )
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>

                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone }}</td>





                                        <td style="   display: flex;gap: 10px;">
                                            @can('user-edit')
                                                <a href="#"  data-toggle="modal" data-target="#editRowModal{{ $data->id }}"
                                                   class="btn btn-warning btn-sm">Edit</a>

                                            @endcan

                                            @can('user-delete')
                                                <form action="{{ route('admin.customer.delete', $data->id) }}"
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this Data?')">Delete</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                    @include('backend.modal.customer')

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
