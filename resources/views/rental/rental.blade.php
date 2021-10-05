@extends ('layouts.master')

@section ('title', 'Laravel')
  
@section('content')
<div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
          <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
        <a href="/cetakrental"  class="btn btn-success btn-edit">Cetak Data</a>
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
            <th>Nama Rental</th>
            <th>Nama Kabupaten/Kota</th>
            <th>Nama Kecamatan</th>
            <th>Nama Kelurahan</th>
            <!-- <th>Longitude</th>
            <th>Latitude</th> -->
            <!-- <th>Hari Buka</th> -->
            <th>Gambar</th>
            <th>Action</th>
          </tr>
          @foreach ($rental as $no => $ren)
            <tr>
              <td>{{ $no+1 }}</td>
              <td>{{ $ren->nama }}</td>
              <td>{{ $ren->nama_kabupaten }}</td>
              <td>{{ $ren->nama_kecamatan }}</td>
              <td>{{ $ren->nama_kelurahan }}</td>
              <td><img width="200px" src=" {{ url('/image/citasu_kamera.jpg') }} "></td>
              <td>
                <a href="/rental/{{$ren->id_rental}}/edit"  class="badge badge-success btn-edit">Edit</a>
                <a href="#" data-id="{{ $ren->id_rental }}" class="badge badge-danger swal-confirm">
                  <form action="{{ route('rental.destroy', $ren->id_rental) }}" id="delete{{ $ren->id_rental }}" method="POST">
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

        <form action=" {{ route('rental.store') }} " method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row"> 
              <div class="col-md-12">
                <div class="form-group">
                  <label @error('nama') 
                  class="text-danger" 
                  @enderror>Nama @error('nama') |
                  {{ $message }} 
                  @enderror</label>
                  <input type="text" name="nama" value=" {{ old('nama') }}" class="form-control">

                  <label for="exampleFormControlSelect1">Nama Kamera</label>
                  <select name="id_kamera" class="form-control" id="exampleFormControlSelect1">
                    @foreach($data2 as $a)
                    <option value="{{$a->id_kamera}}">{{$a->nama_kamera}}</option>
                    @endforeach
                  </select>

                  <label for="exampleFormControlSelect1">Tipe Kamera</label>
                  <select name="id_type_kamera" class="form-control" id="exampleFormControlSelect1">
                    @foreach($data3 as $b)
                    <option value="{{$b->id}}">{{$b->type_kamera}}</option>
                    @endforeach
                  </select>

                  <label for="exampleFormControlSelect1">Nama Perlengkapan</label>
                  <select name="id_perlengkapan" class="form-control" id="exampleFormControlSelect1">
                    @foreach($data4 as $c)
                    <option value="{{$c->id_perlengkapan}}">{{$c->nama_perlengkapan}}</option>
                    @endforeach
                  </select>

                  <label for="exampleFormControlSelect1">Kabupaten/Kota</label>
                  <select name="id_kabupaten" class="form-control" id="exampleFormControlSelect1">
                    @foreach($data5 as $d)
                    <option value="{{$d->id}}">{{$d->nama_kabupaten}}</option>
                    @endforeach
                  </select>

                  <label for="exampleFormControlSelect1">Kecamatan</label>
                  <select name="id_kecamatan" class="form-control" id="exampleFormControlSelect1">
                    @foreach($data6 as $e)
                    <option value="{{$e->id_kecamatan}}">{{$e->nama_kecamatan}}</option>
                    @endforeach
                  </select>

                  <label for="exampleFormControlSelect1">Kelurahan</label>
                  <select name="id_kelurahan" class="form-control" id="exampleFormControlSelect1">
                    @foreach($data7 as $f)
                    <option value="{{$f->id}}">{{$f->nama_kelurahan}}</option>
                    @endforeach
                  </select>

                  <label @error('longitude') 
                  class="text-danger" 
                  @enderror>Longitude @error('longitude') |
                  {{ $message }} 
                  @enderror</label>
                  <input type="text" name="longitude" value=" {{ old('longitude') }}" class="form-control">

                  <label @error('latitude') 
                  class="text-danger" 
                  @enderror>Latitude @error('latitude') |
                  {{ $message }} 
                  @enderror</label>
                  <input type="text" name="latitude" value=" {{ old('latitude') }}" class="form-control">

                  <label @error('hari_buka') 
                  class="text-danger" 
                  @enderror>Hari Buka @error('hari_buka') |
                  {{ $message }} 
                  @enderror</label>
                  <input type="text" name="hari_buka" value=" {{ old('hari_buka') }}" class="form-control">

                  <label @error('jam_buka') 
                  class="text-danger" 
                  @enderror>Jam Buka @error('jam_buka') |
                  {{ $message }} 
                  @enderror</label>
                  <input type="text" name="jam_buka" value=" {{ old('jam_buka') }}" class="form-control">
                  
                  <label @error('gambar') 
                  class="text-danger" 
                  @enderror>Pilih Gambar @error('gambar') |
                  {{ $message }} 
                  @enderror</label>
                  <input type="file" name="gambar" class="form-control-file bt-2" id="gambar">
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

        <form action=" {{ route('rental.store') }} " method="post" id="form-edit">
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
      url:`/rental/rental/${id}/edit`,
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
      url:`/rental/rental/${id}`,
      method:"PATCH",
      data:formData,
      success: function(data) {
        // console.log(data)
        // $('#modal-edit').find('.modal-body').html(data)
        $('#modal-edit').modal('hide')
        window.location.assign('/rental/rental')
      },
      error: function(err) {
        console.log(err.responseJSON)
        let err_log = err.responseJSON.errors;
        if (err.status == 422){
          if(typeof(err_log.nama) !== 'undefined'){
             $('#modal-edit').find('[name = "nama"]').prev().html('<span style="color:red">Nama Rental | '+err_log.nama[0]+'</span>')
          } else {
            $('#modal-edit').find('[name = "nama"]').prev().html('<span>Nama Rental</span>')
          }
        }
      }
    })
  })
</script>
@endpush