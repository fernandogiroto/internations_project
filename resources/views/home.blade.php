@extends('layouts.app')
@section('content')
    <app-page authenticated_user={{ Auth::id() }}></app-page>
@endsection
