@extends('layouts.index')

@section('content')
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <link rel="stylesheet" href=" https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    
   <title>Dashboard</title>
</head>
 
<body>
    <div class="container mt-5">
        <h1 class="display-4">
          
        </h1>
 
        <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-danger"><b>Logout </b><i class="fa fa-sign-out" aria-hidden="true"></i></button>
        </form>
    <div>

    <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

 
</html>
<br/>

    @if(Session::has('success'))
    <P class="alert alert-success">{{ Session::get('success')}}</p><br/>
@endif
    
    <a class="btn btn-info" href="{{ route('pegawai.create')}}"><b>Tambah </b><i class="fa fa-plus-square" aria-hidden="true"></i></a>
    <br/><br/>
    <form method="GET" action="{{url('pegawai') }}">
        <input type="text" name="keyword" value="{{@$keyword}}"/>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
   
   
    </form>
<br/>
    <div class="content">
    
    <div class="card card-info card-outline">
        <div class="card-header" style="background-color:#2C3639">
             <a href="{{ url('exportpegawai')}}" class="btn btn-success"><b>Export </b><i class="fa fa-external-link-square" aria-hidden="true"></i></a>
             <!-- <a href="{{ url('importpegawai') }}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Import</a> -->
            <a href="{{ url('cetak-pegawai')}}" target="blank_" class="btn btn-primary"><b>Cetak </b><i class="fa-solid fa-print"></i></a>
            </div>
           
     <div class="card-body" style="background-color:#87805E">

        
     <br/>
    <table id="example" class="table-bordered table" style="background-color:#87805E">
    <thead class="thead-dark">
    <tr style='text-align:center'>
         <th>Nama</th> 
         <th>Tanggal Lahir</th> 
         <th>Gelar</th> 
         <th>NIP</th> 
         <th colspan="2">Action</th>
   
        </tr>
    @if(isset($datas))
    @foreach($datas as $key=>$value)

    <tr style="color:#FEFBF6">
        <td>{{@$value->nama }}</td>
        <td>{{@$value->tanggal_lahir }}</td>
        <td>{{@$value->gelar }}</td>
        <td>{{@$value->nip }}</td>
        <td><a class="btn btn-info" href="{{url('pegawai/'.$value->id.'/edit')}}">Update</a></td>
        <td class="text-center">
            <form action="{{ url('pegawai/delete/'.$value->id) }}" method="POST">
                @csrf
            <input type="hidden" name="_method" value="DELETE">
             <button class="btn btn-danger" type="submit">DELETE</button>
        </form>
     </td>
    </tr>
    @endforeach
</table>
</div>
<!-- Button trigger modal -->
<button type="button">

</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('importpegawai') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="file" name="file" required="required">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Selesai</button>
        <button type="submit" class="btn btn-primary">Import</button>
      </div>
    </div>
  </div>
</div>
</body>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    -->
   <script>
    $(document).ready(function () {
    $('#example').DataTable();
});
   </script>
   
   
 
   @endif    

        
@endsection