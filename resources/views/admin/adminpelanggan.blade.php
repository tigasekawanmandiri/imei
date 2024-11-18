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
                <h2>Input Pelanggan Baru</h2>
            </div>
            <div class="body">
                <form action="{{ route('admin.pelanggan.create')}}" id="basic-form" method="post" novalidate>
                    @csrf
                    <div class="form-group">
                        <input type="text" name="nama_pelanggan" value="{{ old('nama_pelanggan')}}" class="form-control" placeholder="Nama Pelanggan Cth. Iqbal Naufal F" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" value="{{ old('email')}}" class="form-control" placeholder="Email Pelanggan Cth. papanaufal@gmail.com" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="telepon" value="{{ old('telepon')}}" class="form-control" placeholder="No WA Pelanggan Cth. 089664635355" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="instagram" value="{{ old('instagram')}}" class="form-control" placeholder="Instagram Pelanggan ( JIKA ADA )" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Data Pelanggan</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Instagram</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Instagram</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($allpelanggan as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama_pelanggan}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->telepon}}</td>
                                <td>{{$item->instagram}}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> 
            </div>
        </div>
    </div>
</div>

@endsection