<!doctype html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
		<title>Login Page | Koperasi Tribuana</title>
		<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">
		<link href="<?=base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link
			href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
			rel="stylesheet">
		<style>
			html {
				height: 100%;
			}

			.bg-login {
				background: #2980b9;
				/* fallback for old browsers */
				background: -webkit-linear-gradient(to bottom, #2c3e50, #2980b9);
				/* Chrome 10-25, Safari 5.1-6 */
				background: linear-gradient(to bottom, #2c3e50, #2980b9);
				/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
				display: flex;
				align-items: center;
				height: 100%;
			}

			.form-control-user,
			.btn-user {
				border-radius: 10rem !important;
			}

			.login-wrapper {
				margin: 0 auto;
				width: 20%;

			}

			.content-input input {
				font-size: 0.8rem;
				padding: 1rem 1rem;
			}

			.img-login img {
				border-radius: 50%;
				width: 40%;

			}

			.btn-login {
				background: black !important;

				border: 1px solid black;
				border-radius: 10rem !important;

			}

			.btn-login:hover {
				transform: scale(0.96)
			}

			

		</style>
		<!-- Custom styles for this template-->
			<link href="<?=base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
	</head>

	<body class="bg-login">
		<div class="login-wrapper">
			<div class="content-input text-center">
				<form action="<?=base_url()?>home/login" method="post">
					<h2 class="text-white">Login</h2>
					<h4 class="text-white">Koperasi Tribuana</h4>
					<div class="img-login text-center mb-4 mt-5"><img src="<?=base_url()?>assets/img/user.png" alt=""
							class="shadow-sm"></div>
					<div class="form-group"><input type="text" name="kode_anggota" id="kode_anggota" placeholder="Kode Anggota/Username"
							class="form-control form-control-user mb-3"></div>
					<div class="form-group mb-0"><input type="password" name="password" id="password" placeholder="Password"
							class="form-control form-control-user "></div>
					<div style="color:red" class="mb-2 visible small text-left">
						<p><?=$this->session->flashdata('pesan');?></p>
					</div><input type="submit" value="Login" class="btn p-2 btn-sm btn-login text-white btn-block mb-3"><a
						class="text-white" href="<?=base_url()?>home/register">Daftar Disini! </a>
			</div>
		</div>
		</form>
		<!-- Bootstrap core JavaScript -->
			<script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
			<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
			<!-- Core plugin JavaScript-->
				<script src="<?=base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
				<!-- Custom scripts for all pages-->
					<script src="<?=base_url()?>assets/js/sb-admin-2.min.js"></script>
	</body>

	</html>
