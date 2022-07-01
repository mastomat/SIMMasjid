<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $judulweb ?></title>
	<link rel="icon" href="<?php echo base_url() ?>assets/upload/logo/<?php echo
																		$logo ?>" type="image/x-icon" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">

</head>

<body class="hold-transition login-page">
	<div class="login-box">

		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<img src="<?php echo base_url() ?>assets/upload/logo/<?php echo $logo ?>" alt="Login Masjid" style="width: 50%;">

			</div>
			<div class="card-body ">
				<div class="text-center mb-4">
					<a href="" class="h1 "><b>Login</b>Admin</a>
				</div>

				<form id="inputform">
					<div class="form-group">
						<label for="username">Username </label>
						<input type="text" name="username" class="form-control" placeholder="Username" id="username" required>

					</div>
					<div class="form-group">
						<label for="psw">Password </label>
						<input type="password" name="password" class="form-control" placeholder="Password" id="psw" required>

					</div>
					<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
								<input type="checkbox" onclick="myFunction()">
								<label for="remember">
									Show Password
								</label>
							</div>
						</div>

						<div class="col-4">
							<button type="submit" class="btn btn-info btn-block"><i class="fas fa-sign-in-alt"></i> Sign In</button>
						</div>

					</div>
				</form>




			</div>

		</div>

	</div>


	<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
	<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="https://adminlte.io/themes/v3/plugins/jquery-validation/jquery.validate.min.js"></script>
	<script src="https://adminlte.io/themes/v3/plugins/jquery-validation/additional-methods.min.js"></script>
	<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js?v=3.2.0"></script>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>


	<script>
		//lihatpassword
		function myFunction() {
			var x = document.getElementById("psw");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
		$(function() {
			$.validator.setDefaults({
				submitHandler: function() {

					var username = $("#username").val();
					var password = $("#psw").val();


					$.ajax({
						type: "POST",
						url: "<?php echo base_url() ?>c_user/cek_admin",
						data: {
							'username': username,
							'password': password,
						},


						success: function(response) {
							if (response == "success") {
								Swal.fire({
									type: 'success',
									title: 'Login Berhasil',
									text: 'Silahkan Login',

								}).then(function() {
									window.location =
										'<?php echo base_url() ?>admin/dasbor';
								});




							} else {
								Swal.fire({
									type: 'error',
									title: 'Login Gagal Gagal!',
									text: 'silahkan coba lagi!'
								});
							}

							console.log(response)
						},

						error: function(response) {
							Swal.fire({
								type: 'error',
								title: 'OOPS!!',
								text: 'Server Error!'
							});
						}




					});







				}
			});
			$('#inputform').validate({
				rules: {
					username: {
						required: true,

					},
					password: {
						required: true,

					},

				},
				messages: {
					username: {
						required: "Masukan Username"

					},
					password: {
						required: "Masukan Password"

					},

				},
				errorElement: 'span',
				errorPlacement: function(error, element) {
					error.addClass('invalid-feedback');
					element.closest('.form-group').append(error);
				},
				highlight: function(element, errorClass, validClass) {
					$(element).addClass('is-invalid');
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).removeClass('is-invalid');
				}
			});
		});
	</script>
</body>

</html>