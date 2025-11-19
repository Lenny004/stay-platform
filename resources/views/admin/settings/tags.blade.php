@extends('layouts.admin')

@section('title', 'Tags - Administración')
@section('page-title', 'Tags')

@section('content')
    @include('admin.settings.partials.crud', compact('records', 'columns', 'formFields', 'resourceKey', 'routes'))
@endsection
