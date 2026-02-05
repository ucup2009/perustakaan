<div class="w-100">
    <h1 class="mt-4">Kategori Buku</h1>
    <div class="mb-3 clearfix">
         <?php if($_SESSION['user']['level'] != 'peminjam') : ?>
         <a href="" class="btn btn-primary">tambah data </a>
         <?php endif;  ?>
        
    </div>
    <div class="clearfix">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM kategori");
                    while ($data = mysqli_fetch_array($query)) :
                    
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['kategori']; ?></td>
                        <td>
                            <a href="?page=kategori_ubah&&id=<?= $data["id_kategori"]; ?> "class="btn btn-warning btn-sm">Edit</a>
                            <a href="?page=kategori_hapus&&id=<?= $data["id_kategori"]; ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                
            </tbody>
        </table>
    </div>
</div>