<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | Profile Matching</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="{{ route('login.proses') }}" method="POST">
                    @csrf
					<span class="login100-form-title p-b-43">
						Login
					</span>
					
					
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
                        {{-- <a class="login100-form-btn" href="{{ route('home') }}">Login</a> --}}
					</div>
				</form>
                <div class="login100-more">
                    <div class="row mx-3 py-3">
                        <div class="col-md-12">
                            <div class="card" style="background-color: rgb(255, 255, 255)">
                                <div class="card-title py-2">
                                    <h3 class="text-center">Info Siswa Hasil Profile Matching</h3>
                                </div>
                                <div class="row mx-3 py-3">
                                    <div class="col-md-4">
                                        <input name="search" type="text" class="form-control form-control-sm" placeholder="Search">
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-sm btn-primary">Cari</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Hasil</th>
                                        </tr>
										@forelse ($hasilRekomendasi as $data)
										<tr>
											<td>{{ $no++ }}</td>
                                            <td>{{ $data->siswa->nama }}</td>
											<td>{{ $data->jurusan->nama }}</td>
                                        </tr>
										@empty
											<tr>
												<td colspan="3">Tidak ada data</td>
											</tr>
										@endforelse
										{{-- @foreach($hasilRekomendasi as $data)
                                        <tr>
											<td>{{ $no++ }}</td>
                                            <td>{{ $data->siswa->nama }}</td>
											<td>{{ $data->jurusan->nama }}</td>
                                        </tr>
										@endforeach --}}
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				{{-- <div class="login100-more" style="background-image: url('login/images/bg-01.jpg');"> --}}
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>