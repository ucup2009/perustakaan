<div class="w-100">
    <h1 class="mt-4"> Buku</h1>

    <div class="card bg-success mb-3">
        <div class="card-body">

            <div class="col-md-12">
                <form action="" method="POST">

                    <?php
                      if (isset($_POST['submit'])) {

                            $judul     = trim($_POST['judul'] ?? '');
                            $penulis   = trim($_POST['penulis'] ?? '');
                            $penerbit  = trim($_POST['penerbit'] ?? '');

                            // validasi kosong
                            if ($judul == '' || $penulis == '' || $penerbit == '') {
                                echo "<script>alert('Semua field wajib diisi');</script>";
                            } else {

                                // cek duplikat judul
                                $cek = mysqli_query($koneksi, "SELECT * FROM buku WHERE judul='$judul'");

                                if (mysqli_num_rows($cek) > 0) {
                                    echo "<script>alert('Judul buku sudah ada');</script>";
                                } else {

                                    mysqli_query($koneksi, "INSERT INTO buku (judul, penulis, penerbit) 
                                                            VALUES ('$judul', '$penulis', '$penerbit')");

                                    echo "<script>alert('Tambah data berhasil');location='index.php?page=buku';</script>";
                                }
                            }
                        }
                    ?>

                     <div class="mb-3">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Penulis</label>
                                <input type="text" name="penulis" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Penerbit</label>
                                <input type="text" name="penerbit" class="form-control">
                            </div>

                            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        </div>    

                </form>
            </div>

        </div>
    </div>
</div>