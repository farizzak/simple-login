<form method="POST"action="{{ route('pegawai.store') }}">

    <div class="row clearfix">
            <div class="col-md-6">Nama Lengkap</div>
        
                <div class="col-md-6">
                    <input class="form-control"type="text" name="nama" value="{{ $model->nama}}"style="background-color:#87805E">
                    @foreach($errors->get('nama') as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                     @endforeach
                </div>
            </div>  

            <div class="row clearfix">
                 <div class="col-md-6">Tanggal Lahir</div>
        
                <div class="col-md-6">
                <input class="form-control"type="date" name="tanggal_lahir" value="{{$model->tanggal_lahir}}"style="background-color:#87805E"> 
                @foreach($errors->get('tanggal_lahir') as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                     @endforeach
                </div>
            </div>  

            <div class="row clearfix">
                 <div class="col-md-6">Gelar</div>
        
                <div class="col-md-6">
                <input class="form-control"type="text" name="gelar" value="{{$model->gelar}}"style="background-color:#87805E"> 
                @foreach($errors->get('gelar') as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                     @endforeach   
                </div>
            </div>  

            <div class="row clearfix">
                 <div class="col-md-6">NIP</div>
        
                <div class="col-md-6">
                <input class="form-control"type="text" name="nip" value="{{$model->nip}}"style="background-color:#87805E"> 
                @foreach($errors->get('nip') as $msg)
                        <p class="text-danger">{{ $msg }}</p>
                     @endforeach
                </div>
            </div>  
       
            <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
