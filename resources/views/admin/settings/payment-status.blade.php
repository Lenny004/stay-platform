@extends('layouts.admin')

@section('title', 'Estados de pago - Administración')
@section('page-title', 'Estados de pago')

@section('content')
    @include('admin.settings.partials.crud', compact('records', 'columns', 'formFields', 'resourceKey', 'routes'))
@endsection
