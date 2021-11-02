@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    Home
@endsection

{{-- Page name --}}
@section('page_name')
    Control Panel
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
    </ol>
@endsection

{{-- Content --}}
@section('content')

@endsection
