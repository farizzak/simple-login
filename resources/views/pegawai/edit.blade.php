@extends('layouts.index')

@section('content')
    <br/>
    <form method="POST" action="{{ route('pegawai.update',$model->id) }}"style="color:#FEFBF6">
        
    @csrf
        <!-- <input type="hidden" name="_method" value="PATCH"> -->
        
        @include('pegawai._form')
    </form>
@endsection