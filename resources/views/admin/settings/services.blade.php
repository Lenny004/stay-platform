@extends('layouts.admin')

@section('title', 'Servicios - Administración')
@section('page-title', 'Servicios')

@section('content')
    @include('admin.settings.partials.crud', compact('records', 'columns', 'formFields', 'resourceKey', 'routes'))
@endsection
