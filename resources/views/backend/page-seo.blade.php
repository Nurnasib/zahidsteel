@extends('layouts.backend.master')
@section('admin')
    <div class="content">

        <div class="content-header">
            <div class="leftside-content-header">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">{{ $dashboard }}</a></li>
                    <li><a>{{ $subTitle }}</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                @include('backend.partials.form-errors')
                <div class="panel">
                    <div class="panel b-primary bt-md">
                        <div class="panel-content p-none">
                            <div class="widget-list list-to-do">
                                <h4 class="list-title">{{ $subTitle }}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="panel-content">
                        <p class="text-muted">
                            Search titles and descriptions for the fixed pages. Left empty, the title becomes
                            “Page name | {{ $setting->site_name }}” and the description falls back to the one in General Settings.
                            Service, product and general pages are set in <a href="{{ route('admin.page.index') }}">Pages</a>; blog posts in the blog editor.
                        </p>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th style="width:160px;">Page</th>
                                    <th>SEO Title</th>
                                    <th>Meta Description</th>
                                    <th style="width:80px;"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dataList as $data)
                                    <tr>
                                            <td style="vertical-align:middle;">
                                                <a href="{{ route($data->route_name) }}" target="_blank" rel="noopener">{{ $data->label }}</a>
                                            </td>
                                            <td>
                                                <input type="text" name="meta_title" form="seoForm{{ $data->id }}" class="form-control" maxlength="255"
                                                       value="{{ $data->meta_title }}"
                                                       placeholder="{{ $data->route_name === 'home' ? $setting->site_name : $data->label . ' | ' . $setting->site_name }}">
                                            </td>
                                            <td>
                                                <textarea name="meta_description" form="seoForm{{ $data->id }}" class="form-control" rows="2" maxlength="500"
                                                          placeholder="{{ $setting->seo_description }}">{{ $data->meta_description }}</textarea>
                                            </td>
                                            <td style="vertical-align:middle;">
                                                {{-- Inputs in the other cells join this form via form="…" --}}
                                                <form id="seoForm{{ $data->id }}" method="POST" action="{{ route('admin.page-seo.add.update.info', $data->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
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
    </div>
@endsection
