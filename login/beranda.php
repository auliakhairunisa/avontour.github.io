<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 1000px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Administrator</h2>
                        <a href="logout.php" class="btn btn-success pull-right">Logout</a>
                        <a href="create.php" class="btn btn-success pull-right">Tambah Baru</a>
                        <a href="index.html" class="btn btn-success pull-right">Website</a>
                    </div>
                    <div style="margin:auto;width:600px;padding:20px">
                        <?php include("aksi.php") ?>
                        <form action="" method="POST" enctype="multipart/form-data" class="row g-2">
                            <div class="col-auto">
                                <input class="form-control" type="file" name="filexls" id="formFile">
                            </div>
                            <div class="col-auto">
                                <input type="submit" name="submit" class="btn btn-primary" value="Upload File xlsx"/>
                            </div>
                        </form>   
                    </div>

                    <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM destinasi";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Nama Destinasi</th>";
                                        echo "<th>Jenis Destinasi</th>";
                                        echo "<th>Provinsi</th>";
                                        echo "<th>Alamat</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['nama'] . "</td>";
                                        echo "<td>" . $row['jenis'] . "</td>";
                                        echo "<td>" . $row['alamat'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }

                    // Close connection
                    mysqli_close($conn);
                    ?>

                    
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin:auto;width:600px;padding:20px">
        <script type="text/javascript" src="../js/fusioncharts.js"></script>
        <script type="text/javascript" src="../js/themes/fusioncharts.theme.fint.js"></script>
        <script type="text/javascript">
            FusionCharts.ready(function(){
                    var revenueChart = new FusionCharts({
                        "type":"column2d",
                        "renderAt":"posisix",
                        "width": "500",
                        "height":"300",
                        "dataFormat":"json",
                        "dataSource":{
                            "chart":{
                                "caption":"Jenis Destinasi Wisata",
                                "xaxisName":"Jenis",
                                "yAxisName":"Jumlah",
                                "theme":"fint"
                            },
                            "data":[
                                {"label":"Pantai","value":"5"},
                                {"label":"Danau","value":"1"},
                                {"label":"Pergunungan","value":"1"},
                                {"label":"Perbukitan","value":"2"},
                                {"label":"Air Terjun","value":"2"},
                                {"label":"Hutan","value":"1"},
                            ]
                        }
                    });
                    revenueChart.render();
                }
            )
        </script>
        <div id="posisix"></div>
    </div>
</body>
</html>