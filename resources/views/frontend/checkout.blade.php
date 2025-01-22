@extends('layouts.app')

@push('meta-seo')
<meta name="description" content="{{$global_config_data->deskripsi}}">
<meta name="keywords" content="{{$global_config_data->kata_kunci}}">
<meta property="og:title" content="{{$global_config_data->judul}}" />
<meta property="og:site_name" content="{{$global_config_data->judul}}"/>
<meta property="og:url" content="{{ url()->current()}}"/>
<meta property="og:description" content="{{$global_config_data->deskripsi}}"/>
<meta property="og:image" content="{{ asset('files/image/logo.png')}}"/>
@endpush

@push('style')
    
@endpush

@push('script')
    
@endpush


@section('content')

<div class="py-5 text-center">
  {{-- <img src="{{ url('/files/image/logo.png')}}" alt=""> --}}
    <h2>Form Order</h2>
    <p class="lead">Harap mengisi formulir pesanan dengan lengkap dan akurat untuk memastikan proses pemesanan berjalan lancar. Pastikan semua data yang diminta, seperti nama, email, whatsapp, dan produk yang dipilih, diisi dengan benar.</p>
  </div>

  <div class="row g-5">

    <div class="col-md-5 col-lg-4 order-md-last">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-success">Pesanan Anda</span>
        <span class="badge bg-success rounded-pill">1</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-sm">
          <div>
            <h6 class="my-0">{{$checkout->sproductname->product_name}}</h6>
          </div>
          <span class="text-body-secondary">Rp. {{number_format($checkout->price,0,'.','.')}}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (Rupiah)</span>
          <strong>Rp. {{number_format($checkout->price,0,'.','.')}}</strong>
        </li>
      </ul>
    </div>

    <div class="col-md-7 col-lg-8">
      <h4 class="mb-3">Informasi Pelanggan</h4>
      <form action="{{ route('checkoutNow')}}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-12">
                <label for="nama_pelanggan" class="form-label">Nama</label>
                <div class="input-group has-validation">
                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" placeholder="nama_pelanggan" required>
                <div class="invalid-feedback">
                    Your Nama is required.
                </div>
                </div>
            </div>

            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <div class="input-group has-validation">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
                <div class="invalid-feedback">
                    Your Email is required.
                </div>
                </div>
            </div>

            <div class="col-12">
                <label for="telepon" class="form-label">Telepon / Whatsapp</label>
                <div class="input-group has-validation">
                <span class="input-group-text"><i class="bi bi-phone"></i></span>
                <input type="number" class="form-control" name="telepon" id="telepon" placeholder="telepon" required>
                <div class="invalid-feedback">
                    Your Telepon is required.
                </div>
                </div>
            </div>

            <div class="col-12">
                <label for="instagram" class="form-label">Instagram</label>
                <div class="input-group has-validation">
                <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                <input type="text" class="form-control" name="instagram" id="instagram" placeholder="instagram (jika ada)">
                <div class="invalid-feedback">
                    Your Instagram is required.
                </div>
                </div>
            </div>

        </div>

        <hr class="my-4">

        <button class="w-100 btn btn-success btn-lg" type="submit">Continue to checkout</button>
      </form>
    </div>
  </div>
    
@endsection