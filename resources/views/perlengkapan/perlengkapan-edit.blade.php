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
        @foreach($perlengkapan as $perlengkapan)
        <form action=" /perlengkapan/{{$perlengkapan->id_perlengkapan}}/update " method="post" id="form-edit" enctype="multipart/form-data">
                  @csrf
          <div class="row"> 
            <div class="col-md-12">
            <input type="hidden" name="id" value=" {{ $perlengkapan->id_perlengkapan }} " id="id_data">
            <div class="form-group">
            <label @error('nama_perlengkapan') 
              class="text-danger" 
              @enderror>Nama Perlengkapan @error('nama_perlengkapan') |
              {{ $message }} 
              @enderror</label>
            <input type="text" name="nama_perlengkapan" value=" {{ $perlengkapan->nama_perlengkapan }}" class="form-control">


            <label @error('stok') 
             class="text-danger" 
              @enderror>Stok @error('stok') |
              {{ $message }} 
              @enderror</label>
            <input type="text" name="stok" value=" {{ $perlengkapan->stok }}" class="form-control">

            <label @error('harga') 
              class="text-danger" 
              @enderror>Harga @error('harga') |
              {{ $message }} 
              @enderror</label>
            <input type="text" name="harga" value=" {{ $perlengkapan->harga }}" class="form-control">

            <label @error('gambar') 
              class="text-danger" 
              @enderror>Gambar @error('gambar') |
              {{ $message }} 
              @enderror</label>
            <input type="file" value=" {{ $perlengkapan->gambar }}" name="gambar" class="form-control-file">
            </div>
          </div>
        </div>
          <a class="btn btn-secondary" href="/perlengkapan/perlengkapan" role="button">Close</a>
            <button type="submit" class="btn btn-primary btn-update">Simpan</button>
        </form>
    @endforeach
@endsection
@push('page-scripts')
<script src="{{ asset('assets/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{asset('assets/js/page/bootstrap-modal.js')}}"></script>
@endpush