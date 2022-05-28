@extends('layouts.app')

@section('navbar')
    @include('recruitment::layouts.navbar')
@endsection

@section('sidebar')
    @include('recruitment::layouts.sidebar')
@endsection

@section('control')
    @include('layouts.control')
@endsection

@section('components')
    @livewire('livewire-loader')
@endsection

@section('css') 
    @livewireAlertStyles
    @livewireLoaderStyles
@endsection

@section('js')
    @livewireAlertScripts
    @livewireLoaderScripts
@endsection
