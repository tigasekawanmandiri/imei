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
                <h2>Input Karyawan Baru</h2>
            </div>
            <div class="body">
                <form action="{{ route('admin.karyawan.create')}}" id="basic-form" method="post" novalidate>
                    @csrf
                    <div class="form-group">
                        <input type="text" name="nama_karyawan" class="form-control" placeholder="Nama Lengkap Karyawan : cth. Iqbal Naufal F " required>
                    </div>
                    <div class="form-group">
                        <select name="jabatan_id" id="" class="form-control" required>
                            <option value="">Pillih Jabatan</option>
                            @foreach ($alljabatan as $item)
                                <option value="{{$item->id}}">{{$item->nama_jabatan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="posisi_id" id="" class="form-control" required>
                            <option value="">Pillih Posisi</option>
                            @foreach ($allposisi as $item)
                                <option value="{{$item->id}}">{{$item->nama_posisi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="status" id="" class="form-control" required>
                            <option value="">Pillih Status Karyawan</option>
                            <option value="1">Aktif</option>
                            <option value="2">Tidak Aktif</option>
                        </select>
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
                <h2>Data Karyawan</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Posisi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Posisi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($allkaryawan as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama_karyawan}}</td>
                                <td>{{$item->rJabatanKaryawan->nama_jabatan}}</td>
                                <td>{{$item->rPosisiKaryawan->nama_posisi}}</td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge badge-success">AKTIF</span>
                                    @else
                                        <span class="badge badge-danger">TIDAK AKTIF</span>
                                    @endif
                                </td>
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