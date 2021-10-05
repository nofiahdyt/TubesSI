@extends ('layouts.master')

@section ('title', 'Laravel')
  
@section('content')
<div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        Edit Data
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
        @foreach($kecamatan as $kecamatan)
        <form action=" /kecamatan/{{$kecamatan->id_kecamatan}}/update " method="post" id="form-edit">
                  @csrf
          <div class="row"> 
            <div class="col-md-12">
              <input type="hidden" name="id" value=" {{ $kecamatan->id_kecamatan }} " id="id_data">
              <div class="form-group">
                <label @error('nama_kecamatan') 
                class="text-danger" 
                @enderror>Nama Kecamatan @error('nama_kecamatan') |
                {{ $message }} 
              @enderror</label>
              <input type="text" name="nama_kecamatan" value=" {{ $kecamatan->nama_kecamatan }}" class="form-control">

              <label for="exampleFormControlSelect1">Nama Kabupaten/Kota</label>
                  <select name="id_kabupaten" class="form-control" id="exampleFormControlSelect1">
                    @foreach($data2 as $a)
                    <option value="{{$a->id}}">{{$a->nama_kabupaten}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
          </div>
          </div>
          <a class="btn btn-secondary" href="/master-data/kecamatan" role="button">Close</a>
            <button type="submit" class="btn btn-primary btn-update">Simpan</button>
        </form>
    @endforeach
@endsection
@push('page-scripts')
<script src="{{ asset('assets/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{asset('assets/js/page/bootstrap-modal.js')}}"></script>
@endpush