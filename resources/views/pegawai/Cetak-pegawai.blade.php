    <!DOCTYPE html>
    <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    table.static {
        position: relative;
        /* left: 3%; */
        border: 1px solid #543535;
    }

    </style>
    <title>CETAK DATA PEGAWAI</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Pegawai</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width:95%;">
        <tr>
         <th>Nama</th> 
         <th>Tanggal Lahir</th> 
         <th>Gelar</th> 
         <th>NIP</th> 
    </tr>
    @foreach($datas as $key=>$value)
    <tr>
        <td>{{@$value->nama }}</td>
        <td>{{@$value->tanggal_lahir }}</td>
        <td>{{@$value->gelar }}</td>
        <td>{{@$value->nip }}</td>
    </tr>
     @endforeach
    </table>
</div>

<script type="text/javascript">
window.print();


</script>
</body>
</html>