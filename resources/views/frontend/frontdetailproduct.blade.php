@extends('layouts.app')

@push('meta-seo')
    <meta name="description" content="{!!$details->product_description!!}">
    <meta name="keywords" content="{{$global_config_data->kata_kunci}}">
    <meta property="og:title" content="{{$details->product_name}}" />
    <meta property="og:site_name" content="{{$global_config_data->judul}}"/>
    <meta property="og:url" content="{{ url()->current()}}"/>
    <meta property="og:description" content="{!!$details->product_description!!}"/>
    <meta property="og:image" content="{{ url('/files/thumbnail_product/',$details->product_thumbnail)}}"/>
@endpush

@section('title',$global_config_data->judul)

@section('content')

<div class="row row-cols-1 row-cols-md-3 mb-3">
    <div class="col-md-6">
        <img class="img-thumbnail" src="{{ url('/files/thumbnail_product/',$details->product_thumbnail)}}" alt="">
    </div>
    <div class="col-md-6">
        <div class="row row-cols-1">
            <div class="col">
                <h2>{{$details->product_name}}</h2>
            </div>
            <div class="col">
                <h5>Deskripsi :</h5>
                <p style="font-size: 16px; color:#fff !important;">{!!$details->product_description!!}</p>
            </div>
            <div class="col">
                <form action="{{ route('toCheckout')}}" method="POST">
                    @csrf
                    <select class="form-control" name="varian_id" id="" required>
                        <option value="">Pilih Varian</option>
                        @foreach ($details->rProductVarian as $item) 
                            <option value="{{$item->id}}">{{$item->sdurationname->duration_name}}</option>
                        @endforeach
                    </select>
                    <div style="margin: 20px 0px 20px 0;">
                        <button type="submit" class="w-100 btn btn-success">Checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection