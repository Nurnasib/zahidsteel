@extends('layouts.backend.master')
@section('admin')
    <
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
                            <div class="widget-list list-to-do">
                                <h4 class="list-title">{{ $subTitle }}</h4>

                                <a class="add-item btn btn-o btn-primary btn-xs" href="{{ route('admin.blog.blog') }}">{{ $title }}<i class="fa fa-plus"
                                        style="padding-left: 10px"></i></a>


                            </div>
                        </div>
                    </div>
                    <div class="panel-content">
                        <div class="table-responsive">
                            <table id="basic-table" class="data-table table table-striped nowrap table-hover"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                      <th>SN</th>
                                      <th>Image</th>
                                      <th>Title</th>


                                      <th>Created AT</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                      @foreach ($dataList as $row )
                                    <tr>
                                      <td>{{ $loop->index +1  }}</td>

                                        <td>
                                            <img
                                                src="{{ $row->image ? asset($row->image) : asset('images/no-image.png') }}"
                                                style="height:100px; width:100px;"
                                                alt="Image"
                                            >
                                        </td>

                                        <td>{{ $row->title }}</td>


                                      <td>  {{ $row->createdTime ? $row->createdTime->format('F d, Y') : 'N/A' }}</td>
                                      <td>{{ $row->status }}</td>
                                      <td>

                                          <a href="{{ route('admin.blog.blog', $row->id) }}"
                                              class="btn btn-warning btn-sm">Edit</a>


                                              <form action="{{ route('admin.blog.delete', $row->id) }}"
                                                  method="POST" class="d-inline">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn btn-danger btn-sm"
                                                      onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                              </form>

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
