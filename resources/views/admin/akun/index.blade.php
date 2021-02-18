@extends('layouts.admin')

@section('title', 'Admin | Akun')

@section('section')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Akun</h1>

    @if(session()->has('message'))
    <div class="flash-data" data-flashdata="{{ session('message') }}"></div>
    {{-- @elseif(session()->has('failed'))
    <div class="flash-data-failed" data-flashdata="{{ session('failed') }}">
</div> --}}
@endif




<livewire:admin-akun-index />

</div>
@endsection
