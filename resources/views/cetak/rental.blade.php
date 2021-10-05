<table class="table table-striped table-bordered table-sm">
    			<tr>
    				<th>Nomor</th>
            <th>Nama Rental</th>
            <th>Nama Kabupaten</th>
            <th>Nama Kecamatan</th>
            <th>Nama Kelurahan</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th>Hari Buka</th>
            <th>Jam Buka</th>
    			</tr>
    			@foreach ($rental as $no => $ren)
    				<tr>
    					<td>{{ $no+1 }}</td>
              <td>{{ $ren->nama }}</td>
              <td>{{ $ren->nama_kabupaten }}</td>
              <td>{{ $ren->nama_kecamatan }}</td>
              <td>{{ $ren->nama_kelurahan }}</td>
              <td>{{ $ren->longitude }}</td>
              <td>{{ $ren->latitude }}</td>
              <td>{{ $ren->hari_buka }}</td>
              <td>{{ $ren->jam_buka }}</td>
    				</tr>
    			@endforeach
</table>