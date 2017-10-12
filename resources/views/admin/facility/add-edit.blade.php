<?php

use Illuminate\Support\Facades\DB;
?>

@extends('admin.layouts.main')

@section('content')

    <div class="normalheader transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <a class="small-header-action" href="#">
                    <div class="clip-header">
                        <i class="fa fa-arrow-up"></i>
                    </div>
                </a>

                <div id="hbreadcrumb" class="pull-right m-t-lg">
                    <ol class="hbreadcrumb breadcrumb">
                        <li><a href="{{ url('/') }}/dashboard">Dashboard</a></li>
                        <li><a href="{{ url('/') }}/dashboard/facility">Facility</a></li>
                        <li class="active">
                            <span>{{ $title }} Facility</span>
                        </li>
                    </ol>
                </div>
                <h2 class="font-light m-b-xs">
                    {{ $title }} Facility
                </h2>
                <small>* Enter all required fields</small>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-heading">
                        <div class="panel-tools">
                            <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                            <a class="closebox"><i class="fa fa-times"></i></a>
                        </div>
                        &nbsp;
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <form action="{{ $action }}" method="post" id="add-edit-form" enctype="multipart/form-data">

                                    @if ( $title == 'Edit' )
                                        <input type="hidden" name="id" value="{{ $facility->id }}">
                                    @endif

                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label class="control-label">Name*</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $facility->name or old('name') }}" autofocus>
                                            <span class="name"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label class="control-label">Color</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="color" id="color-picker" name="color" class="form-control m-b" value="{{ $facility->color or old('color') }}">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label class="control-label">Image</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="profile-info">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="user-add-avatar">
                                                            @if ( $title == 'Edit' && $facility->img )
                                                                <img src="{{ url('/') }}/admin/uploads/facility/{{ $facility->img }}" class="img-circle m-b" alt="avatar">
                                                            @else
                                                                <img src="{{ url('/') }}/admin/images/no_avatar.png" class="img-circle m-b" alt="avatar">
                                                            @endif
                                                            <img src="{{ url('/') }}/admin/images/upload.png" class="img-upload" alt="avatar">
                                                            <input type="file" id="file" name="file" class="form-control">
                                                        </div>
                                                        <span id="fileCheck"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <button class="btn btn-primary" id="save" type="submit">Save changes</button>
                                            <a href="{{ url('/') }}/dashboard/facility" class="btn w-xs btn-info">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('/admin/scripts/validations.js') }}"></script>

@stop
