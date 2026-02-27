<div class="w-100">
    <h1 class="mt-4">Kategori Buku</h1>
    <div class="mb-3 clearfix">
        
         <a href="?page=kategori_tambah" class="btn btn-success  border border-4">tambah data </a>
         
        
    </div>
    <div class="clearfix">
       <table class="table table-success table-striped table table-hover">
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
                            <a href="?page=kategori_ubah&&id=<?= $data["id_kategori"]; ?> "class="btn btn-warning btn-sm"><i class="fa-solid fa-pen" style="color: rgb(99, 230, 190);"></i></a>
                            <a href="?page=kategori_hapus&&id=<?= $data["id_kategori"]; ?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash fa-xl" style="color: rgb(213, 6, 6);"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                
            </tbody>
        </table>
    </div>
</div>