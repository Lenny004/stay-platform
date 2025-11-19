@extends('layouts.admin')

@section('title', 'Tipos de alojamiento - Administración')
@section('page-title', 'Tipos de alojamiento')

@section('content')
    @include('admin.settings.partials.crud', compact('records', 'columns', 'formFields', 'resourceKey', 'routes'))
@endsection
