@extends('layout.template')
@section('title', 'Tambah Data')

@section('content')

 <!-- general form elements -->
 <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Input data baru</h3>
    </div>
    <!-- /.card-header -->
    {{--dd($data)--}}
    <!-- form start -->
    <form action="/data/store" method="POST">
    @csrf
      <div class="card-body">
        <div class="form-group">
            <label>Barcode</label>
            <select name="barcode" class="form-control">
                <option value="">== SELECT BARCODE ==</option>
                <option value="1111">1111</option>
                <option value="1122">1122</option>
            </select>
        </div>

        <div class="form-group">
          <label>Product name</label>
          <input type="text" class="form-control" name="name" placeholder="">
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" name="price" placeholder="">
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="">== SELECT STATUS ==</option>
                <option value="READY">READY</option>
                <option value="ONHOLD">ONHOLD</option>
                <option value="PACKING">PACKING</option>
                <option value="SENT">SENT</option>
                <option value="DELIVERED">DELIVERED</option>
            </select>
        </div>
      </div>

      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  <!-- /.card -->

@endsection
