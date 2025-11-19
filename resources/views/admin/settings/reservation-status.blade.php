@extends('layouts.admin')

@section('title', 'Estados de reservación - Administración')
@section('page-title', 'Estados de reservación')

@section('content')
    @include('admin.settings.partials.crud', compact('records', 'columns', 'formFields', 'resourceKey', 'routes'))
@endsection
