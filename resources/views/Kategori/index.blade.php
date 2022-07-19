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
              <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage">
               Tambah
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
      
<!-- Modal -->
<div class="col-md-4">
   
<div class="modal fade" id="exampleModalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-kategori">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Kategori:</label>
            <input type="text" class="form-control" name="nama_kategori" id="nama_kategori">
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" id="tutup" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn bg-gradient-primary" id="simpan">Simpan</button>
      </div>
    </form>
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
  </script>
  <script>
    $('#simpan').on('click',function() {
      $.ajax({
        url:"{{route('kategori.store')}}",
        type:"post",
        data: {
          nama_kategori : $('#nama_kategori').val(),
          "_token" :"{{csrf_token()}}"
        },
        success : function (res){
          console.log(res.data);
          $('#tutup').click()
          $('#form-kategori')[0].reset()
          $('.yajra-datatable').DataTable().ajax.reload()

        }
      })
    })
  </script>
@endpush
