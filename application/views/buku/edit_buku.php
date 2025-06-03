<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Form Buku</h1>
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
                <h3 class="card-tittle">Update Buku</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" tittle="Collapse">
                        <i class="fas fa-minus"></i>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" tittle="Collapse">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                <form action="<?php echo base_url('buku/update/'. $buku['idbuku']);?>"  method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="judul" value= "<?= $buku['judul'];?>" id="judul" placeholder="judul" required>
                </div>
                <div class="form-group">
                            <label for="penulis">Penulis</label>
                    <input type="text" class="form-control" name="penulis" value= "<?= $buku['penulis'];?>" id="penulis" placeholder="penulis" required>
                </div>
                <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control" name="penerbit" value= "<?= $buku['penerbit'];?>" id="penerbit" placeholder="penerbit" required>
                </div>
                <div class="form-group">
                    <label for="tahunterbit">Tahun Terbit</label>
                    <input type="number" class="form-control" name="tahunterbit" id="tahunterbit" placeholder="Isi tahunterbit" required>
                </div>
                <div class="form-group">
                            <label for="kategori">Kategori</label>
                    <select class="form-control" name="kategori" value= "<?= $kategori['kategori'];?>" id="kategori" placeholder="kategori" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Fiksi">Fiksi</option>
                        <option value="Non Fiksi">Non Fiksi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" name="stok" id="stok" placeholder="stok" required>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('buku');?>" class="btn btn-secondary">Batal</a>
                </div>
                </form>
                </div>
                    

                <div class="card-footer">
                                        
                                        </div>
                                    </div>
                                </section>
                            </div>