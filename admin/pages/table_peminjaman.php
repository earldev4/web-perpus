<div class="table-responsive rounded overflow-hidden ">
    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NIP</th>
                <th scope="col">Buku</th>
                <th scope="col">Tanggal Peminjaman</th>
                <th scope="col">Tanggal Pengembalian</th>
                <th scope="col">No Telephone</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $users_per_page = 10;
            $id_peminjam = ($page - 1) * $users_per_page + 1;
            if(!empty($peminjam["users"])){ 
                foreach ($peminjam["users"] as $peminjaman){ ?>
                    <tr>
                        <th scope="row" class="fs-sm-5"><?= htmlspecialchars($id_peminjam) ?></th>
                        <td class="fs-sm-5"><?= isset($peminjaman["nama_peminjam"]) ? htmlspecialchars($peminjaman["nama_peminjam"]) : "" ?></td>
                        <td class="fs-sm-5"><?= isset($peminjaman["nip_peminjam"]) ? htmlspecialchars($peminjaman["nip_peminjam"]) : "" ?></td>
                        <td class="fs-sm-5"><?= isset($peminjaman["judul_buku"]) ? htmlspecialchars($peminjaman["judul_buku"]) : "" ?></td>
                        <td class="fs-sm-5"><?= isset($peminjaman["tanggal_peminjaman"]) ? formatTanggalIndonesia(htmlspecialchars($peminjaman["tanggal_peminjaman"])) : "" ?></td>
                        <td class="fs-sm-5"><?= isset($peminjaman["tanggal_pengembalian"]) ? formatTanggalIndonesia(htmlspecialchars($peminjaman["tanggal_pengembalian"])) : "" ?></td>
                        <td class="fs-sm-5"><?= isset($peminjaman["no_telp"]) ? htmlspecialchars($peminjaman["no_telp"]) : "" ?></td>
                        <td class="fs-sm-5"><?= isset($peminjaman["status_peminjaman"]) ? ($peminjaman["status_peminjaman"] == "DIPINJAM" ? "<span class='badge bg-success p-2'>Dipinjam</span>" : "<span class='badge bg-danger p-2'>Dikembalikan</span>") : "" ?></td>
                        <td class="gap-1">
                            <a class="btn btn-primary mb-1" href="detail_peminjaman.php?id=<?= htmlspecialchars($peminjaman['id_peminjaman'])?>&&no=<?= $id_peminjam ?>">
                                Detail Peminjaman
                            </a>
                            <form action="lend_page.php" class="lend_book" method="POST">
                                <input type="hidden" name="id_peminjaman" value="<?= htmlspecialchars($peminjaman['id_peminjaman']) ?>">
                                <button class="btn btn-danger">
                                    Hapus Peminjaman
                                </button>
                            </form>
                        </td>
                    </tr>
            <?php 
                $id_peminjam++; } 
            } else { ?>
                <tr>
                    <td scope="row" class="fs-sm-5 text-center" colspan="9">Tidak ada Data Peminjaman</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination d-flex justify-content-center gap-1">
            <?php if ($page > 1): ?> <li class="page-item"><a class="page-link fw-bold" href="lend_page.php?page=<?= $page - 1 ?>">Previous</a></li><?php endif; ?>
            <li class="page-item px-1"><span class="page-link fw-bold" href="#"><?= $page."/".$total_page?></span></li>
            <?php if ($page < $total_page): ?> <li class="page-item"><a class="page-link fw-bold" href="lend_page.php?page=<?= $page + 1 ?>">Next</a></li><?php endif; ?>
        </ul>
    </nav>
</div>
