@extends('layouts.admin')

@section('title', 'Estados de hotel - Administración')
@section('page-title', 'Estados de hotel')

@section('content')
    @include('admin.settings.partials.crud', compact('records', 'columns', 'formFields', 'resourceKey', 'routes'))
@endsection
