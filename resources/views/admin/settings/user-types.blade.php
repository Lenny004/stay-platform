@extends('layouts.admin')

@section('title', 'Tipos de usuario - Administración')
@section('page-title', 'Tipos de usuario')

@section('content')
    @include('admin.settings.partials.crud', compact('records', 'columns', 'formFields', 'resourceKey', 'routes'))
@endsection
