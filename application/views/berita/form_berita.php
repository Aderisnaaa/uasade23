<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Daftar Berita</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-tittle">List Berita</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" tittle="Collapse">
                        <i class="fas fa-minus"></i>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" tittle="Collapse">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                <form action="<?php echo base_url(). "berita/insert";?>" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" placeholder="judul" required>
                </div>
                <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" name="kategori" id="kategori" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php if (!empty($kategori)): ?>
                                <?php foreach ($kategori as $k):?>
                                    <option value="<?= $k->idkategori; ?>"><?= $k->kategori; ?></option>
                                <?php endforeach; ?>
                            <?php endif;?>
                        </select>
                </div>
                <div class="form-group">
                            <label for="headline">Headline</label>
                    <input type="text" class="form-control" name="headline" id="headline" placeholder="headline" required>
                </div>
                <div class="form-group">
                    <label for="isi_berita">Isi_berita</label>
                    <textarea class="form-control summernote" name="isi_berita" id="isi_berita" placeholder="Isi Berita" required></textarea>
                </div>
                <div class="form-group">
                    <label for="pengirim">Pengirim</label>
                    <input type="text" class="form-control" name="pengirim" id="pengirim" placeholder="pengirim" required>
                </div>
                <div class="form-group">
                    <label for="tgl_publish">Tanggal Publish</label>
                    <input type="date" class="form-control" name="tgl_publish" id="tgl_publish" placeholder="Tanggal Publish" required>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
                </div>
                    

                <div class="card-footer">
                                        
                                        </div>
                                    </div>
                                </section>
                            </div>