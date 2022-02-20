<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Mendaftar</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/main-logo.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.min.css">
</head>
<body style="min-height:auto;">
	<div class="container">
        <div class="row mt-4">
            <div class="col-sm-12 col-md-6 col-lg-4 mx-auto">
                <div class="card full-height">
                    <div class="card-body">
                        <center>
                            <img src="assets/img/main-logo.png" width="150px" height="100px" alt="logo" style="object-fit:contain;">
                        </center>
                        <div class="card-title text-center">Register Form</div>
                        <div class="card-category text-center">Silahkan lengkapi form di bawah ini.</div>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="siswa[nama]" id="" class="form-control mb-2" placeholder="Nama Anda Disini...">
                                <label for="">Alamat</label>
                                <textarea name="siswa[alamat]" id="" required class="form-control mb-2" placeholder="Alamat Disini..."></textarea>
                                <label for="">Nama Pengguna</label>
                                <input type="text" name="users[username]" id="" class="form-control mb-2" placeholder="Nama Pengguna Disini...">
                                <label for="">Kata Sandi</label>
                                <input type="password" name="users[password]" id="" class="form-control mb-2" placeholder="Kata Sandi Disini...">
                                <button class="btn btn-primary btn-block btn-round">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>