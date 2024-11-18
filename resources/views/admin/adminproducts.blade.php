@extends('admin.layouts.app')

@section('content')

<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>Products</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>                            
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Products</li>
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="d-flex flex-row-reverse">
                <div class="page_action">
                    <button type="button" class="btn btn-primary"><i class="fa fa-download"></i> Download report</button>
                    <button type="button" class="btn btn-secondary"><i class="fa fa-send"></i> Send report</button>
                </div>
                <div class="p-2 d-flex">
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

