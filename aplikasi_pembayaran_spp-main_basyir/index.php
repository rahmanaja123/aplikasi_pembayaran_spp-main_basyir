<?php
if (!session_id()) session_start();
require_once 'Proses.php';

// buat object
$proses = new Proses;

// cek session, apabila sudah ada maka akan diarahkan ke halaman beranda
if (isset($_SESSION['id'])) {
    if ($_SESSION['level'] == "Admin") {
        header('Location: includes/admin/');
    } else {
        // kita belum buat
        header('Location: petugas/');
    }
}

// ketika tombol masuk diklik maka jalankan kode berikut
if (isset($_POST['masuk'])) {
    // menghindari sql injection
    $username = $proses->konek->real_escape_string($_POST['username']);
    $password = $proses->konek->real_escape_string(sha1($_POST['password']));

    $masuk = $proses->loginPetugas($username, $password);

    if ($masuk->num_rows > 0) {
        $data = mysqli_fetch_assoc($masuk);

        if ($data['level'] == "Admin") {
            header('Location: includes/admin');
            $_SESSION['id'] = $data['id_petugas'];
            $_SESSION['level'] = $data['level'];
        } else {
            header('Location: petugas');
            $_SESSION['id'] = $data['id_petugas'];
            $_SESSION['level'] = $data['level'];
        }
    } else {
        $_SESSION['error'] = "Username atau password tidak valid";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trading Online Dengan ZTECO</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#0099ff" fill-opacity="1" d="M0,64L0,96L75.8,96L75.8,64L151.6,64L151.6,96L227.4,96L227.4,64L303.2,64L303.2,64L378.9,64L378.9,288L454.7,288L454.7,32L530.5,32L530.5,224L606.3,224L606.3,192L682.1,192L682.1,128L757.9,128L757.9,32L833.7,32L833.7,64L909.5,64L909.5,160L985.3,160L985.3,288L1061.1,288L1061.1,64L1136.8,64L1136.8,288L1212.6,288L1212.6,64L1288.4,64L1288.4,288L1364.2,288L1364.2,32L1440,32L1440,0L1364.2,0L1364.2,0L1288.4,0L1288.4,0L1212.6,0L1212.6,0L1136.8,0L1136.8,0L1061.1,0L1061.1,0L985.3,0L985.3,0L909.5,0L909.5,0L833.7,0L833.7,0L757.9,0L757.9,0L682.1,0L682.1,0L606.3,0L606.3,0L530.5,0L530.5,0L454.7,0L454.7,0L378.9,0L378.9,0L303.2,0L303.2,0L227.4,0L227.4,0L151.6,0L151.6,0L75.8,0L75.8,0L0,0L0,0Z"></path>
</svg>

<body>

    <div class="row">
        <div class="col-8">
            <div class="row py-5 px-5">
                <div class="col-4 ">
                    <h1 class="text-end">Trading Online Dengan ZTECO</h1>
                </div>
                <div class="col-4 ">
                    <img src="css/ucok_sableng.svg" alt="" class="" style="width:400px;  ">
                </div>
            </div>
        </div>
        <div class="col-4 py-5 px-5">
            <h2>Silahkan Masukan Data Anda</h2>
            <?php
            if (isset($_SESSION['error'])) {
                echo '<span style="color:red;">' . $_SESSION['error'] . '</span>';
            }
            ?>
            <form method="post" action="" 5complete="off">
                <label for="username" class="form-label">Masukin nama lu bre!</label>
                <input type="text" name="username" id="username" placeholder="Username" class="form-control" style="width:300px">
                <label for="password" class="form-label">Passwordnya bre! awas ada yang intip!</label>
                <input type="password" name="password" id="password" placeholder="Password" class="form-control" style="width:300px">
                <input type="submit" name="masuk" value="Masuk" class="btn btn-primary">
            </form>
        </div>
    </div>

</body>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#0099ff" fill-opacity="1" d="M0,64L0,96L75.8,96L75.8,64L151.6,64L151.6,96L227.4,96L227.4,64L303.2,64L303.2,64L378.9,64L378.9,288L454.7,288L454.7,32L530.5,32L530.5,224L606.3,224L606.3,192L682.1,192L682.1,128L757.9,128L757.9,32L833.7,32L833.7,64L909.5,64L909.5,160L985.3,160L985.3,288L1061.1,288L1061.1,64L1136.8,64L1136.8,288L1212.6,288L1212.6,64L1288.4,64L1288.4,288L1364.2,288L1364.2,32L1440,32L1440,0L1364.2,0L1364.2,0L1288.4,0L1288.4,0L1212.6,0L1212.6,0L1136.8,0L1136.8,0L1061.1,0L1061.1,0L985.3,0L985.3,0L909.5,0L909.5,0L833.7,0L833.7,0L757.9,0L757.9,0L682.1,0L682.1,0L606.3,0L606.3,0L530.5,0L530.5,0L454.7,0L454.7,0L378.9,0L378.9,0L303.2,0L303.2,0L227.4,0L227.4,0L151.6,0L151.6,0L75.8,0L75.8,0L0,0L0,0Z"></path>
</svg>
<!-- link js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>