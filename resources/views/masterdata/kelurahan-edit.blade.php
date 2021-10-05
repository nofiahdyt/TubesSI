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
        @foreach($kelurahan as $kelurahan)
        <form action=" /kelurahan/{{$kelurahan->id}}/update " method="post" id="form-edit">
                  @csrf
          <div class="row"> 
            <div class="col-md-12">
              <input type="hidden" name="id" value=" {{ $kelurahan->id }} " id="id_data">
              <div class="form-group">
                <label @error('nama_kelurahan') 
                class="text-danger" 
                @enderror>Nama Kelurahan @error('nama_kelurahan') |
                {{ $message }} 
              @enderror</label>
              <input type="text" name="nama_kelurahan" value=" {{ $kelurahan->nama_kelurahan }}" class="form-control">

              <label for="exampleFormControlSelect1">Nama Kecamatan</label>
                  <select name="id_kecamatan" class="form-control" id="exampleFormControlSelect1">
                    @foreach($data2 as $a)
                    <option value="{{$a->id_kecamatan}}">{{$a->nama_kecamatan}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
          </div>

          <a class="btn btn-secondary" href="/master-data/kelurahan" role="button">Close</a>
            <button type="submit" class="btn btn-primary btn-update">Simpan</button>
        </form>
    @endforeach
@endsection
@push('page-scripts')
<script src="{{ asset('assets/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{asset('assets/js/page/bootstrap-modal.js')}}"></script>
@endpush