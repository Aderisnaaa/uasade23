<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Status Pasien</h1>
    </section>
    <section class="content">
        <form action="<?= base_url('pasien/update_status/'.$pasien['idpasien']); ?>" method="post">
            <div class="form-group">
                <label for="kategori">Status</label>
                <select name="kategori" id="kategori" class="form-control" required>
                    <option value="">-- Pilih Status --</option>
                    <?php foreach($kategori_pasien as $kat): ?>
                        <option value="<?= $kat['idkategori']; ?>" <?= ($pasien['kategori'] == $kat['idkategori']) ? 'selected' : ''; ?>>
                            <?= $kat['kategori']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('kategori', '<small class="text-danger">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url('pasien'); ?>" class="btn btn-secondary">Batal</a>
        </form>
    </section>
</div>
