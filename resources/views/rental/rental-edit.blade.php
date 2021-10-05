
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
        @foreach($rental as $rental)
        <form action=" /rental/{{$rental->id_rental}}/update " method="post" id="form-edit" enctype="multipart/form-data">
                  @csrf
          <div class="row"> 
            <div class="col-md-12">
              <input type="hidden" name="id" value=" {{ $rental->id_rental }} " id="id_data">
              <div class="form-group">
                <label @error('nama') 
                class="text-danger" 
                @enderror>Nama Rental @error('nama') |
                {{ $message }} 
                @enderror</label>
                <input type="text" name="nama" value=" {{ $rental->nama }}" class="form-control">

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
                <input type="text" name="longitude" value=" {{ $rental->longitude }}" class="form-control">

                <label @error('latitude') 
                class="text-danger" 
                @enderror>Latitude @error('latitude') |
                {{ $message }} 
                @enderror</label>
                <input type="text" name="latitude" value=" {{ $rental->latitude }}" class="form-control">

                <label @error('hari_buka') 
                class="text-danger" 
                @enderror>Hari Buka @error('hari_buka') |
                {{ $message }} 
                @enderror</label>
                <input type="text" name="hari_buka" value=" {{ $rental->hari_buka }}" class="form-control">

                <label @error('jam_buka') 
                class="text-danger" 
                @enderror>Jam Buka @error('jam_buka') |
                {{ $message }} 
                @enderror</label>
                <input type="text" name="jam_buka" value=" {{ $rental->jam_buka }}" class="form-control">

                <label @error('gambar') 
                class="text-danger" 
                @enderror>Gambar @error('gambar') |
                {{ $message }} 
                @enderror</label>
                <input type="file" value=" {{ $rental->gambar }}" name="gambar" class="form-control-file">
              </div>
            </div>
          </div>
          <a class="btn btn-secondary" href="/rental/rental" role="button">Close</a>
            <button type="submit" class="btn btn-primary btn-update">Simpan</button>
        </form>
    @endforeach
@endsection
@push('page-scripts')
<script src="{{ asset('assets/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{asset('assets/js/page/bootstrap-modal.js')}}"></script>
@endpush