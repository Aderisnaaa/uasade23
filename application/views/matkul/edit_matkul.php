<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Form Mata Kuliah</h1>
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
                <h3 class="card-tittle">Update Mata Kuliah</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" tittle="Collapse">
                        <i class="fas fa-minus"></i>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" tittle="Collapse">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                <form action="<?php echo base_url('matkul/update/'. $matkul['idmatkul']);?>"  method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="kodematkul">Kode Mata Kuliah</label>
                    <input type="text" class="form-control" name="kodematkul" value= "<?= $matkul['kodematkul'];?>" id="kodematkul" placeholder="kode matkul" required>
                </div>
                <div class="form-group">
                            <label for="namamatkul">Nama Mata Kuliah</label>
                    <input type="text" class="form-control" name="namamatkul" value= "<?= $matkul['namamatkul'];?>" id="namamatkul" placeholder="namamatkul" required>
                </div>
                <div class="form-group">
                            <label for="penerbit">SKS</label>
                    <select class="form-control" name="sks" id="sks" placeholder="sks" required>
                        <option value="">--Pilihan--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="semester">Semester</label>
                    <select class="form-control" name="semester" id="semester" placeholder="semester" required>
                        <option value="">--Pilihan--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                </div>
                <div class="form-group">
                            <label for="jenis">Jenis</label>
                    <select class="form-control" name="jenis" id="jenis" placeholder="jenis" required>
                        <option value="">--Pilih Kategori--</option>
                        <option value="Umum">Umum</option>
                        <option value="Wajib">Wajib</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="prodi">Program Studi</label>
                    <select class="form-control" name="prodi" id="prodi" placeholder="prodi" required>
                        <option value="">--PILIH--</option>
                        <option value="Teknologi Informasi">Teknologi Informasi</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Kompeterisasi Akuntansi">Kompeterisasi Akuntansi</option>
                    </select>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('matkul');?>" class="btn btn-secondary">Batal</a>
                </div>
                </form>
                </div>
                    

                <div class="card-footer">
                                        
                                        </div>
                                    </div>
                                </section>
                            </div>