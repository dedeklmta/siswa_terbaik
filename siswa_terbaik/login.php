<?php
include_once 'includes/config.php';

$config = new Config();
$db = $config->getConnection();

if ($_POST) {
    include_once 'includes/login.inc.php';
    $login = new Login($db);
    $login->userid = $_POST['username'];
    $login->passid = md5($_POST['password']);
    if ($login->login()) {
        echo "<script>location.href='index.php'</script>";
    } else {
        $msg = "Username / Password tidak sesuai!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Warnet Equator</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/sweetalert.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
                    <div class="panel panel-default login-box">
                        <div class="panel-heading"><h3 class="text-center">LOGIN USER</h3></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username" autofocus="on">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-dark raised btn-block">Login</button>
                            <br>
                            <p class="text-center">&copy; 2019 | built by. <a href="https://www.google.com/maps/place/eQuator+Internet/@-7.7963123,110.4014356,15z/data=!4m5!3m4!1s0x0:0x7d27af971e3d6171!8m2!3d-7.7963123!4d110.4014356">Warnet Equator</a> </p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
	<?php if (isset($msg)): ?>
    <script type="text/javascript">
		swal({
            title: "Maaf!",
            text: "<?=$msg?>",
            type: "error",
            timer: 2000,
            confirmButtonColor: "#DD6B55"
		})
	</script>
	<?php endif; ?>
</body>
</html>
