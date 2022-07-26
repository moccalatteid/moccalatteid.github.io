<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php foreach ($export as $e) :  ?>
        <title><?= $title;  ?> - <?= $e['nama'];  ?></title>
    <?php endforeach;  ?>

    <link rel="shortcut icon" href="<?= base_url(); ?>/img/logo_elektro.png" type="image/x-icon">

</head>

<body>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap');

        body {
            font-family: 'Times New Roman', sans-serif,
        }

        .nama {
            grid-area: nama;
            background-color: blue;
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


        .tableku {
            color: white;
            border-collapse: collapse;
        }

        /* table.kop tr td>* {
            text-align: center;
        } */

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
    <?php if (session()->get('role') == 'Admin') { ?>
        <div class="container">

            <table class="kop" width=" 100%" style="border-bottom: 2px solid black; padding-bottom:-3px; ">
                <tr>
                    <td>
                        <img src="https://poltekba.ac.id/website/uploads/2018/02/RGB.-Abu-131-126-125-Biru-21-10-162-Merah-224-6-37.jpg" width="80px" alt="">
                    </td>
                    <td style=" text-align:center; ">

                        <h6 style="font-weight:400; font-size:16px;">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</h6>
                        <h5 style="font-weight: bold; font-size:14px;">POLITEKNIK NEGERI BALIKPAPAN</h5>
                        <p style="font-size: 13px;">Jalan Soekarno Hatta Kilometer 8 Balikpapan 76126</p>
                        <p style="font-size: 13px;">Telepon (0542) 860895, 862305 Faksimili 861107</p>
                        <p style="font-size: 13px;">Laman www.poltekba.ac.id, Surat Elektronik admin@poltekba.ac.id</p>
                    </td>
                </tr>
        </div>
        </table>

        <div class="title">

            <h3 style="text-align: center; margin-top: 40px;">Lembar Bimbingan PKL</h3>

        </div>

        <?php foreach ($export as $b)  ?>
        <table class="usertabel" style="margin-top: 30px;" width=100%>
            <tr>
                <td>Nama</td>
                <td>: <?= $b['nama'];  ?></td>
                <td></td>
                <td>Pembimbing</td>
                <td>: <?= $dosen['nama'];  ?></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>: <?= $b['nim'];  ?></td>
                <td></td>
                <td>Jurusan</td>
                <td>: <?= $b['jurusan'];  ?></td>
            </tr>
            <tr>
                <td>Tahun Akademik</td>
                <td>: <?= $b['tahun_akademik'];  ?></td>
                <td></td>
            </tr>

        </table>

        <?php $no = 1;  ?>
        <table class="tableku " style="margin-top: 10px;" border=1 width=100%>
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Job Name</th>
                    <th scope="col">Job Sequences</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Status</th>

                </tr>
            </thead>
            <?php foreach ($export as $b) { ?>
                <tbody>
                    <tr>
                        <td style="text-align: center;"><?= $no++;  ?></td>
                        <td style="text-align: center;"><?= $b['tanggal'];  ?></td>
                        <td style="text-align:left; padding: 0px 5px;"><?= $b['uraian'];  ?></td>
                        <td style="text-align:left; padding: 0px 5px;"><?= $b['rekoemdasi'];  ?></td>
                        <td style="text-align:left; padding: 0px 5px;"><?= $b['penyelesaian'];  ?></td>
                        <?php if ($b['id_status'] == 1) { ?>
                            <td style="text-align: center;">Menunggu</td>
                        <?php   } else { ?>
                            <td style="text-align: center;">Disetujui</td>
                        <?php }  ?>
                    </tr>
                </tbody>
            <?php }  ?>
        </table>

        <div class="ttd" style="margin-top:30px; margin-left: 500px ; ">
            <p style="font-size: 13.5px;  ">Mengetahui,</p>
            <p style="font-size: 13.5px; ">Pembimbing <?= $b['pembimbing'];  ?></p>
            <p style="font-size: 13.5px;  margin-top:60px;"><?= $dosen['nama'];  ?></p>
            <p style="font-size: 13.5px; "><?= $b['nip'];  ?></p>
        </div>

    <?php } elseif (session()->get('role') == 'Mahasiswa') { ?>
        <div class="container">
            <table class="kop" width=" 100%" style="border-bottom: 2px solid black; padding-bottom:-3px; text-align: center;">
                <tr>
                    <td>
                        <img src="" width="10px">
                    </td>
                    <td style="text-align: center;">
                        <h6 style=" font-weight:400; font-size:16px; text-align: center;">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</h6>
                        <h5 style="font-weight: bold; font-size:14px; text-align: center;">POLITEKNIK NEGERI BALIKPAPAN</h5>
                        <p style="font-size: 13px; text-align: center;">Jalan Soekarno Hatta Kilometer 8 Balikpapan 76126</p>
                        <p style="font-size: 13px; text-align: center;">Telepon (0542) 860895, 862305 Faksimili 861107</p>
                        <p style="font-size: 13px; text-align: center;">Laman www.poltekba.ac.id, Surat Elektronik admin@poltekba.ac.id</p>
                    </td>
                </tr>
        </div>
        </table>

        <div class="title">
            <h3 style="text-align: center; margin-top: 40px;">Lembar Daily Report PKL</h3>
        </div>

        <?php foreach ($export as $e)  ?>
        <table class="usertabel" style="margin-top: 20px;" width=100%>

            <tr>
                <td>Nama</td>
                <td>: <?= $user['nama_mhs'];  ?></td>
                <td></td>
                <td>Pembimbing</td>
                <td>: <?= $e['nama'];  ?></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>: <?= $user['nim'];  ?></td>
                <td></td>
                <td>Jurusan</td>
                <td>: <?= $user['jurusan'];  ?></td>
            </tr>
            <tr>
                <td>Tahun Akademik</td>
                <td>: <?= $user['tahun_akademik'];  ?></td>
                <td></td>
                <td>Tempat PKL</td>
                <td>: <?= $user['tempat_pkl'];  ?></td>
            </tr>

        </table>

        <?php $no = 1;  ?>
        <table class="tableku " style="margin-top: 10px;" border=1 width=100%>
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Job Name</th>
                    <th scope="col">Job Sequences</th>
                    <th scope="col">Mentor Verified</th>
                </tr>
            </thead>
            <?php foreach ($export as $e) { ?>
                <tbody>
                    <tr>
                        <td style="text-align: center;"><?= $no++;  ?></td>
                        <td style="text-align: center;"><?= $e['tanggal'];  ?></td>
                        <td style="text-align:left; padding: 0px 5px;"><?= $e['job_name'];  ?></td>
                        <td style="text-align:left; padding: 0px 5px;"><?= $e['job_sequences'];  ?></td>
                        <td style="text-align:left; padding: 0px 5px;"></td>
                    </tr>
                </tbody>
            <?php }  ?>
        </table>
    <?php } else {  ?>

    <?php }  ?>

</body>

</html>