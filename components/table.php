<?php if(isset($books)){ ?>
    <div class="table-responsive rounded overflow-hidden bg-white">
        <table class="table custom-table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar Buku</th>
                    <th scope="col">Nama Buku</th>
                    <th scope="col">Jumlah Buku</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id_buku = 1;
                foreach ($books as $book){?>
                    <tr>
                        <th scope="row" class="fs-sm-5"><?= $id_buku++?></th>
                        <th><img src="/assets/img/buku/<?= $book["gambar_buku"]?>" alt="" class="img-fluid rounded" style="width: 100%;max-width: 150px; height: 200px ;"></th>
                        <td class="fs-sm-5"><?= $book["judul_buku"]?></td>
                        <td class="fs-sm-5"><?= $book["jumlah_buku"]?></td>
                        <td><button class="btn btn-primary" onclick="window.location.href='./detail.php?id=<?= $book['id_buku'] ?>'">Lihat Selengkapnya</button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination d-flex justify-content-center gap-1">
                <li class="page-item"><a class="page-link fw-bold" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link fw-bold" href="#">1</a></li>
                <li class="page-item"><a class="page-link fw-bold" href="#">2</a></li>
                <li class="page-item"><a class="page-link fw-bold" href="#">3</a></li>
                <li class="page-item"><a class="page-link fw-bold" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
<?php } else {?>
    <p>Tidak Ada Buku</p>
<?php } ?>