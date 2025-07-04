<div class="table-responsive rounded overflow-hidden ">
    <table class="table custom-table table-hover text-light mt-3">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Buku</th>
                <th scope="col">Pengarang Buku</th>
                <th scope="col">Penerbit Buku</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $id_buku = 1;
            if(!empty($book_collections["books"])){
                foreach ($book_collections["books"] as $book){ ?>
                    <tr>
                        <th scope="row" class="fs-sm-5"><?= $id_buku++  ?></th>
                        <td class="fs-sm-5"><?= isset($book["judul_buku"]) ? htmlspecialchars($book["judul_buku"]): "Tidak ada judul buku" ?></td>
                        <td class="fs-sm-5"><?= isset($book["pengarang_buku"]) ? htmlspecialchars($book["pengarang_buku"]): "Tidak ada pengarang buku" ?></td>
                        <td class="fs-sm-5"><?= isset($book["penerbit_buku"]) ? htmlspecialchars($book["penerbit_buku"]) : "Tidak ada penerbit buku" ?></td>
                        <td>
                            <button class="btn btn-primary" onclick="window.location.href='./detail.php?id=<?= htmlspecialchars($book['id_buku']) ?>'">
                                Lihat Selengkapnya
                            </button>
                        </td>
                    </tr>
            <?php 
                } 
            } else { ?>
                <tr>
                    <td scope="row" class="fs-sm-5 text-center" colspan="5">Tidak ada buku</td>
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