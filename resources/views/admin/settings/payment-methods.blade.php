@extends('layouts.admin')

@section('title', 'Métodos de pago - Administración')
@section('page-title', 'Métodos de pago')

@section('content')
    @include('admin.settings.partials.crud', compact('records', 'columns', 'formFields', 'resourceKey', 'routes'))
@endsection
