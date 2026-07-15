
@extends('layouts.backend.master')
@section('admin')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .new {
            padding: 50px;
        }

        .form-checkbox {
            display: block;
            margin-bottom: 15px;
        }

        .form-checkbox input {
            padding: 0;
            height: initial;
            width: initial;
            margin-bottom: 0;
            display: none;
            cursor: pointer;
        }

        .form-checkbox label {
            position: relative;
            cursor: pointer;
        }

        .form-checkbox label:before {
            content:'';
            -webkit-appearance: none;
            background-color: transparent;
            border: 2px solid #0079bf;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
            padding: 10px;
            display: inline-block;
            position: relative;
            vertical-align: middle;
            cursor: pointer;
            margin-right: 5px;
        }

        .form-checkbox input:checked + label:after {
            content: '';
            display: block;
            position: absolute;
            top: 2px;
            left: 9px;
            width: 6px;
            height: 14px;
            border: solid #0079bf;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }


        .select2-container {
            min-width: 400px;
        }

        .select2-results__option {
            padding-right: 20px;
            vertical-align: middle;
        }
        .select2-results__option:before {
            content: "";
            display: inline-block;
            position: relative;
            height: 20px;
            width: 20px;
            border: 2px solid #e9e9e9;
            border-radius: 4px;
            background-color: #fff;
            margin-right: 20px;
            vertical-align: middle;
        }
        .select2-results__option[aria-selected=true]:before {
            font-family:fontAwesome;
            content: "\f00c";
            color: #fff;
            background-color: #f77750;
            border: 0;
            display: inline-block;
            padding-left: 3px;
        }
        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: #fff;
        }
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #eaeaeb;
            color: #272727;
        }
        .select2-container--default .select2-selection--multiple {
            margin-bottom: 10px;
        }
        .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
            border-radius: 4px;
        }
        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: #f77750;
            border-width: 2px;
        }
        .select2-container--default .select2-selection--multiple {
            border-width: 2px;
        }
        .select2-container--open .select2-dropdown--below {

            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);

        }
        .select2-selection .select2-selection--multiple:after {
            content: 'hhghgh';
        }
        /* select with icons badges single*/
        .select-icon .select2-selection__placeholder .badge {
            display: none;
        }
        .select-icon .placeholder {
            /* 	display: none; */
        }
        .select-icon .select2-results__option:before,
        .select-icon .select2-results__option[aria-selected=true]:before {
            display: none !important;
            /* content: "" !important; */
        }
        .select-icon  .select2-search--dropdown {
            display: none;
        }
    </style>
    <div class="content">
        <!-- content HEADER -->
        <div class="content-header">
            <div class="leftside-content-header">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">{{ $dashboard}}</a></li>
                    <li><a>{{ $subTitle}}</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                <div class="panel">
                    <div class="panel b-primary bt-md">
                        <div class="panel-content p-none">
                            <div class="widget-list list-to-do">
                                <h4 class="list-title">@if(empty($row->id))  {{ $addTitle}} @else {{ $editTitle}}  @endif</h4>
                                <a class="add-item btn btn-o btn-primary btn-xs" href="{{ route('admin.blog.blog') }}">{{ $title}}<i class="fa fa-plus" style="padding-left: 10px"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-content" style="width: 100%">
                        <div class="panel">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-md-12">
                                      <div class="card">
                                        <div class="card-header">
                                          <div class="card-title"> </div>
                                        </div> <form id="myForm"  method="POST"
                                        @if(empty($row->id)) action="{{route('admin.blog.add.update.info')}}" @else action="{{route('admin.blog.add.update.info',$row->id)}}"  @endif   enctype="multipart/form-data">
                                            @csrf
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                              <div class="form-group">
                                                <label for="email2">Title</label>
                                                <input
                                                  type="text"
                                                  class="form-control"
                                                  name="title"
                                                 value="{{ old('title', $row->title ?? '') }}"
                                                  placeholder="Enter Title"
                                                />

                                              </div>

                                              <div class="form-group">
                                                <label for="password">Short Description</label>
                                                <textarea
                                                  type="text"
                                                  class=" form-control"
                                                  name="short_description"
                                                  placeholder="Short Description"
                                                >{!! old('short_description', $row->short_description ?? '') !!}</textarea>
                                              </div>
                                              <div class="form-group ">
                                                <label
                                                  for="inlineinput"

                                                  >Description</label
                                                >

                                                  <textarea
                                                    type="text"
                                                    class="form-control summernote"
                                                    id="inlineinput"
                                                    name="description"

                                                  >{!! old('description', $row->description ?? '') !!}</textarea>

                                              </div>
                                              <div class="form-group ">
                                                <label for="successInput">Thumbnail</label>
                                                @if (!empty($row->image))
                                              <div class="mt-2">
                                                <img src="{{ asset( $row->image) }}" alt="Current Image" style="width: 150px;">
                                              </div>
                                            @endif
                                                <input
                                                  type="file"
                                                  id="successInput"
                                                  name="image"
                                                  class="form-control"
                                                />
                                              </div>


                                            </div>
                                            <div class="col-md-6 col-lg-4 mt-6" style="margin-top: 20px">
                                                <label for="email2">Category</label>
                                                <select class="form-select form-control" name="category_id" aria-label="Default select example">
                                                    <option value="">Please Select Category</option>

                                                    @foreach ($categories as $cat)
                                                        <option value="{{ $cat->id }}"
                                                            {{ isset($row) && $row->category_id == $cat->id ? 'selected' : '' }}>
                                                            {{ $cat->title }}
                                                        </option>
                                                    @endforeach

                                                </select>


                                              </div>
                                              <div class="col-md-6 col-lg-4 mt-6" style="margin-top: 20px">
                                                <label for="email2">Reading Time(Minutes)</label>
                                                <input
                                                  type="number"
                                                  class="form-control"
                                                  name="readingTime"
                                                 value="{{ old('readingTime', $row->readingTime ?? '') }}"
                                                  placeholder="Enter Reading Time"
                                                />

                                              </div>
                                              <div class="col-md-6 col-lg-4 mt-6" style="margin-top: 20px">
                                                  <label for="email2">Date</label>
                                                  <input
                                                      type="date"
                                                      class="form-control"
                                                      name="createdTime"
                                                      value=""
                                                      placeholder="Select Date"
                                                  />


                                              </div>

                                              <div class="col-md-6 col-lg-6 mt-6" style="margin-top: 20px">
                                                  <label class="mb-3"><b>Writer</b></label>
                                                  @foreach ($writers as $cat)
                                                      <div class="form-group form-checkbox">
                                                          <input
                                                              type="checkbox"
                                                              name="writerId[]"
                                                              value="{{ $cat->id }}"
                                                              id="html{{ $cat->id }}"
                                                          @if(!empty($row->id)){{ in_array($cat->id, $row->writersInfo->pluck('id')->toArray() ?? []) ? 'checked' : '' }}
                                                              @endif

                                                          >
                                                          <label for="html{{ $cat->id }}">{{ $cat->name }}</label>
                                                      </div>
                                                  @endforeach





                                              </div>
                                              <div class="col-md-6 col-lg-6" style="margin-top: 20px">
                                                  <label class="mb-3"><b>Tag</b></label>
                                                  <div class="form-group ">
                                                  <select class="js-select2" name="tagId[]" multiple="multiple">
                                                      @foreach ($tags as $rowTag)
                                                          <option
                                                              value="{{ $rowTag->id }}"
                                                          @if(!empty($row->id)) {{ in_array($rowTag->id, $row->tags->pluck('id')->toArray() ?? []) ? 'selected' : '' }} @endif
                                                          >
                                                              {{ $rowTag->title }}
                                                          </option>
                                                      @endforeach
                                                  </select>
                                                  </div>


                                              </div>
                                            <div class="col-md-4 col-lg-4">
                                              <label class="mb-3"><b>Seo Title</b></label>

                                                <input
                                                  id="Name"
                                                  type="text"
                                                  name="seo_title"
                                                   value="{{ old('seo_title', $row->seo_title ?? '') }}"
                                                  class="form-control"
                                                  placeholder="Seo Title"
                                                />


                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                              <label class="mb-3"><b>Seo Description</b></label>

                                                <input
                                                  id="Name"
                                                  type="text"
                                                  class="form-control"
                                                  name="seo_description"
                                                   value="{{ old('seo_description', $row->seo_description ?? '') }}"
                                                  placeholder="Seo Description"
                                                />


                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                              <label class="mb-3"><b>Seo Image</b></label>

                                                <input
                                                  id="Name"
                                                  type="file"
                                                  class="form-control"
                                                 name="seo_image"
                                                />


                                            </div>



                                          </div>
                                        </div>
                                        <div class="card-action">
                                          <button type="submit" class="btn btn-success">Submit</button>
                                          <button class="btn btn-danger">Cancel</button>
                                        </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

