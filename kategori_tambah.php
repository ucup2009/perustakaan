<div class="w-100">
    <h1 class="mt-4">Kategori Buku</h1>

    <div class="card">
        <div class="card-body">

            <div class="col-md-12">
                <form action="" method="POST">

                    <?php
                    if(isset($_POST["submit"])) {

                        $kategori = strtolower(trim($_POST['kategori']));

                        $cek = mysqli_query($koneksi, "SELECT * FROM kategori WHERE lower(kategori)='$kategori'");
                        $chek = mysqli_num_rows($cek);

                        if($chek > 0) {
                            echo '<div class="alert alert-warning">Data yang dimasukkan sudah ada</div>';
                        } else {

                            $query = mysqli_query($koneksi, "INSERT INTO kategori(kategori) VALUES ('$kategori')");

                            if($query){
                                echo '<div class="alert alert-success">Tambah Data berhasil</div>';
                                echo "<meta http-equiv='refresh' content='1'>";
                            } else {
                                echo '<div class="alert alert-danger">Tambah Data gagal</div>';
                            }
                        }
                    }
                    ?>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label">Nama Kategori</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="kategori" placeholder="Masukkan kategori" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9 offset-md-3">
                            <button class="btn btn-outline-primary" type="submit" name="submit">Simpan</button>
                            <input class="btn btn-secondary" type="reset" value="Reset">
                            <a href="?page=kategori" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>