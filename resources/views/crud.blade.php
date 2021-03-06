@extends ('layouts.master')

@section ('title', 'Laravel')
	
@section('content')
<div class="section-body">
    <div class="row">
    	<div class="col-12 col-md-12 col-lg-12">
    		<a href="{{ route('crud.tambah') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Tambah Data</a>
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
    				<th>Kode Barang</th>
    				<th>Nama Barang</th>
    				<th>Action</th>
    			</tr>
    			@foreach ($data_barang as $no => $data)
    				<tr>
    					<td>{{ $data_barang->firstItem()+$no }}</td>
    					<td>{{ $data->kode_barang }}</td>
    					<td>{{ $data->nama_barang }}</td>
    					<td>
    						<a href=" {{ route('crud.edit', $data->id) }} " class="badge badge-success">Edit</a>
    						<a href="#" data-id="{{ $data->id }}" class="badge badge-danger swal-confirm">
    							<form action="{{ route('crud.delete', $data->id) }}" id="delete{{ $data->id }}" method="POST">
    								@csrf
    								@method('delete')
    							</form>
    							Delete
    						</a>
    					</td>
    				</tr>
    			@endforeach
    			
    		</table>
    		{{ $data_barang->links() }}
    	</div>
    </div>
</div>
            
@endsection

@push('page-scripts')
<script src="{{ asset('assets/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
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
</script>
@endpush