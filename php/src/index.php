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
            width: 650px;
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
                        <h2 class="pull-left">Informasi Pegawai</h2>
                        <a href="create.php" class="btn btn-success pull-right">Tambah Baru</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "koneksi.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM karyawan";
                    if($result = mysqli_query($con, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Id</th>";
                                        echo "<th>Nama</th>";
                                        echo "<th>Alamat</th>";
                                        echo "<th>E-mail</th>";
                                        echo "<th>No Handphone</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($data = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $data['id_karyawan'] . "</td>";
                                        echo "<td>" . $data['nama'] . "</td>";
                                        echo "<td>" . $data['alamat'] . "</td>";
                                        echo "<td>" . $data['email'] . "</td>";
                                        echo "<td>" . $data['no_hp'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?id_karyawan=". $data['id_karyawan'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id_karyawan=". $data['id_karyawan'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id_karyawan=". $data['id_karyawan'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
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
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                    }

                    // Close connection
                    mysqli_close($con);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>