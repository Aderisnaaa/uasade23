<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Daftar Mata Kuliah</h1>
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
                <h3 class="card-tittle">List Mata Kuliah</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" tittle="Collapse">
                        <i class="fas fa-minus"></i>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" tittle="Collapse">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('matkul/tambah'); ?>" class="btn btn-primary mb-3">Tambah Mata Kuliah</a>
                    <?php if (!empty($matkul)): ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Mata Kuliah</th>
                                    <th>Nama Mata Kuliah</th>
                                    <th>SKS</th>
                                    <th>Semester</th>
                                    <th>Jenis</th>
                                    <th>Program Studi</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($matkul as $b): ?>
                                        <tr>
                                            <td><?= $b['kodematkul'];?></td>
                                            <td><?= $b['namamatkul'];?></td>
                                            <td><?= $b['sks'];?></td>
                                            <td><?= $b['semester'];?></td>
                                            <td><?= $b['jenis'];?></td>
                                            <td><?= $b['prodi'];?></td>
                                            <td>
                                                <a href="<?= base_url('matkul/edit/'. $b['idmatkul']);?>" class="btn btn-sm btn-info">Edit</a>
                                                <a href="<?= base_url('matkul/hapus/'. $b['idmatkul']);?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus Mata kuliah ini?')">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    </table>
                                    <?php else: ?>
                                        <p> Tidak Ada Mata Kuliah yang tersedia</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-footer">
                                        
                                    </div>
                                </div>
                            </section>
                        </div>