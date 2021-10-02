<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-2">
        <div class="mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="" border="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td class="text-center" width="100%"><h4>NAMA-NAMA KOPERASI BERPRESTASI TAHUN <?= date('Y') ?></h4></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br/>
                            <br/>
                            <table class="table" border="1" width="100%">
                                <thead class="">
                                    <th style="text-align:center; width: 30px;">No</th>
                                    <th style="text-align:center; width: 130px;">NAMA KOPERASI</th>
                                    <th style="text-align:center; width: 130px;">NOMOR BADAN HUKUM</th>
                                    <th style="text-align:center; width: 130px;">ALAMAT</th>
                                    <th style="text-align:center; width: 130px;">PERINGKAT</th>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                foreach ($pk as $key) { 
                                    $k = $this->db->get_where('Koperasi', ['id_koperasi' => $key['id_koperasi']])->row_array();
                                    ?>
                                    <tr>
                                        <td style="text-align:center; width: 30px;"><?= $i++; ?></td>
                                        <td><?= strtoupper($k['nama_koperasi']); ?></td>
                                        <td><?= strtoupper($k['nomor_badan_hukum']); ?></td>
                                        <td><?= strtoupper($k['alamat']); ?></td>
                                        <td><?= $key['peringkat']; ?></td>
                                    </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                            <br/>
                            <br/>
                            <table class="" width="100%" border="0">
                                <tbody>
                                    <tr>
                                        <td class="text-center" width="55%"></td>
                                        <td class="text-center">
                                            BUPATI SUBANG<br/><br/><br/><br/><br/>
                                        <b><u>RUHIMAT</u></b><br/>
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
