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
@foreach($kamera as $kamera)
<form action=" /kamera/{{$kamera->id_kamera}}/update " method="post" id="form-edit" enctype="multipart/form-data">
          @csrf
<div class="row"> 
  <div class="col-md-12">
    <input type="hidden" name="id" value=" {{ $kamera->id_kamera }} " id="id_data">
    <div class="form-group">

      <label @error('nama_kamera') 
      class="text-danger" 
      @enderror>Nama Kamera @error('nama_kamera') |
      {{ $message }} 
      @enderror</label>
      <input type="text" name="nama_kamera" value=" {{ $kamera->nama_kamera }}" class="form-control">

      <label for="exampleFormControlSelect1">Tipe Kamera</label>
      <select name="id_type_kamera" class="form-control" id="exampleFormControlSelect1">
        @foreach($data3 as $b)
          <option value="{{$b->id}}">{{$b->type_kamera}}</option>
        @endforeach
      </select>

      <label @error('stok') 
      class="text-danger" 
      @enderror>Stok @error('stok') |
      {{ $message }} 
      @enderror</label>
      <input type="text" name="stok" value=" {{ $kamera->stok }}" class="form-control">

      <label @error('harga') 
      class="text-danger" 
      @enderror>Harga @error('harga') |
      {{ $message }} 
      @enderror</label>
      <input type="text" name="harga" value=" {{ $kamera->harga }}" class="form-control">

      <label @error('gambar') 
      class="text-danger" 
      @enderror>Gambar @error('gambar') |
      {{ $message }} 
      @enderror</label>
      <input type="file" value=" {{ $kamera->gambar }}" name="gambar" class="form-control-file">
    </div>
  </div>
</div>
<a class="btn btn-secondary" href="/kamera/kamera" role="button">Close</a>
<button type="submit" class="btn btn-primary btn-update">Simpan</button>
</form>
@endforeach
@endsection
@push('page-scripts')
<script src="{{ asset('assets/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{asset('assets/js/page/bootstrap-modal.js')}}"></script>
@endpush