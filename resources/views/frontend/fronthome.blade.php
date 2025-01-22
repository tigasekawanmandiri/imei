@extends('layouts.app')

@push('meta-seo')
<meta name="description" content="{{$global_config_data->deskripsi}}">
<meta name="keywords" content="{{$global_config_data->kata_kunci}}">
<meta property="og:title" content="{{$global_config_data->judul}}" />
<meta property="og:site_name" content="{{$global_config_data->judul}}"/>
<meta property="og:url" content="{{ url()->current()}}"/>
<meta property="og:description" content="{{$global_config_data->deskripsi}}"/>
<meta property="og:image" content="{{ url('files/mainconfig/',$global_config_data->logo) }}"/>
@endpush
@section('title',$global_config_data->judul)
@section('content')


<div class="clearfix" style="padding: 20px 0 20px 0;"></div>

<h2>Streaming</h2>
<hr>
<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
  @foreach ($streaming as $item)
  <div class="col-6 col-md-4">
    <div class="card mb-4 rounded-3 shadow-sm">
      <div class="card-header py-3">
        <h4 class="my-0 fw-normal" style="font-size:20px;">{{$item->product_name}}</h4>
      </div>
      <div class="card-body">
        {{-- <h1 class="card-title pricing-card-title">$0<small class="text-body-secondary fw-light">/mo</small></h1> --}}
        <img class="img-thumbnail" src="{{ url('/files/thumbnail_product/', $item->product_thumbnail)}}" alt="">
        <div style="margin:20px 0 20px;"></div>
        <a href="{{ route('detailProduk',$item->product_slug)}}">
          <a href="{{ route('detailProduk',$item->product_slug)}}">
          <button type="button" class="w-100 btn btn-success">Lihat Produk</button>
        </a>
        </a>
      </div>
    </div>
  </div>
  @endforeach
</div>

<div class="clearfix" style="padding: 20px 0 20px 0;"></div>

<h2>A.I</h2>
<hr>
<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
  @foreach ($ai as $item)
  <div class="col-6 col-md-4">
    <div class="card mb-4 rounded-3 shadow-sm">
      <div class="card-header py-3">
        <h4 class="my-0 fw-normal" style="font-size:20px;">{{$item->product_name}}</h4>
      </div>
      <div class="card-body">
        {{-- <h1 class="card-title pricing-card-title">$0<small class="text-body-secondary fw-light">/mo</small></h1> --}}
        <img class="img-thumbnail" src="{{ url('/files/thumbnail_product/', $item->product_thumbnail)}}" alt="">
        <div style="margin:20px 0 20px;"></div>
        <a href="{{ route('detailProduk',$item->product_slug)}}">
          <button type="button" class="w-100 btn btn-success">Lihat Produk</button>
        </a>
      </div>
    </div>
  </div>
  @endforeach
</div>

<div class="clearfix" style="padding: 20px 0 20px 0;"></div>

<h2>Produktivitas</h2>
<hr>
<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
  @foreach ($productivitas as $item)
  <div class="col-6 col-md-4">
    <div class="card mb-4 rounded-3 shadow-sm">
      <div class="card-header py-3">
        <h4 class="my-0 fw-normal" style="font-size:20px;">{{$item->product_name}}</h4>
      </div>
      <div class="card-body">
        {{-- <h1 class="card-title pricing-card-title">$0<small class="text-body-secondary fw-light">/mo</small></h1> --}}
        <img class="img-thumbnail" src="{{ url('/files/thumbnail_product/', $item->product_thumbnail)}}" alt="">
        <div style="margin:20px 0 20px;"></div>
        <a href="{{ route('detailProduk',$item->product_slug)}}">
          <button type="button" class="w-100 btn btn-success">Lihat Produk</button>
        </a>
      </div>
    </div>
  </div>
  @endforeach
</div>

<div class="clearfix" style="padding: 20px 0 20px 0;"></div>

<h2>Utilitas</h2>
<hr>
<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
  @foreach ($utilitas as $item)
  <div class="col-6 col-md-4">
    <div class="card mb-4 rounded-3 shadow-sm">
      <div class="card-header py-3">
        <h4 class="my-0 fw-normal" style="font-size:20px;">{{$item->product_name}}</h4>
      </div>
      <div class="card-body">
        {{-- <h1 class="card-title pricing-card-title">$0<small class="text-body-secondary fw-light">/mo</small></h1> --}}
        <img class="img-thumbnail" src="{{ url('/files/thumbnail_product/', $item->product_thumbnail)}}" alt="">
        <div style="margin:20px 0 20px;"></div>
        <a href="{{ route('detailProduk',$item->product_slug)}}">
          <button type="button" class="w-100 btn btn-success">Lihat Produk</button>
        </a>
      </div>
    </div>
  </div>
  @endforeach
</div>

<div class="clearfix" style="padding: 20px 0 20px 0;"></div>

