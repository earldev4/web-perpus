<div class="table-responsive rounded overflow-hidden ">
    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Buku</th>
                <th scope="col">Jenis Buku</th>
                <th scope="col">Kategori</th>
                <th scope="col">Pengarang Buku</th>
                <th scope="col">Penerbit Buku</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $news_per_page = 10;
            $id_buku = ($page - 1) * $news_per_page + 1;
            if(!empty($book_collections["books"])){ 
                foreach ($book_collections["books"] as $book){ ?>
                    <tr>
                        <th scope="row" class="fs-sm-5"><?= htmlspecialchars($id_buku++) ?></th>
                        <td class="fs-sm-5"><?= isset($book["judul_buku"]) ? htmlspecialchars($book["judul_buku"]) : "Tidak ada judul buku" ?></td>
                        <td class="fs-sm-5"><?= isset($book["jenis_buku"]) ? htmlspecialchars($book["jenis_buku"]) : "Tidak ada jenis buku" ?></td>
                        <td class="fs-sm-5"><?= isset($book["kategori_buku"]) ? htmlspecialchars($book["kategori_buku"]) : "Tidak ada kategori buku" ?></td>
                        <td class="fs-sm-5"><?= isset($book["pengarang_buku"]) ? htmlspecialchars($book["pengarang_buku"]) : "Tidak ada pengarang buku" ?></td>
                        <td class="fs-sm-5"><?= isset($book["penerbit_buku"]) ? htmlspecialchars($book["penerbit_buku"]) : "Tidak ada penerbit buku" ?></td>
                        <td class="d-flex flex-column gap-1">
                            <button class="btn btn-primary" onclick="window.location.href='./edit_book.php?id=<?= htmlspecialchars($book['id_buku']) ?>'">
                                Edit Buku
                            </button>
                            <form action="add_book.php" class="delete_book_form" method="POST">
                                <input type="hidden" name="hapus_buku" value="<?= htmlspecialchars($book['id_buku']) ?>">
                                <input type="hidden" name="hapus_informasi" value="<?= htmlspecialchars($book['id_informasi']) ?>">
                                <button class="btn btn-danger w-100">
                                    Hapus Buku
                                </button>
                            </form>
                        </td>
                    </tr>
            <?php 
                } 
            } else { ?>
                <tr>
                    <td scope="row" class="fs-sm-5 text-center" colspan="7">Tidak ada buku</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination d-flex justify-content-center gap-1">
            <?php if ($page > 1): ?> <li class="page-item"><a class="page-link fw-bold" href="add_book.php?page=<?= $page - 1 ?>">Previous</a></li><?php endif; ?>
            <li class="page-item px-1"><span class="page-link fw-bold" href="#"><?= $page."/".$total_page?></span></li>
            <?php if ($page < $total_page): ?> <li class="page-item"><a class="page-link fw-bold" href="add_book.php?page=<?= $page + 1 ?>">Next</a></li><?php endif; ?>
        </ul>
    </nav>
</div>
