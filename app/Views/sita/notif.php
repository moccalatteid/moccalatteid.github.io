<?= $this->extend('sita/index'); ?>



<?= $this->section('isi'); ?>

<style>
    .tableku {
        color: white;

        border-collapse: collapse;
    }

    table.kop tr td>* {
        text-align: center;
    }

    th,
    td {
        padding: 10px;

    }

    th {
        color: black;
        font-size: 14px;
        text-align: center;
    }

    td {
        color: black;
        font-size: 14px;
    }
</style>

<h3>Notifikasi</h3>

<table class="tableku mt-2" border=1 width=100%>
    <thead>

        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Pembimbing</th>
            <th>Tanggal</th>
            <th>Uraian</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <?php $no = 1;    ?>

    <?php if (empty($showall)) {  ?>

        <tbody>
            <td style="text-align: center;" colspan="7">Belum ada notifkasi.</td>
        </tbody>

    <?php } else {  ?>
        <?php foreach ($showall as $s) : ?>
            <tbody>
                <td><?= $no++;  ?></td>
                <td><?= $s['nama'];  ?></td>
                <td style="text-align: center;"><?= $s['pembimbing'];  ?></td>
                <td><?= $s['tanggal'];  ?></td>
                <td><?= $s['uraian'];  ?></td>
                <td style="color: red; text-align:center;">Waiting</td>
                <td style="text-align: center;"><a href="/dosen/edit-bimbingan/<?= $s['id_bimbingan'];   ?>" class="btn btn-success">Edit</a></td>

            </tbody>
        <?php endforeach;  ?>
    <?php }  ?>
</table>

<?= $this->endSection(); ?>