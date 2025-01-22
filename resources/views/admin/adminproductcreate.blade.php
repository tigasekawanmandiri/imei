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
<script src="{{ asset('admin/assets/js/adminproduct.js')}}"></script>
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
                <h2>Tambah Produk</h2>
            </div>
            <div class="body">
                <form action="{{ route('admin.product.create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Thumbnail</label>
                            <input type="file" name="product_thumbnail" id="product_thumbnail" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Produk</label>
                            <input type="text" name="product_name" id="product_name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Kategori Produk</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea class="summernote" name="product_description" id="product_description" cols="30" rows="10"></textarea>
                        </div>
                    </div>

                    <hr>
                        {{-- Produk --}}
                    <div class="body table-responsive">
                        <table class="table" id="tableLoop">
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
                              
                            </tbody>
                        </table>
                    </div>    

                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection