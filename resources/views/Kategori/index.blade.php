@extends('layout.master')
@section('title')
Kategori
@endsection
@section('breadcrumb')
@parent
<li class="breadcrumb-item text-sm text-white active" aria-current="page">Kategori</li>
@endsection

@section('content')
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
            <button type="button" onclick="add()" class="btn btn-outline-primary">
              Tambah kategori
            </button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table yajra-datatable">
                  <thead>
                    <tr>
                      <th class="text-center ext-uppercase text-secondary text-xs font-weight-bolder opacity-7">Kategori</th>
                      <th class="text-center ext-uppercase text-secondary text-xs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>     
@endsection
@push('pagescript')
  <script>
    $(document).ready(function(){

    });
    $(function() {
      $('.yajra-datatable').DataTable( {
              pageLength: 10,
              serverside: true,
              ajax:{
                url: "{{route('kategori')}}"
              },
              columns:[
                {data:'nama_kategori', name:'nama_kategori'},
                {data:'aksi', name:'aksi'}
              ]
              
          } );
    } );
    function add(){
      $('#modal-tambah').modal('show');
    }      
  </script>
@endpush
