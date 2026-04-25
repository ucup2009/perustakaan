<div class="w-100">
    <h1 class="mt-4">Ubah Kategori</h1>

    <div class="card bg-success text-white"> <div class="card-body">
            <div class="col-md-12">
                
                <?php
                $id = $_GET['id'];

                // 1. AMBIL DATA LAMA untuk ditampilkan di form
                $query_lama = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id'");
                $data = mysqli_fetch_array($query_lama);

                // 2. PROSES UPDATE (Jika tombol simpan ditekan)
                if(isset($_POST['submit'])){
                    $kategori = strtolower($_POST['kategori']);
                    
                    // Cek apakah nama kategori sudah ada (kecuali milik data ini sendiri)
                    $cek = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori='$kategori' AND id_kategori != '$id'");
                    if (mysqli_num_rows($cek) > 0){
                        echo "<div class='alert alert-warning'>Nama kategori sudah ada!</div>";
                    } else {
                        $update = mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori' WHERE id_kategori='$id'");
                        if($update) {
                            echo '<script>alert("Ubah data berhasil"); location.href="?page=kategori";</script>';
                        } else {
                            echo '<script>alert("Ubah data gagal");</script>';
                        }
                    }
                }
                ?>

                <form action="" method="POST">
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-capitalize">
                            Kategori
                        </label>
                        
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="kategori" 
                                   value="<?php echo $data['kategori']; ?>" 
                                   placeholder="Masukkan kategori" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9 offset-md-3">
                            <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                            <a href="?page=kategori" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>