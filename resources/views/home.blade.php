@extends('layouts.main')

@section('container')
<style>
body {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    height: 100%;
    overflow: hidden;
    align-items: center;
    text-align: center;
    background: linear-gradient(to right, rgba(39, 39, 39, 0.9), rgba(39, 39, 39, 0.3)), url('img/homebg.jpg') center top;
    background-size: cover;
    background-repeat: repeat;
} </style>
<section id="hero" class="hero">

    <div class="info d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h2 data-aos="fade-down">SELAMAT <span style="color: #e63a4b; font-weight: 800;">WELKOM</span><br>DI HOTEL MENARIQUE</h2>
            <p data-aos="fade-up">Manjakan diri anda dengan bersantai menikmati indahnya Pantai Kuta,<br>Hotel Menarique siap melayani anda dengan sefenuh heart.<br>
            Silahkan tekan tombol dibawah untuk melihat fasilitas yang kami sediakan.</p>
            <a data-aos="fade-up" data-aos-delay="200" href="/posts" class="btn-get-started">Get Started</a>
          </div>
        </div>
      </div>
    </div>

</section>
@endsection
