@extends('admin.layouts.app')

@section('seo_title')
    {{$seo_title}}
@endsection

@push('style')
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/parsleyjs/css/parsley.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('script')
<script src="{{ asset('admin/assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(function() {
    // initialize after multiselect
    $('#basic-form').parsley();
    // initialize dataTables
    $('.js-basic-example').DataTable();

    $('.js-pelanggan').select2();

    $('.js-produk').select2();
});
</script>
<script src="{{ asset('admin/assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('admin/assets/js/adminsales.js')}}"></script>
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
            <div class="body">
                <form action="{{ route('admin.sales.create')}}" method="post" novalidate enctype="multipart/form-data" id="basic-form">
                    @csrf
                    {{-- Order --}}
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NO INVOICE</label>
                                <input type="text" name="invoice" value="{{$invoice}}" class="form-control" required readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>TANGGAL</label>
                                <input type="text" name="tanggal" value="{{now()->format('d-m-Y')}}" class="form-control" required readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CS</label>
                                <select name="cs_id" class="form-control" id="" required>
                                    <option value="">Pilih CS</option>
                                    @foreach ($cs as $item)
                                        <option value="{{$item->id}}">{{$item->nama_karyawan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>SHIFT</label>
                                <select name="shift_id" class="form-control" id="" required>
                                    <option value="">Pilih Shift</option>
                                    <option value="1">Shift 1</option>
                                    <option value="2">Shift 2</option>
                                    <option value="3">Shift 3</option>
                                    <option value="4">Shift 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>PUKUL</label>
                                <input type="time" name="pukul" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">PELANGGAN</label>
                                <select name="pelanggan_id" class="form-control js-pelanggan" id="js-pelanggan" required>
                                    <option value=""> Cari Pelanggan</option>
                                    @foreach ($allpelanggan as $item)
                                        <option value="{{$item->id}}">{{strtoupper($item->nama_pelanggan)}} | {{$item->telepon}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <hr>


                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">KANAL PENJUALAN</label>
                                <select name="kanal_id" class="form-control kanal_id" id="kanal_id" required>
                                    <option value="">Pilih Kanal</option>
                                    @foreach ($allkanal as $item)
                                        <option value="{{$item->id}}">{{$item->nama_kanal}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">AKUN PENJUALAN</label>
                                <select name="akun_id" class="form-control akun_id" id="akun_id" required>
                                    <option value="">Pilih Akun</option>
                                    @foreach ($allakun as $item)
                                        <option value="{{$item->id}}">{{$item->nama_akun}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">SUMBER INTERAKSI</label>
                                <select name="sumber_id" class="form-control sumber_id" id="sumber_id" required>
                                    <option value="">Pilih Sumber</option>
                                    @foreach ($allsumberinteraksi as $item)
                                        <option value="{{$item->id}}">{{$item->nama_sumber}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">STRATEGI SELLING</label>
                                <select name="strategi_id" class="form-control strategi_id" id="strategi_id" required>
                                    <option value="">Pilih Strategi</option>
                                    @foreach ($allstrategi as $item)
                                        <option value="{{$item->id}}">{{$item->nama_strategi}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Metode Transfer</label>
                                <select name="bank_id" class="form-control bank_id" id="bank_id" required>
                                    <option value="">Pilih Bank</option>
                                    @foreach ($banks as $item)
                                        <option value="{{$item->id}}"> {{$item->nama_pemilik}} | {{$item->nama_bank}} | {{$item->no_rek}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Bukti Transfer</label>
                                <input type="file" class="form-control" name="bukti_transfer" required>
                            </div>
                        </div>
                    </div>

                    <hr>

                    {{-- Produk --}}
                    <div class="body table-responsive">
                        <table class="table" id="tableLoop">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>PRODUK</th>
                                    <th>QTY</th>
                                    <th>PRICE</th>
                                    <th>DISCOUNT</th>
                                    <th>SUB TOTAL</th>
                                    <th class="text-center">
                                        <button type="button" class="btn btn-outline-primary" id="BarisBaru">Tambah</button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                              
                            </tbody>
                        </table>
                    </div>

                    <hr>

                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">TOTAL</label>
                                <input type="text" class="form-control" name="total" id="total" readonly>
                            </div>
                        </div>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection