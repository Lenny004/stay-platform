@extends('layouts.admin')

@section('title', 'Divisas - Administración')
@section('page-title', 'Divisas')

@section('content')
    @include('admin.settings.partials.crud', compact('records', 'columns', 'formFields', 'resourceKey', 'routes'))
@endsection
