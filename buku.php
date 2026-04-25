<div class="w-100">
    <h1 class="mt-4">Buku</h1>
    <div class="mb-3 clearfix">
        <?php  if($_SESSION ['user']  ['level'] != "peminjam" ) :?>
         <a href="?page=buku/buku_tambah" class="btn btn-success  border border-4">tambah data </a>
        <?php endif;?>
        
    </div>
    <div class="clearfix">
       <table class="table table-success table-striped table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>judul</th>
                    <th>Nama Katergori</th>
                    <th>gambar</th>
                    <th>Penulis</th>
                    <th>tpenerbit</th>
                    <th>Tahun terbit</th>
                    <th>ISBN</th>
                    <th>jumlah</th>
                    <th>Sinopsis</th>
                     <th>aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM buku");
                    while ($data = mysqli_fetch_array($query)) :
                    
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data["judul"]; ?></td>
                        <td><?= $data["id_kategori"]; ?></td>
                        <td><?= $data["gambar"]; ?>


                        
                        </td>
                        <td><?= $data["penulis"]; ?></td>
                        <td><?= $data["penerbit"]; ?></td>
                        <td><?= $data["tahun_terbit"]; ?></td>
                        <td><?= $data["isbn"]; ?></td>
                        <td><?= $data["jumlah"]; ?></td>
                        <td><?= $data["sinopsis"]; ?></td>
                        
                        <td>
                            <a href="?page=buku/buku_ubah&&id=<?= $data["id_kategori"]; ?> "class="btn btn-warning btn-sm"><i class="fa-solid fa-pen" style="color: rgb(99, 230, 190);"></i></a>
                            <a href="?page=buku/buku_hapus&&id=<?= $data["id_kategori"]; ?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash fa-xl" style="color: rgb(213, 6, 6);"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                
            </tbody>
        </table>
    </div>
</div>