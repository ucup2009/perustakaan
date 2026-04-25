<div class="w-100">
    <h1 class="mt-4">Tambah Buku</h1>

    <div class="card bg-success mb-3 text-white">
        <div class="card-body">
            <div class="col-md-12">
                <form action="" method="POST" enctype="multipart/form-data">

                    <?php
                    if (isset($_POST['submit'])) {
                        $judul         = trim($_POST['judul'] ?? '');
                        $id_kategori   = $_POST['id_kategori'] ?? '';
                        $penulis       = trim($_POST['penulis'] ?? '');
                        $penerbit      = trim($_POST['penerbit'] ?? '');
                        $tahun_terbit  = trim($_POST['tahun_terbit'] ?? '');
                        $isbn          = trim($_POST['isbn'] ?? '');
                        $jumlah        = trim($_POST['jumlah'] ?? '');
                        $sinopsis      = trim($_POST['sinopsis'] ?? '');

                        // Logika Upload Gambar
                        $gambar = $_FILES['gambar']['name'];
                        $tmp    = $_FILES['gambar']['tmp_name'];
                        $lokasi = 'assets/img/'; 
                        $nama_gambar_baru = date('dmYHis') . $gambar; // Nama unik agar tidak bentrok

                        if ($judul == '' || $id_kategori == '') {
                            echo "<script>alert('Judul dan Kategori wajib diisi');</script>";
                        } else {
                            // Proses pindah file
                            move_uploaded_file($tmp, $lokasi . $nama_gambar_baru);

                            $query = "INSERT INTO buku (id_kategori, judul, penulis, penerbit, tahun_terbit, isbn, jumlah, sinopsis, gambar) 
                                      VALUES ('$id_kategori', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$isbn', '$jumlah', '$sinopsis', '$nama_gambar_baru')";
                            
                            if(mysqli_query($koneksi, $query)) {
                                echo "<script>alert('Tambah data berhasil');location='index.php?page=buku';</script>";
                            } else {
                                echo "<script>alert('Gagal simpan ke database');</script>";
                            }
                        }
                    }
                    ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Kategori</label>
                                <select name="id_kategori" class="form-control" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <?php 
                                    $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                                    while($k = mysqli_fetch_array($kat)){
                                        echo '<option value="'.$k['id_kategori'].'">'.$k['kategori'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Gambar Sampul</label>
                                <input type="file" name="gambar" class="form-control" accept="image/*">
                                <small class="text-light">*Format: jpg, png, jpeg</small>
                            </div>
                            <div class="mb-3">
                                <label>Penulis</label>
                                <input type="text" name="penulis" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Penerbit</label>
                                <input type="text" name="penerbit" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Tahun Terbit</label>
                                <input type="number" name="tahun_terbit" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Jumlah Stok</label>
                                <input type="number" name="jumlah" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Sinopsis</label>
                                <textarea name="sinopsis" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" name="submit" class="btn btn-primary">Simpan Buku</button>
                        <a href="index.php?page=buku" class="btn btn-danger">Kembali</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>