<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

$server = "localhost";
$user = "root";
$pass = "";
$database = "web_login";

$conn = mysqli_connect($server, $user, $pass, $database);

if(isset($_POST['submit'])){
    $err        = "";
    $ekstensi   = "";
    $success    = "";

    $file_name = $_FILES['filexls']['name'];
    $file_data = $_FILES['filexls']['tmp_name'];

    if(empty($file_name)){
        $err .= "<li>Silahkan masukkan file yang diinginkan.</li>";
    }else{
        $ekstensi = pathinfo($file_name)['extension'];
    }

    $ekstensi_allowed = array("xls", "xlsx");
    if(!in_array($ekstensi,$ekstensi_allowed)){
        $err .= "<li>Silakan masukkan file tipe xls atau xlsx.</li>";
    }

    if(empty($err)){
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
        $spreadsheet = $reader->load($file_data);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        $jumlahData = 0;
        for($i=1;$i<count($sheetData);$i++){
            $nama = $sheetData[$i]['1'];
            $jenis = $sheetData[$i]['2'];
            $alamat = $sheetData[$i]['3'];

            $sql1 = "INSERT INTO xls(nama, jenis, alamat) value('$nama','$jenis','alamat')";

            mysqli_query($conn,$sql1);
            
            $jumlahData++;

        }
    }

    if($err){
        ?>
        <div class="alert alert-danger">
            <ul><?php echo $err ?></ul>
        </div>
    <?php
    }

    if($success){
        ?>
        <div class="aler alert-primary">
            <?php echo $success ?>
        </div>
        <?php
    }
}
