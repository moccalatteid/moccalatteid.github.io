<?= $this->extend('sita/index'); ?>




<?= $this->section('isi'); ?>


<?php if (session()->get('role') == 'Admin') { ?>

<?php } else if (session()->get('role') == 'Mahasiswa') {  ?>

    <div class="container">
        <div class="row">
            <div class="col-8">
                <a href="/mahasiswa/bimbingan/<?= $user['id']; ?>" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i></a>
                <h4 class="my-3">Edit Bimbingan</h4>
                <form action="/mahasiswa/updatebimbingan" method="post">
                    <?= csrf_field();  ?>
                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <?php foreach ($edit as $e) { ?>
                                <input type="hidden" name="id_bimbingan" value="<?= $e['id_bimbingan'];  ?>">
                                <input type="hidden" name="id_dospem" value="<?= $e['id_dospem'];  ?>">
                                <input type="hidden" name="status" value="<?= $e['id_status'];  ?>">
                            <?php  }  ?>
                            <input type="text" id="tanggal" autocomplete="off" value="<?= $e['tanggal'];  ?>" class="tm form-control" autofocus name=" tanggal" id="tanggal">
                        </div>

                        <div class="col-sm-1">
                            <span style="color:red;">*</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="uraian" class="col-sm-2 col-form-label">Uraian Bimbingan</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" value="<?= old('uraian');  ?>" name="uraian" placeholder="Isi Uraian Bimbingan" autocomplete="off" id="uraian" rows="4">
                        <?= $e['uraian'];  ?>
                        </textarea>
                        </div>
                        <div class="col-sm-1">
                            <span style="color:red;">*</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="rekomendasi" class="col-sm-2 col-form-label">Rekomendasi Penyelesaian</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" value="<?= old('rekomendasi');  ?>" name="rekomendasi" placeholder="Isi Rekomendasi Penyelesaian" autocomplete="off" id="rekomendasi" rows="4">
                        <?= $e['rekomendasi'];  ?>
                        </textarea>
                        </div>
                        <div class="col-sm-1">
                            <span style="color:red;">*</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" value="<?= old('keterangan');  ?>" name="keterangan" placeholder="isi keterangan bimbingan.." autocomplete="off" id="keterangan" rows="4">
                        <?= $e['keterangan'];  ?>
                        </textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>



<?php } else {  ?>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <a href="/dosen/detail" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i></a>
                <h4 class="my-3">Edit Bimbingan</h4>
                <form action="/dosen/updatebimbingan" method="post">
                    <?= csrf_field();  ?>
                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <?php foreach ($edit as $e) { ?>
                                <input type="hidden" name="id_bimbingan" value="<?= $e['id_bimbingan'];  ?>">
                                <input type="hidden" name="id_dospem" value="<?= $e['id_dospem'];  ?>">

                            <?php  }  ?>
                            <input type="text" id="tanggal" autocomplete="off" value="<?= $e['tanggal'];   ?>" class="tm form-control" autofocus name=" tanggal" id="tanggal">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="uraian" class="col-sm-2 col-form-label">Uraian Bimbingan</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" value="<?= old('uraian');  ?>" name="uraian" placeholder="I" autocomplete="off" id="uraian" rows="4" readonly>
                        <?= $e['uraian'];  ?>
                        </textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="rekomendasi" class="col-sm-2 col-form-label">Rekomendasi Penyelesaian</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" value="<?= old('rekomendasi');  ?>" name="rekomendasi" placeholder="" autocomplete="off" id="rekomendasi" rows="4" readonly>
                        <?= $e['rekomendasi'];  ?>
                        </textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" value="<?= old('keterangan');  ?>" name="keterangan" placeholder="Isi Keterangan" autocomplete="off" id="keterangan" rows="4">
                        <?= $e['keterangan'];  ?>
                        </textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="uraian" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="status" id="">
                                <option value="1">Waiting</option>
                                <option value="2">Accept</option>
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <span style="color:red;">*</span>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>




<?php }  ?>

<?= $this->endSection(); ?>