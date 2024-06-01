<?php 

require './skeleton/config/main.php';
// Check session jika sudah login lempar ke dashboard kembali
if (isset($_SESSION["login"])) {
    echo "<script>
            alert('Anda sudah Login!');
            document.location.href = 'index.php';
        </script>";
    exit;
}



if(isset($_POST['submit'])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM user WHERE username = '$username' AND deletedAt IS NULL" );
    // var_dump($result);
    // die();

    if(mysqli_num_rows($result) === 1){

        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $id = $row["id"];
            $query = "UPDATE `user` SET lastLogin = CURRENT_TIMESTAMP WHERE id = $id";

            mysqli_query($db, $query);


            header("Location: index.php");
            $_SESSION["login"]      = true;
            $_SESSION["id"]         = $row["id"];
            $_SESSION["nama"]       = $row["nama"];
            $_SESSION["username"]   = $row["username"];
            $_SESSION["foto"]       = $row["foto"];
            $_SESSION["level"]      = $row["level"];
            exit;
        }
    }
    $error= true;
}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <link rel="icon" type="image/png" href="./public/image/img/Pemkab.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="./skeleton/assets/dist/css/login-scss.css">

	</head>
	<body>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <img src="./public/image/img/Pemkab.png" alt="logo" width="55px" heigth="55px" >
                        </div>

                        <h3 class="text-center mb-4">Login</h3>

                        <!-- pesan error -->
                        <?php if (isset($error)) : ?>
                            <div class="mb-2 alert alert-danger alert-dismissible fade show" role="alert">
                                <i>Username dan Password Salah!</i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <form action="" method="post" class="login-form">
                            <div class="form-group">
                                <input type="text" name="username" id="username" class="form-control rounded-left" placeholder="Username" autocomplete="off" required minlength="5">
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" name="password" id="password" class="form-control rounded-left" placeholder="Password" required>
                            </div>
                            <div class="w-40">
                                <label class="checkbox-wrap checkbox-primary">Show Password
                                    <input type="checkbox" onclick="showPassword()" >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="form-control btn btn-sm btn-primary">Login</button>
                            </div>
                            <div class="form-group">
                                <div class="w-20">
                                    <small>Butuh Bantuan?</small>
                                    <a href="">Hubungi Developer</a>
                                </div>
                            </div>

                        </form>
                        <div class="text-center m-0">
                            <hr>
                            <span><small>Copyright &copy; SIA-KASMARAN <?= date('Y'); ?></small></span>
                        </div>
	                </div>
				</div>
			</div>
		</div>
	</section>

    <script>
    function showPassword(){
        var x = document.getElementById("password");
        if (x.type === "password"){
            x.type = "text";
        } else{
            x.type = "password";
        }
    }
    </script>

    <script src="./skeleton/assets/js-login/jquery.min.js"></script>
    <!-- <script src="./skeleton/assets/js-login/popper.js"></script> -->
    <script src="./skeleton/assets/js-login/bootstrap.min.js"></script>
    <!-- <script src="./skeleton/assets/js-login/main.js"></script> -->

	</body>
</html>

