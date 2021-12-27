<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    	<?php
				//Include file koneksi, untuk koneksikan ke database
				include "koneksi.php";

				//Fungsi untuk mencegah inputan karakter yang tidak sesuai
				function input($data) {
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}
				//Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_karyawan
				if (isset($_GET['id_karyawan'])) {
					$id_karyawan=input($_GET["id_karyawan"]);

					$sql="select * from karyawan where id_karyawan=$id_karyawan";
					$hasil=mysqli_query($con,$sql);
					$data = mysqli_fetch_assoc($hasil);
				}

				//Cek apakah ada kiriman form dari method post
				if ($_SERVER["REQUEST_METHOD"] == "POST") {

					$id_karyawan=htmlspecialchars($_POST["id_karyawan"]);
					$nama=input($_POST["nama"]);
					$alamat=input($_POST["alamat"]);
					$email=input($_POST["email"]);
					$no_hp=input($_POST["no_hp"]);

					//Query update data pada tabel anggota
					$sql="update karyawan set
							nama='$nama',
							alamat='$alamat',
							email='$email',
							no_hp='$no_hp'
							where id_karyawan=$id_karyawan";

					//Mengeksekusi atau menjalankan query diatas
					$hasil=mysqli_query($con,$sql);

					//Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
					if ($hasil) {
						header("Location:index.php");
					}
					else {
						echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";
					}
				}
			?>
		    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
				<label>Nama:</label>
				<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" placeholder="Masukan Nama" required/>

			</div>
			<div class="form-group">
				<label>Alamat:</label>
				<textarea name="alamat" class="form-control" rows="5" placeholder="Masukan Alamat" required><?php echo $data['alamat']; ?></textarea>

			</div>
			<div class="form-group">
				<label>Email:</label>
				<input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" placeholder="Masukan Email" required/>
			</div>
			<div class="form-group">
				<label>No HP:</label>
				<input type="text" name="no_hp" class="form-control" value="<?php echo $data['no_hp']; ?>" placeholder="Masukan No HP" required/>
			</div>
			<input type="hidden" name="id_karyawan" value="<?php echo $data['id_karyawan']; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>