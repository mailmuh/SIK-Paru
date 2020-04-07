<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<title>Edit Data</title>
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
				      		<li class="nav-item active">
				        		<a class="nav-link" href="{{ route('datadokters.index') }}"> Data Dokter <span class="sr-only">(current)</span></a>
				      		</li>
				      		<li class="nav-item">
				        		<a class="nav-link" href="{{ route('datapasiens.index') }}">Data Pasien</a>
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
						<center><strong>EDIT DATA DOKTER</strong></center>
					</div>
					<div class="card-body">
						<form action="{{ route('datadokters.update', $datadokter->id_dokter) }}" method="POST">
							@csrf
							@method('PUT')
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>NAMA</label>
									<input type="text" name="nama_dokter" placeholder="Masukan Nama Anda" value="{{ $datadokter->nama_dokter }}" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label>TEMPAT & TANGGAL LAHIR</label>
									<input type="text" name="ttl" placeholder="Masukan Tempat & Tanggal Lahir Anda" value="{{ $datadokter->ttl }}" class="form-control">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>AGAMA</label>
									<input type="text" name="agama" placeholder="Masukan Agama Anda" value="{{ $datadokter->agama }}" class="form-control">
								</div>
								<div class="form-group col-md-6">
					                <label>SPESIALISASI</label>
					                <select name="spesialisasi" class="form-control" required>
						                <option selected disabled>-- Pilih Spesialisasi --</option>
						                <option {{ $datadokter->spesialisasi ? "selected" : "" }} value="{{ $datadokter->spesialisasi }}">Spesialis Penyakit Paru (Pulmonologi)</option>
					                </select>
					            </div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>ALAMAT</label>
									<textarea class="form-control" name="alamat" rows="2" placeholder="Masukan Alamat Anda">{{ $datadokter->alamat }}</textarea>
								</div>
							</div>
							<button type="submit" class="btn btn-success">UPDATE</button>
							<button type="reset" class="btn btn-warning">RESET</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
	<script>
		CKEDITOR.replace( 'content' );
	</script>
</body>
</html>