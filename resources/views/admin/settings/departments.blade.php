@extends('layouts.admin')

@section('title', 'Departamentos - Administración')
@section('page-title', 'Departamentos')

@section('content')
    @include('admin.settings.partials.crud', compact('records', 'columns', 'formFields', 'resourceKey', 'routes'))
@endsection
