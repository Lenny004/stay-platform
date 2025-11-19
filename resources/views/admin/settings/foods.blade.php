@extends('layouts.admin')

@section('title', 'Servicios de comida - Administración')
@section('page-title', 'Servicios de comida')

@section('content')
    @include('admin.settings.partials.crud', compact('records', 'columns', 'formFields', 'resourceKey', 'routes'))
@endsection
