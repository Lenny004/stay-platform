@extends('layouts.admin')

@section('title', 'Zonas cercanas - Administración')
@section('page-title', 'Zonas cercanas')

@section('content')
    @include('admin.settings.partials.crud', compact('records', 'columns', 'formFields', 'resourceKey', 'routes'))
@endsection
