<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$nama = $jenis = $alamat = "";
$nama_err = $jenis_err = $alamat_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_nama = trim($_POST["nama"]);
    if(empty($input_nama)){
        $nama_err = "Masukkan nama tempat destinasi wisata.";
    } elseif(!filter_var($input_nama, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Masukkan nama tempat destinasi wisata.";
    } else{
        $nama = $input_nama;
    }

    $input_jenis = trim($_POST["jenis"]);
    if(empty($input_jenis)){
        $jenis_err = "Masukkan jenis tempat destinasi wisata.";
    } elseif(!filter_var($input_jenis, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $jenis_err = "Masukkan jenis tempat destinasi wisata.";
    } else{
        $jenis = $input_jenis;
    }

    // Validate address
    $input_alamat = trim($_POST["alamat"]);
    if(empty($input_alamat)){
        $alamat_err = "Masukkan alamat tempat destinasi wisata.";
    } else{
        $alamat = $input_alamat;
    }

    

    // Check input errors before inserting in database
    if(empty($nama_err) && empty($jenis_err) && empty($alamat_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO destinasi (nama, jenis, alamat) VALUES (?, ?, ?)";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_nama, $param_jenis, $param_alamat);

            // Set parameters
            $param_nama = $nama;
            $param_jenis = $jenis;
            $param_alamat = $alamat;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: beranda.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 700px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Tambah Data</h2>
                    </div>
                    <p>Silahkan isi form di bawah ini kemudian submit untuk menambahkan data destinasi wisata ke dalam database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($nama_err)) ? 'has-error' : ''; ?>">
                            <label>Nama Destinasi Wisata</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>">
                            <span class="help-block"><?php echo $nama_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($jenis_err)) ? 'has-error' : ''; ?>">
                            <label>Jenis Destinasi Wisata</label>
                            <input type="text" name="jenis" class="form-control" value="<?php echo $jenis; ?>">
                            <span class="help-block"><?php echo $jenis_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($alamat_err)) ? 'has-error' : ''; ?>">
                            <label>Alamat Destinasi Wisata</label>
                            <textarea name="alamat" class="form-control"><?php echo $alamat; ?></textarea>
                            <span class="help-block"><?php echo $alamat_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="beranda.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>