<h2>Uncategory</h2>
<hr>
<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
  @foreach ($uncategory as $item)
  <div class="col-6 col-md-4">
    <div class="card mb-4 rounded-3 shadow-sm">
      <div class="card-header py-3">
        <h4 class="my-0 fw-normal" style="font-size:20px;">{{$item->product_name}}</h4>
      </div>
      <div class="card-body">
        {{-- <h1 class="card-title pricing-card-title">$0<small class="text-body-secondary fw-light">/mo</small></h1> --}}
        <img class="img-thumbnail" src="{{ url('/files/thumbnail_product/', $item->product_thumbnail)}}" alt="">
        <div style="margin:20px 0 20px;"></div>
        <a href="{{ route('detailProduk',$item->product_slug)}}">
          <button type="button" class="w-100 btn btn-success">Lihat Produk</button>
        </a>
      </div>
    </div>
  </div>
  @endforeach
</div>

<div class="clearfix" style="padding: 20px 0 20px 0;"></div>

<h2>Entertainment</h2>
<hr>
<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
  @foreach ($entertainment as $item)
  <div class="col-6 col-md-4">
    <div class="card mb-4 rounded-3 shadow-sm">
      <div class="card-header py-3">
        <h4 class="my-0 fw-normal" style="font-size:20px;">{{$item->product_name}}</h4>
      </div>
      <div class="card-body">
        {{-- <h1 class="card-title pricing-card-title">$0<small class="text-body-secondary fw-light">/mo</small></h1> --}}
        <img class="img-thumbnail" src="{{ url('/files/thumbnail_product/', $item->product_thumbnail)}}" alt="">
        <div style="margin:20px 0 20px;"></div>
        <a href="{{ route('detailProduk',$item->product_slug)}}">
          <button type="button" class="w-100 btn btn-success">Lihat Produk</button>
        </a>
      </div>
    </div>
  </div>
  @endforeach
</div>

<div class="clearfix" style="padding: 20px 0 20px 0;"></div>

<h2>Editing</h2>
<hr>
<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
  @foreach ($editing as $item)
  <div class="col-6 col-md-4">
    <div class="card mb-4 rounded-3 shadow-sm">
      <div class="card-header py-3">
        <h4 class="my-0 fw-normal" style="font-size:20px;">{{$item->product_name}}</h4>
      </div>
      <div class="card-body">
        {{-- <h1 class="card-title pricing-card-title">$0<small class="text-body-secondary fw-light">/mo</small></h1> --}}
        <img class="img-thumbnail" src="{{ url('/files/thumbnail_product/', $item->product_thumbnail)}}" alt="">
        <div style="margin:20px 0 20px;"></div>
        <a href="{{ route('detailProduk',$item->product_slug)}}">
          <button type="button" class="w-100 btn btn-success">Lihat Produk</button>
        </a>
      </div>
    </div>
  </div>
  @endforeach
</div>

<div class="clearfix" style="padding: 20px 0 20px 0;"></div>

<h2>Storage</h2>
<hr>
<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
  @foreach ($storage as $item)
  <div class="col-6 col-md-4">
    <div class="card mb-4 rounded-3 shadow-sm">
      <div class="card-header py-3">
        <h4 class="my-0 fw-normal" style="font-size:20px;">{{$item->product_name}}</h4>
      </div>
      <div class="card-body">
        {{-- <h1 class="card-title pricing-card-title">$0<small class="text-body-secondary fw-light">/mo</small></h1> --}}
        <img class="img-thumbnail" src="{{ url('/files/thumbnail_product/', $item->product_thumbnail)}}" alt="">
        <div style="margin:20px 0 20px;"></div>
        <a href="{{ route('detailProduk',$item->product_slug)}}">
          <button type="button" class="w-100 btn btn-success">Lihat Produk</button>
        </a>
      </div>
    </div>
  </div>
  @endforeach
</div>

<div class="clearfix" style="padding: 20px 0 20px 0;"></div>

<h2>Antivirus</h2>
<hr>
<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
  @foreach ($antivirus as $item)
  <div class="col-6 col-md-4">
    <div class="card mb-4 rounded-3 shadow-sm">
      <div class="card-header py-3">
        <h4 class="my-0 fw-normal" style="font-size:20px;">{{$item->product_name}}</h4>
      </div>
      <div class="card-body">
        {{-- <h1 class="card-title pricing-card-title">$0<small class="text-body-secondary fw-light">/mo</small></h1> --}}
        <img class="img-thumbnail" src="{{ url('/files/thumbnail_product/', $item->product_thumbnail)}}" alt="">
        <div style="margin:20px 0 20px;"></div>
        <a href="{{ route('detailProduk',$item->product_slug)}}">
          <button type="button" class="w-100 btn btn-success">Lihat Produk</button>
        </a>
      </div>
    </div>
  </div>
  @endforeach
</div>

<div class="clearfix" style="padding: 20px 0 20px 0;"></div>

<h2>VPN</h2>
<hr>
<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
  @foreach ($vpn as $item)
  <div class="col-6 col-md-4">
    <div class="card mb-4 rounded-3 shadow-sm">
      <div class="card-header py-3">
        <h4 class="my-0 fw-normal" style="font-size:20px;">{{$item->product_name}}</h4>
      </div>
      <div class="card-body">
        {{-- <h1 class="card-title pricing-card-title">$0<small class="text-body-secondary fw-light">/mo</small></h1> --}}
        <img class="img-thumbnail" src="{{ url('/files/thumbnail_product/', $item->product_thumbnail)}}" alt="">
        <div style="margin:20px 0 20px;"></div>
        <a href="{{ route('detailProduk',$item->product_slug)}}">
          <button type="button" class="w-100 btn btn-success">Lihat Produk</button>
        </a>
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection