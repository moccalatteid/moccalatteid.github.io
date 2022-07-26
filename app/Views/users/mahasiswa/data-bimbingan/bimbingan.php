<?= $this->extend('users/mahasiswa/index'); ?>

<?= $this->section('isi'); ?>
<style>
    .bimbingan {
        /* background-color: red; */
        margin-bottom: 10px;
        display: grid;
        grid-template-areas: 'nama nama2 kosong pemb pemb2'
            'nim nim2 kosong prodi prodi2'
            'tahun tahun2 kosong jurusan jurusan2'
        ;
        grid-template-columns: 0.5fr 0.8fr 1fr 0.5fr 0.5fr;
        grid-template-rows: 0.5fr 0.5fr 0.5fr;
        /* background-color: red; */
        justify-content: space-between;

        font-size: 13px;
        font-weight: 400px;

    }

    .nama {
        grid-area: nama;
        /* background-color: blue; */
    }

    .nama2 {
        grid-area: nama2;
        /* background-color: green; */
    }

    .nim {
        grid-area: nim;
        /* background-color: cyan; */
    }

    .nim2 {
        grid-area: nim2;
        /* background-color: salmon; */
        justify-self: start;
    }

    .tahun {
        grid-area: tahun;
        justify-self: start;
        /* background-color: yellow; */
    }

    .tahun2 {
        grid-area: tahun2;
        justify-self: start;
        /* background-color: yellow; */
    }

    .pemb {
        grid-area: pemb;
        justify-self: start;
        /* background-color: violet; */
    }

    .pemb2 {
        grid-area: pemb2;
        justify-self: start;
        /* background-color: brown; */
    }

    .prodi {
        grid-area: prodi;
        justify-self: start;
        /* background-color: darksalmon; */
    }

    .prodi2 {
        grid-area: prodi2;
        justify-self: start;

        /* background-color: hotpink; */
    }

    .jurusan {
        grid-area: jurusan;
        justify-self: start;
        /* background-color: lawngreen; */
    }

    .jurusan2 {
        grid-area: jurusan2;
        justify-self: start;
        /* background-color: khaki; */
    }

    .pilih {
        display: grid;
        grid-template-areas: 'row export';
        grid-template-columns: 1fr 1fr;
    }



    .export {
        /* background-color: red; */
        grid-area: export;
        align-self: end;
        justify-self: end;
    }

    .tambah {
        grid-area: row;
        /* background-color: blue; */
    }
</style>


<h4 class="text-center mb-3">Data Bimbingan</h4>




<div class="bimbingan">

    <div class="nama">
        Nama
    </div>
    <div class="nama2">
        : Muhamad Isro Sabanur
    </div>
    <div class="nim">
        Nim
    </div>
    <div class="nim2">
        : 932018003
    </div>
    <div class="tahun">
        Tahun Akademik
    </div>
    <div class="tahun2">
        : 2020
    </div>
    <div class="pemb">
        Pembimbing 1
    </div>
    <div class="pemb2">
        : Erick Sorongan
    </div>
    <div class="prodi">
        Prodi
    </div>
    <div class="prodi2">
        : Teknik Elektronika
    </div>
    <div class="jurusan">
        Jurusan
    </div>
    <div class="jurusan2">
        : Teknik Elektro
    </div>




</div>




<div class="row">
    <div class="col-4">
        <form action="" method="post">
            <select class="form-control pilihdosen" name="dospem" style="font-size:13px;">
                <!-- <option selected >pilih pembimbing..</option> -->
                <option selected value="">Erick Sorongan - Pembimbing 1</option>
                <option value="">Ihsan - Pembimbing 2</option>
            </select>
    </div>
    <div class=" col">
        <button class="btn btn-primary">
            <small>Filter</small>
        </button>
    </div>
    </form>
</div>


<div class="pilih">
    <div class="tambah">
        <a href="" class="btn btn-primary mt-2">
            <small style="font-weight:500;">Tambah Bimbingan</small>
            <i class="bi bi-clipboard-plus"></i>
        </a>
    </div>
    <div class="export">
        <a href="" style="font-size:13px;" class="btn btn-success">Export
            <i class="bi bi-clipboard-check"></i>
        </a>
    </div>

</div>


<table class="table mt-2">
    <thead style="background-color:#4e73df; color:white; font-size:14px; ">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Uraian</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody style="color:#181818; background-color:#f3f3f3; font-size:14px;">
        <tr>
            <th scope="row">1</th>
            <td>20/10/2021</td>
            <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Adipisci, natus?</td>
            <td style="color:#54df4e; font-weight:800;">Accept</td>
        </tr>
        <tr>
</table>

<div class="jumlahBimbingan">
    <span>Total 1 Bimbingan</span>
</div>

<div style="font-size:14px; " class="keterangan mt-2">
    <p>Keterangan :</p>
    <p>Minimal 10 Bimbingan tiap dosen pembimbing</p>
    <p><span style="color:red; font-weight:800">Waiting</span> : Mengirim data bimbingan </p>
    <p><span style="color:#54df4e; font-weight:800;">Accept</span> : Bimbingan sudah disetujui dosen pembimbing</p>

</div>



<?= $this->endSection(); ?>