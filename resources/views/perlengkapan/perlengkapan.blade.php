@extends ('layouts.master')

@section ('title', 'Laravel')
	
@section('content')
<div class="section-body">
    <div class="row">
    	<div class="col-12 col-md-12 col-lg-12">
          <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
    		  <!-- <a href="#"  class="btn btn-success btn-edit">Cetak Data</a> -->
    		<hr>
        @if (session('message'))
          <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">
                <span>×</span>
              </button>
              {{ session('message') }}
            </div>
          </div>
        @endif
    		<table class="table table-striped table-bordered table-sm">
    			<tr>
    				<th>Nomor</th>
            <th>Nama Perlengkapan</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Gambar</th>
    				<th>Action</th>
    			</tr>
    			@foreach ($perlengkapan as $no => $per)
    				<tr>
    					<td>{{ $no+1 }}</td>
              <td>{{ $per->nama_perlengkapan }}</td>
              <td>{{ $per->stok }}</td>
              <td>{{ $per->harga }}</td>
              <td><img width="250px" src=" {{ url('/image/'.$per->gambar) }} "></td>
    					<td>
    						<a href="/perlengkapan/{{$per->id_perlengkapan}}/edit"  class="badge badge-success btn-edit">Edit</a>
                <a href="#" data-id="{{ $per->id_perlengkapan }}" class="badge badge-danger swal-confirm">
                  <form action="{{ route('perlengkapan.destroy', $per->id_perlengkapan) }}" id="delete{{ $per->id_perlengkapan }}" method="POST">
                    @csrf
                    @method('delete')
                  </form>
                  Delete
                </a>
    					</td>
    				</tr>
    			@endforeach
    		</table>
    		
    	</div>
    </div>
</div>

@section('modal')  
  <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action=" {{ route('perlengkapan.store') }} " method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row"> 
              <div class="col-md-12">
                <div class="form-group">
                  <label @error('nama_perlengkapan') 
                  class="text-danger" 
                  @enderror>Nama Perlengkapan @error('nama_perlengkapan') |
                  {{ $message }} 
                  @enderror</label>
                  <input type="text" name="nama_perlengkapan" value=" {{ old('nama_perlengkapan') }}" class="form-control">

                  <label @error('stok') 
                  class="text-danger" 
                  @enderror>Stok @error('stok') |
                  {{ $message }} 
                  @enderror</label>
                  <input type="text" name="stok" value=" {{ old('stok') }}" class="form-control">
                  
                  <label @error('harga') 
                  class="text-danger" 
                  @enderror>Harga @error('harga') |
                  {{ $message }} 
                  @enderror</label>
                  <input type="text" name="harga" value=" {{ old('harga') }}" class="form-control">

                  <label @error('gambar') 
                  class="text-danger" 
                  @enderror>Gambar @error('gambar') |
                  {{ $message }} 
                  @enderror</label>
                  <input type="file" value=" {{ old('gambar') }}" name="gambar" class="form-control-file">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div> 
   <div class="modal fade" tabindex="-1" role="dialog" id="modal-edit">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action=" {{ route('perlengkapan.store') }} " method="post" id="form-edit">
          @csrf
          <div class="modal-body">
            
          </div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-update">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@endsection

@push('page-scripts')
<script src="{{ asset('assets/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{asset('assets/js/page/bootstrap-modal.js')}}"></script>
@endpush

@push('after-script')
<script>
  $(".swal-confirm").click(function(e) {
  	id = e.target.dataset.id;
    swal({
        title: 'Yakin Menghapus Data? ',
        text: 'Data yang sudah dihapus tidak bisa dikembalikan',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          // swal('Poof! Your imaginary file has been deleted!', {
          //   icon: 'success',
          // });
          $(`#delete${id}`).submit();
        } else {
          // swal('Your imaginary file is safe!');
        }
      });
  });

  @if($errors->any())
    $('#exampleModal').modal('show')
  @endif

  $('.btn-edit').on('click', function(){
    // console.log($(this).data('id'))

    let id = $(this).data('id')
    $.ajax({
      url:`/perlengkapan/perlengkapan/${id}/edit`,
      method:"GET",
      success: function(data) {
        // console.log(data)
        $('#modal-edit').find('.modal-body').html(data)
        $('#modal-edit').modal('show')
      },
      error: function(data) {
        console.log(error)
      }
    })
  })

  $('.btn-update').on('click', function(){
    // console.log($(this).data('id'))

    let id = $('#form-edit').find('#id_data').val()
    let formData = $('#form-edit').serialize()
    // console.log(formData)
    $.ajax({
      url:`/perlengkapan/perlengkapan/${id}`,
      method:"PATCH",
      data:formData,
      success: function(data) {
        // console.log(data)
        // $('#modal-edit').find('.modal-body').html(data)
        $('#modal-edit').modal('hide')
        window.location.assign('/perlengkapan/perlengkapan')
      },
      error: function(err) {
        console.log(err.responseJSON)
        let err_log = err.responseJSON.errors;
        if (err.status == 422){
          if(typeof(err_log.nama) !== 'undefined'){
             $('#modal-edit').find('[name = "nama_perlengkapan"]').prev().html('<span style="color:red">Nama Perlengkapan | '+err_log.nama_perlengkapan[0]+'</span>')
          } else {
            $('#modal-edit').find('[name = "nama_perlengkapan"]').prev().html('<span>Nama Perlengkapan</span>')
          }
        }
      }
    })
  })
</script>
@endpush