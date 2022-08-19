@extends('layouts.index')

@section('content')
    <br/>
    <form method="POST"action="{{ route('pegawai.store') }}">
@csrf
@include('pegawai._form')
</form>
@endsection