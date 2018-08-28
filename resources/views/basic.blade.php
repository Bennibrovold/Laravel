@extends('layouts.app')

@section('title', 'Home page')

@section('navbar')
@include('layouts.header')
@endsection

@section('content')

{{ $content }}

@endsection	