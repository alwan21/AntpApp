<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/icons/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/icons/css/fontawesome.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap5.css">
    <style>
         /* body {
            font-family: 'open-sans', sans-serif;
        } */
    </style>
</head>
<body>
    {{-- {{ dd($data); }} --}}
    <div class="container">
        <img width="120" src="../assets/img/logo-antp.png" alt="">
        <div class="title">
            <u class="text-center text-primary text-uppercase">
                <h1>INVOICE</h1>
            </u>
        </div>
        <table class="table mb-5 ">
            <tbody>
                <tr>
                    <td width="15%" class="text-end">Nama </td>
                    <td width="1">:</td>
                    <td class="text-start" >{{ $data->name }}</td>
                    <td width="15%" class="text-end">Nomor Invoice</td>
                    <td width="1">:</td>
                    <td class="text-start">{{ $data->invoice_code }}</td>
                </tr>
                <tr>
                    <td width="15%" class="text-end">Alamat </td>
                    <td width="1">:</td>
                    <td class="text-start" >Ciawi, Palimanan, Cirebon, Jawa Barat</td>
                    <td width="15%" class="text-end">Tanggal</td>
                    <td width="1">:</td>
                    <td class="text-start">{{ $data->tanggal }}</td>
                </tr>
                <tr>
                    <td width="15%" class="text-end"> </td>
                    <td width="1"></td>
                    <td class="text-start" ></td>
                    <td width="15%" class="text-end">Jatuh Tempo</td>
                    <td width="1">:</td>
                    <td class="text-start">{{ date('Y-m-d', strtotime($data->tanggal) + 30) }}</td>
                </tr>
                <tr>
                    <td width="15%" class="text-end"> </td>
                    <td width="1"></td>
                    <td class="text-start" ></td>
                    <td width="15%" class="text-end">Mata Uang</td>
                    <td width="1">:</td>
                    <td class="text-start">Rupiah</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered mb-3  bg-primary">
            <thead class="table-primary">
                <tr>
                    <th class="text-center" width="5%">No</th>
                    <th class="text-center" width="20%">Deskripsi</th>
                    <th class="text-center" width="20%">Jumlah</th>
                    <th class="text-center" width="20%">Satuan</th>
                    <th class="text-center" width="20%">Harga</th>
                    <th class="text-center" width="20%">Subtotal</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr height="150px">
                    <td>1</td>
                    <td class="text-start">Paket 10Mbps</td>
                    <td>1</td>
                    <td>Bulan</td>
                    <td class="text-end">{{ number_format(150000,2) }}</td>
                    <td class="text-end">{{ number_format(150000,2) }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr >
                    <td colspan="4" class="text-start">Informasi Pembayaran</td>
                    <td class="text-end">Subtotal</td>
                    <td class="text-end">{{ number_format(150000,2) }}</td>
                </tr>
                <tr >
                    <td colspan="4" class="text-start">Keterangan :</td>                    </td>
                    <td class="text-end">Potongan</td>
                    <td class="text-end">{{ number_format(0,2) }}</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-start">- Pembayaran dengan cek dan giro dianggap sah bila telah diuangkan</td>
                    <td class="text-end">Potongan Point</td>
                    <td class="text-end">{{ number_format(0,2) }}</td>
                </tr>
                <tr >
                    <td colspan="4" class="text-start">- Untuk kelancaran pelayanan harap membayar tepat pada waktunya
                    </td>
                    <td class="text-end">Grand Total</td>
                    <td class="text-end">{{ number_format(150000,2) }}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        Payment T/T (Rupiah) Dapat Dilakukan Melalui :
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="4">
                        Bank Mandiri : 1340 0244 21504 ( Alwan Fachrudin )
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>