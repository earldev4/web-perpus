<div class="passwordMenu">
    <div class="modal fade" id="changePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= $routing->navSubmit()?>" method="POST" id="changePassword">
                        <label for="oldPassword" class="form-label">Masukkan Password Lama</label><br>
                        <input type="password" class="form-control" id="old_password" name="old_password" required placeholder="Masukkan password lama"><br>
                        <label for="newPassword" class="form-label">Masukkan Password Baru</label><br>
                        <input type="password" class="form-control" id="new_password" name="new_password" required placeholder="Masukkan password baru"><br>
                        <button type="submit" class="btn btn-primary w-100" name="submit">Simpan</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>