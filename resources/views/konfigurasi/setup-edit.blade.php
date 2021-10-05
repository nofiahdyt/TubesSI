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
@foreach($setup as $setup)
<form action=" /setup/{{$setup->id}}/update " method="post" id="form-edit">
          @csrf
  <div class="row">
    <div class="col-md-12">
      <input type="hidden" name="id" value=" {{ $setup->id }} " id="id_data">
      <div class="form-group">
        <label @error('type_kamera') 
        class="text-danger" 
        @enderror>Tipe Kamera @error('type_kamera') |
        {{ $message }} 
      @enderror</label>
        <input type="text" name="type_kamera" value=" {{ $setup->type_kamera }}" class="form-control">
      </div>
    </div>
  </div>
  <a class="btn btn-secondary" href="/konfigurasi/setup" role="button">Close</a>
            <button type="submit" class="btn btn-primary btn-update">Simpan</button>
</form>
@endforeach
@endsection
@push('page-scripts')
<script src="{{ asset('assets/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{asset('assets/js/page/bootstrap-modal.js')}}"></script>
@endpush
