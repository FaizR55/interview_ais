@extends('layout.template')

@section('title', 'Index')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">PROGRAMMER TEST</h3>
        </div>

        @if(Session::has('flash_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('flash_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        @endif

        <!-- /.card-header -->
        {{-- {{ dd(get_defined_vars()) }} --}}
        <div class="card-body">
            <table class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Barcode</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Ready</th>
                <th>Onhold</th>
                <th>Delivered</th>
                <th>Packing</th>
                <th>Sent</th>
              </tr>
              </thead>
              <tbody>

              <tr>
                <td>1111</td>
                <td>{{$countresult[0]['total']}}</td>
                <td>{{$sumresult[0]['totalprice']}}</td>
                <td>{{$ready}}</td>
                <td>{{$hold}}</td>
                <td>{{$delivered}}</td>
                <td>{{$packing}}</td>
                <td>{{$sent}}</td>
              </tr>
              <tr>
                <td>1122</td>
                <td>{{$countresult[1]['total']}}</td>
                <td>{{$sumresult[1]['totalprice']}}</td>
                <td>{{$ready2}}</td>
                <td>{{$hold2}}</td>
                <td>{{$delivered2}}</td>
                <td>{{$packing2}}</td>
                <td>{{$sent2}}</td>
              </tr>
              </tbody>
              <tfoot>
            </table>
        </div>
        <!-- /.card-body -->

        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>ID</th>
              <th>Barcode</th>
              <th>Product name</th>
              <th>Price</th>
              <th>Status</th>
              <th scope="col">&nbsp;</th>
              {{-- <th scope="col">&nbsp;</th> --}}
            </tr>
            </thead>
            <tbody>

            @foreach ($data as $d)
            <tr>
              <td>{{$d->id}}</td>
              <td>{{$d->barcode}}</td>
              <td>{{$d->product_name}}</td>
              <td>{{$d->price}}</td>
              <td>{{$d->status}}</td>
              {{-- <td>
                <a href="/data/edit/{{ $d->id }}" class="tm-product-delete-link">
                  <i class="far fa-edit tm-product-img-edit"></i>
                </a>
              </td> --}}
              <td>
                <a href="/data/delete/{{ $d->id }}" class="tm-product-delete-link"
                onclick="return confirm('apakah anda yakin data ber id={{$d->id}} ingin dihapus ?') ">
                  <i class="far fa-trash-alt tm-product-delete-icon"></i>
                </a>
              </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
          </table>
            <div class="d-flex justify-content-center" style="padding-top:10px;">
            <a href="/data/add" class="btn btn-primary btn-block text-uppercase mb-3">Input data Baru</a>
            </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection

@section('scripts')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection
