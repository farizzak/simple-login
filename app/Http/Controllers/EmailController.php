<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
class EmailController extends Controller
{
    public function index()
    {
      $isi_email = [
        'title'=> 'EMAIL LARAVEL 8',
        'body' => 'Selamat datang di tutorial kirim email dengan laravel 8'
      ];


      $tujuan ='faathirizak00@gmail.com';
        MAil::to($tujuan)->send(new SendEmail($isi_email));
        return 'Berhasil Mengirim Email';
    }
}
