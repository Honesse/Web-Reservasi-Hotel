@extends('layouts.main')

@section('container')
<link href="/css/profile.css" rel="stylesheet">
<div class="container mt-4 mb-4 p-3 d-flex justify-content-center"> 
    <div class="card p-4"> <div class=" image d-flex flex-column justify-content-center align-items-center"> 
        <button class="btn btn-secondary"> 
            <img src="img/{{ $image }}" alt="{{ $name }}" width="200" class="img-thumbnail rounded-circle">
        </button> 
        <span class="name mt-3">{{ $name }}</span> 
        <span class="idd">{{ $email }}</span> 
        <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
            <span class="idd1">Oxc4c16a645_b21a</span> 
            <span><i class="fa fa-copy"></i></span> 
        </div> 
        <div class="d-flex flex-row justify-content-center align-items-center mt-3"> 
            <span class="number">VIP
                <span class="follow">Member</span>
            </span> 
        </div> 
        <div class=" d-flex mt-2"> 
            <button class="btn1 btn-light">Edit Profile</button> 
        </div> 
        <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> 
            <span><i class="fa fa-twitter"></i></span> 
            <span><i class="fa fa-facebook-f"></i></span> 
            <span><i class="fa fa-instagram"></i></span> 
            <span><i class="fa fa-linkedin"></i></span> 
        </div> 
        <div class=" px-2 rounded mt-4 date "> 
            <span class="join">Joined June,2023</span> 
        </div> 
    </div> 
</div>
</div>
@endsection