@extends('layouts.admin')

@section('title', 'Actividades - Administración')
@section('page-title', 'Actividades')

@section('content')
    @include('admin.settings.partials.crud', compact('records', 'columns', 'formFields', 'resourceKey', 'routes'))
@endsection
