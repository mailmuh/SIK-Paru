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
			<!-- <div class="col-md-8 offset-md-2"> -->
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
					<a class="navbar-brand" href="/">SI Klinik Penyakit Paru</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				    	<span class="navbar-toggler-icon"></span>
				  	</button>
					<div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
				    	<ul class="navbar-nav">
				      		<li class="nav-item">
				        		<a class="nav-link" href="{{ route('datadokters.index') }}"> Data Dokter</a>
				      		</li>
				      		<li class="nav-item active">
				        		<a class="nav-link" href="{{ route('datapasiens.index') }}">Data Pasien  <span class="sr-only">(current)</span></a>
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
						<center><strong>EDIT DATA PASIEN</strong></center>
					</div>
					<div class="card-body">
						<form action="{{ route('datapasiens.update', $datapasien->id_pasien) }}" method="POST">
							@csrf
							@method('PUT')
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>NAMA PASIEN</label>
									<input type="text" name="nama_pasien" placeholder="Masukan Nama Obat" value="{{ $datapasien->nama_pasien }}" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label>TEMPAT TANGGAL LAHIR</label>
									<input type="text" name="ttl" placeholder="Masukan Tempat & Tanggal Lahir Pasien" value="{{ $datapasien->ttl }}" class="form-control" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>UMUR</label>
									<input type="text" name="umur" placeholder="Masukan Umur Pasien" class="form-control" value="{{ $datapasien->umur }}" required>
								</div>
								<div class="form-group col-md-6">
									<label>TANGGAL DATANG</label>
									<input type="date" name="tgl_datang" class="form-control" value="{{ $datapasien->tgl_datang }}" required>
								</div>
							</div>
							<div class="form-group">
								<div class="demo-radio-button">
                            		<label>JENIS KELAMIN</label><br>
                            		<input type="radio" name="jk" id="laki-laki" value="laki-laki" {{ $datapasien->jk == 'laki-laki' ? "checked" : "" }} value="laki-laki" class="with-gap">
                            		<label for="laki-laki">Laki-laki</label>
                            		<input type="radio" name="jk" id="perempuan" value="perempuan" {{ $datapasien->jk == 'perempuan' ? "checked" : "" }} value="" class="with-gap">
                            		<label for="perempuan">Perempuan</label>
                            	</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>ALAMAT</label>
									<textarea type="text" name="alamat" placeholder="Masukan Alamat Pasien" class="form-control" required rows="2">{{ $datapasien->alamat }}</textarea>
								</div>
								<div class="form-group col-md-6">
									<label>GEJALA</label>
									<textarea type="text" name="gejala" placeholder="Masukan Gejala Pasien" class="form-control" required rows="2">{{ $datapasien->gejala }}</textarea>
									<!-- <input type="text" name="gejala" placeholder="Masukan Gejala Pasien" class="form-control" value="{{ $datapasien->gejala }}" required> -->
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<!-- <label>NAMA PENYAKIT</label>
									<input type="text" name="nama_penyakit" placeholder="Masukan Nama Penyakit" class="form-control" value="{{ $datapasien->nama_penyakit }}" required> -->
									<label>NAMA PENYAKIT</label>
									<select name="penyakit_id" class="form-control" required>
										<option value="" disabled selected>-- Pilih Penyakit --</option>
									  	@foreach($datapenyakits as $dtp)
									  		<option {{ $datapasien->penyakit_id == $dtp->id_penyakit ? "selected" : "" }} value="{{ $dtp->id_penyakit }}">{{ $dtp->nama_penyakit }}</option>
									  	@endforeach
									</select>
								</div>
								<div class="form-group col-md-6">
									<!-- <label>NAMA OBAT</label>
									<input type="text" name="nama_obat" placeholder="Masukan Nama Penyakit" class="form-control" value="{{ $datapasien->nama_obat }}" required> -->
									<label>NAMA OBAT</label>
									<select name="obat_id" class="form-control" required>
										<option value="" disabled selected>-- Pilih Obat --</option>
									  	@foreach($dataobats as $dot)
									  		<option {{ $datapasien->obat_id == $dot->id_obat ? "selected" : "" }} value="{{ $dot->id_obat }}">{{ $dot->nama_obat }}</option>
									  	@endforeach
									</select>
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