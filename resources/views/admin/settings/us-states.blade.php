@extends('layouts.admin')

@section('title', 'Estados de EE.UU. - Administración')
@section('page-title', 'Estados de EE.UU.')

@section('content')
    @include('admin.settings.partials.crud', compact('records', 'columns', 'formFields', 'resourceKey', 'routes'))
@endsection
