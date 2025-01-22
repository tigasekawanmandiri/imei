@extends('admin.layouts.app')

@section('seo_title')
    Admin Settings
@endsection

@push('style')
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/parsleyjs/css/parsley.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
@endpush

@push('script')
<script src="{{ asset('admin/assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>
<script>
$(function() {
    // initialize after multiselect
    $('#basic-form').parsley();
    // initialize dataTables
    $('.js-basic-example').DataTable();
});
</script>
<script src="{{ asset('admin/assets/bundles/datatablescripts.bundle.js') }}"></script>
@endpush

@section('content')

<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>Settings</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i></a></li>                            
                <li class="breadcrumb-item">Settings</li>
                <li class="breadcrumb-item active">Settings</li>
            </ul>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Form Settings</h2>
            </div>
            <div class="body">
                <form action="{{ route('admin.main-config-update',$config->id)}}" id="basic-form" method="post" novalidate>
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Judul website</label>
                        <input type="text" name="judul" value="{{ $config->judul}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Website</label>
                        <textarea type="text" name="deskripsi" class="form-control" required>{{ $config->deskripsi}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Kata Kunci website</label>
                        <input type="text" name="kata_kunci" value="{{ $config->kata_kunci}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Pixel Facebook</label>
                        <textarea type="text" name="meta_pixel" class="form-control" required>{{ $config->meta_pixel}}</textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection