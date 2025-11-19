@extends('layouts.admin')

@section('title', 'Nacionalidades - Administración')
@section('page-title', 'Nacionalidades')

@section('content')
    @include('admin.settings.partials.crud', compact('records', 'columns', 'formFields', 'resourceKey', 'routes'))
@endsection
