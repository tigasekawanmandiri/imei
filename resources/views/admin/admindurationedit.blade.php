@extends('admin.layouts.app')

@section('seo_title')
    {{$seo_title}}
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
                <h2>Edit Durasi</h2>
            </div>
            <div class="body">
                <form action="{{ route('admin.duration.update',$duration->id)}}" id="basic-form" method="post" novalidate>
                    @csrf
                    <div class="form-group">
                        <label>Nama Durasi</label>
                        <input type="text" name="nama_durasi" value="{{ $duration->duration_name}}" class="form-control" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection