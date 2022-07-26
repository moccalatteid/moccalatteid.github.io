<?= $this->extend('sita/index'); ?>




<?= $this->section('isi'); ?>

<?php if (session()->get('role') == 'Mahasiswa') {  ?>

    <div class="container">
        <div class="row">
            <div class="col-8">
                <a href="/mahasiswa/dailyreport/<?= $user['id']; ?>" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i></a>
                <h4 class="my-3">Edit Daily Report</h4>
                <form action="/mahasiswa/updatedailyreport" method="post">
                    <?= csrf_field();  ?>
                    <?php foreach ($edit as $e) { ?>
                        <input type="hidden" name="id_daily" value="<?= $e['id_daily'];  ?>">
                        <input type="hidden" name="id_dospem" value="<?= $e['id_dospem'];  ?>">
                    <?php  }  ?>
                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="text" id="tanggal" autocomplete="off" value="<?= $e['tanggal'];  ?>" class="tm form-control" autofocus name=" tanggal" id="tanggal">
                        </div>
                        <div class="col-sm-1">
                            <span style="color:red;">*</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jobname" class="col-sm-2 col-form-label">Job Name</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" value="<?= old('jobname');  ?>" name="jobname" placeholder="Isi Uraian Bimbingan" autocomplete="off" id="jobname" rows="4">
                        <?= $e['job_name'];  ?>
                        </textarea>
                        </div>
                        <div class="col-sm-1">
                            <span style="color:red;">*</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jobsequences" class="col-sm-2 col-form-label">Job Sequences</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" value="<?= old('jobsequences');  ?>" name="jobsequences" placeholder="Isi Rekomendasi Penyelesaian" autocomplete="off" id="jobsequences" rows="4">
                        <?= $e['job_name'];  ?>
                        </textarea>
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

<?php } ?>

<?= $this->endSection(); ?>