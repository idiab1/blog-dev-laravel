@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    Setting
@endsection

{{-- Page name --}}
@section('page_name')
    Setting
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li class="breadcrumb-item">Setting<li>
    </ol>
@endsection

{{-- Content --}}
@section('content')
<div class="setting-page">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="setting-form">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Setting</h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('setting.update', ['id' => $setting->id])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="webName">Website Name</label>
                                    <input class="form-control" type="text" id="webName" name="web_name" value="{{$setting->web_name}}" placeholder="Enter website name">
                                </div>
                                <div class="form-group">
                                    <label for="phoneNumber">Phone Number</label>
                                    <input class="form-control" type="number" id="phoneNumber" name="phone_number" value="{{$setting->phone_number}}" placeholder="Enter phone number">
                                </div>
                                <div class="form-group">
                                    <label for="webEmail">Email</label>
                                    <input class="form-control" type="text" id="webEmail" name="web_email" value="{{$setting->web_email}}" placeholder="Enter website email">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input class="form-control" type="text" id="address" name="address" value="{{$setting->address}}" placeholder="Enter address">
                                </div>
                                <div class="form-group">
                                    <label for="aboutUs">About Us</label>
                                    <textarea class="form-control" name="about_us" id="aboutUs" placeholder="Enter About us">{{$setting->setting}}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection
