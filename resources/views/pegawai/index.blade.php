@extends('layouts.index')

@section('content')
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
    <title>Dashboard</title>
</head>
 
<body>
    <div class="container mt-5">
        <h1 class="display-4">
          
        </h1>
 
        <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>
    <div

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
 
</html>
<br/>

    @if(Session::has('success'))
    <P class="alert alert-success">{{ Session::get('success')}}</p><br/>
@endif
    
    <a class="btn btn-info" href="{{ route('pegawai.create')}}">Tambah</a>
    <br/><br/>
    <form method="GET" action="{{url('pegawai') }}">
        <input type="text" name="keyword" value="{{@$keyword}}"/>
        <button type="submit">Search</button>
    </form>
<br/>
    <div class="content">
    <a class="btn btn-success" href="{{ url('exportpegawai')}}">Export</a>
    <div class="card card-info card-outline">
        <div class="card-body">
     <a href="{{ url('cetak-pegawai')}}" target="blank_" class="btn btn-primary">Cetak<i class="fa-solid fa-print"><i></a>
        <a href="#"class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Import</a>
    </div>
        
     <br/>
    <table class="table-bordered table">
        <tr>
         <th>Nama</th> 
         <th>Tanggal Lahir</th> 
         <th>Gelar</th> 
         <th>NIP</th> 
         <th colspan="2">AKSI</th>
    </tr>
    @if(isset($datas))
    @foreach($datas as $key=>$value)

    <tr>
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
  Launch demo modal
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
        <form action="#" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="file" name="file" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Selesai</button>
        <button type="submit" class="btn btn-primary">Import</button>
      </div>
    </div>
  </div>
</div>
   
   
   
   
   
   
   
    @endif    
</table>
        
@endsection