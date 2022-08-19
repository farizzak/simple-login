@extends('layouts.index')

@section('content')
    <br/>
    <form method="POST" action="{{ route('pegawai.update',$model->id) }}">
        @csrf
        <!-- <input type="hidden" name="_method" value="PATCH"> -->
        
        @include('pegawai._form')
    </form>
@endsection