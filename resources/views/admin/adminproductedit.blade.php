@extends('admin.layouts.app')

@section('seo_title')
    {{$seo_title}}
@endsection

@push('style')
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/parsleyjs/css/parsley.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/summernote/dist/summernote.css') }}"/>
@endpush

@push('script')
<script src="{{ asset('admin/assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/summernote/dist/summernote.js') }}"></script>
<script>
$(function() {
    // initialize after multiselect
    $('#basic-form').parsley();
    // initialize dataTables
    $('.js-basic-example').DataTable();
});
</script>
<script src="{{ asset('admin/assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('admin/assets/js/adminproductedit.js')}}"></script>
@endpush

@section('content')

<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>{{ $seo_title }}</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i></a></li>                            
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">{{ $seo_title }}</li>
            </ul>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Edit Produk {{ $products->product_name}}</h2>
            </div>
            <div class="body">
                <form action="{{ route('admin.products.update', $products->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row clearfix">
                    <input type="hidden" value="{{$products->id}}" name="product_id" readonly>
                    <input type="hidden" value="{{$products->product_thumbnail}}" name="hidden_thumbnail" readonly>
                    <div class="col-md-12">
                        <div class="form-group">
                            <img src="{{ url('/files/thumbnail_product/', $products->product_thumbnail)}}" alt="" width="100px">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Update Thumbnail</label>
                            <input type="file" name="product_thumbnail" id="product_thumbnail" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Produk</label>
                            <input type="text" name="product_name" id="product_name" value="{{ $products->product_name }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Kategori Produk</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}" {{$products->category_id == $item->id  ? 'selected' : ''}}>{{$item->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea class="summernote" name="product_description" id="product_description" cols="30" rows="10">{{$products->product_description}}</textarea>
                        </div>
                    </div>
                    
                    <hr>
                        {{-- Produk --}}
                    <div class="body table-responsive">
                        <table class="table" id="#">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>VARIAN</th>
                                    <th>HARGA</th>
                                    <th class="text-center">
                                        <button type="button" class="btn btn-outline-primary" id="BarisBaru">Tambah</button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($varians as $itemvarian)
                                  <tr>
                                    <input type="hidden" value="{{$itemvarian->id}}" name="varian_id[]">
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <select class="form-control" name="duration_id[]" id="">
                                            @foreach ($durations as $itemduration)
                                                <option value="{{$itemduration->id}}" {{ ( $itemduration->id == $itemvarian->duration_id) ? 'selected' : '' }}>{{$itemduration->duration_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="price[]" value="{{$itemvarian->price}}"></td>
                                    <td class="text-center"><a class="btn btn-sm btn-warning" title="Hapus Baris" id="HapusBaris"><i class="fa fa-trash"></i></a></td>
                                  </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>    

                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                    </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection