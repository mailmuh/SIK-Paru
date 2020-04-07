<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<title>Data Pasien</title>
</head>
<body>
	<div class="container" style="margin-top: 30px">
		<div class="row">
			
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
					<a class="navbar-brand" href="/">SI Klinik Penyakit Paru</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				    	<span class="navbar-toggler-icon"></span>
				  	</button>
					<div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
				    	<ul class="navbar-nav">
				      		<li class="nav-item">
				        		<a class="nav-link" href="{{ route('datadokters.index') }}"> Data Dokter </a>
				      		</li>
				      		<li class="nav-item active">
				        		<a class="nav-link" href="{{ route('datapasiens.index') }}">Data Pasien <span class="sr-only">(current)</span></a>
				      		</li>
					      	<li class="nav-item">
					        	<a class="nav-link" href="{{ route('datapenyakits.index') }}">Data Penyakit</a>
						    </li>
					      	<li class="nav-item">
					        	<a class="nav-link" href="{{ route('dataobats.index') }}">Data Obat</a>
						    </li>
				    	</ul>
					</div>
				</nav>

				<div class="card">
					<div class="card-header">
						<center><strong>DATA PASIEN</strong></center>
					</div>
					<div class="card-body">
						<a href="{{ route('datapasiens.create') }}" class="btn btn-md btn-success" style="margin-bottom: 10px">Tambah Data</a>
						<table class="table table-bordered" id="myTable">
							<thead>
								<tr>
									<th scope="col">NO</th>
									<th scope="col">NAMA PASIEN</th>
									<th scope="col">TEMPAT & TANGGAL LAHIR</th>
									<th scope="col">UMUR</th>
									<th scope="col">JENIS KELAMIN</th>
									<th scope="col">ALAMAT</th>
									<th scope="col">TANGGAL DATANG</th>
									<th scope="col">GEJALA</th>
									<th scope="col">NAMA PENYAKIT</th>
									<th scope="col">NAMA OBAT</th>
									<th scope="col">AKSI</th>
									<!-- <th><i class="glyphicon glyphicon-cog"></i></th> -->
									
								</tr>
							</thead>
							<tbody>
								@foreach($datapasiens as $d => $datapasien)
								<tr>
									<td>{{ $d+1 }}</td>
									<td>{{ $datapasien->nama_pasien }}</td>
									<td>{{ $datapasien->ttl }}</td>
									<td>{{ $datapasien->umur }}</td>
									<td>{{ $datapasien->jk }}</td>
									<td>{{ $datapasien->alamat }}</td>
									<td>{{ $datapasien->tgl_datang }}</td>
									<td>{{ $datapasien->gejala }}</td>
									<!-- <td>{{ $datapasien->nama_penyakit }}</td> -->
									<td>{{ $datapasien->penyakitPasien['nama_penyakit'] }}</td>
									<!-- <td>{{ $datapasien->nama_obat }}</td> -->
									<td>{{ $datapasien->obatPasien['nama_obat'] }}</td>
									
									<td class="text-center">
										<form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('datapasiens.destroy', $datapasien->id_pasien) }}" method="POST">
											<a href="{{ route('datapasiens.edit', $datapasien->id_pasien) }}" class="btn btn-sm btn-primary">EDIT</a>
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
		$(document).ready( function () {
		  $('#myTable').DataTable();
		} );
    </script>

</body>
</html>