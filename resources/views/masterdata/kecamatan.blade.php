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
            <th>Kabupaten/Kota</th>
    				<th>Kecamatan</th>
    				<th>Action</th>
    			</tr>
    			@foreach ($data as $no => $dt)
    				<tr>
    					<td>{{ $no+1 }}</td>
              <td>{{ $dt->nama_kabupaten }}</td>
              <td>{{ $dt->nama_kecamatan }}</td>
    					<td>
    						<a href="/kecamatan/{{$dt->id_kecamatan}}/edit"  class="badge badge-success btn-edit">Edit</a>
                <a href="#" data-id="{{ $dt->id_kecamatan }}" class="badge badge-danger swal-confirm">
                  <form action="{{ route('kecamatan.destroy', $dt->id_kecamatan) }}" id="delete{{ $dt->id_kecamatan }}" method="POST">
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

        <form action=" {{ route('kecamatan.store') }} " method="post">
          @csrf
          <div class="modal-body">
            <div class="row"> 
              <div class="col-md-12">
                <div class="form-group">
                  <label @error('nama_kecamatan') 
                  class="text-danger" 
                  @enderror>Nama Kecamatan @error('nama_kecamatan') |
                  {{ $message }} 
                  @enderror</label>
                  <input type="text" name="nama_kecamatan" value=" {{ old('nama_kecamatan') }}" class="form-control">
                  
                  <label for="exampleFormControlSelect1">Nama Kabupaten</label>
                  <select name="id_kabupaten" class="form-control" id="exampleFormControlSelect1">
                    @foreach($data2 as $a)
                    <option value="{{$a->id}}">{{$a->nama_kabupaten}}</option>
                    @endforeach
                  </select>
                  
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

        <form action=" {{ route('setup.store') }} " method="post" id="form-edit">
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
      url:`/master-data/kecamatan/${id}/edit`,
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
      url:`/master-data/kecamatan/${id}`,
      method:"PATCH",
      data:formData,
      success: function(data) {
        // console.log(data)
        // $('#modal-edit').find('.modal-body').html(data)
        $('#modal-edit').modal('hide')
        window.location.assign('/master-data/kecamatan')
      },
      error: function(err) {
        console.log(err.responseJSON)
        let err_log = err.responseJSON.errors;
        if (err.status == 422){
          if(typeof(err_log.nama) !== 'undefined'){
             $('#modal-edit').find('[name = "nama_kecamatan"]').prev().html('<span style="color:red">Kecamatan | '+err_log.nama_kecamatan[0]+'</span>')
          } else {
            $('#modal-edit').find('[name = "nama_kecamatan"]').prev().html('<span>Kecamatan</span>')
          }
        }
      }
    })
  })
</script>
@endpush