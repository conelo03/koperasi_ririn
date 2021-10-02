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
                                        <td class="text-center" width="100%"><h4>LAPORAN KOPERASI YANG MELAKSANAKAN RAT</h4></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="100%"><h4>KABUPATEN SUBANG</h4></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" width="100%"><h4><?= date('Y') ?></h4></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br/>
                            <table class="" border="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td style="text-align:left; width: 60%; height: 50px">Koperasi yang Melakukan RAT</td>
                                        <td>: <?= $jml_koperasi; ?> Koperasi</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left; width: 60%; height: 50px">Jumlah Modal Sendiri</td>
                                        <td>: Rp <?= number_format($rat['modal_sendiri'], 2, ',', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left; width: 60%; height: 50px">Jumlah Modal Luar</td>
                                        <td>: Rp <?= number_format($rat['modal_luar'], 2, ',', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left; width: 60%; height: 50px">Jumlah Volume Usaha</td>
                                        <td>: Rp <?= number_format($rat['volume_usaha'], 2, ',', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left; width: 60%; height: 50px">Jumlah Asset</td>
                                        <td>: Rp <?= number_format($rat['asset'], 2, ',', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left; width: 60%; height: 50px">Jumlah SHU</td>
                                        <td>: Rp <?= number_format($rat['shu'], 2, ',', '.'); ?></td>
                                    </tr>
                              </tbody>
                            </table>
                            <br/>
                            <table class="" border="0">
                                <tbody>
                                    <tr>
                                        <td class="text-center" width="55%"></td>
                                        <td class="text-center">
                                            Subang, <?= date('d F Y') ?><br/>
                                            KEPALA DINAS KOPERASI, UMKM, PERDAGANGAN DAN PERINDUSTRIAN<br/>
                                            KABUPATEN SUBANG<br/><br/><br/><br/><br/>
                                        <b><u>H. DADANG KURNIANUDIN, SIP, M.Si.</u></b><br/>
                                        NIP. 19670709 199703 1 005
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
