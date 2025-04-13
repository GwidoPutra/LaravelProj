<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 6px 20px 5px 20px;
            line-height: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 4px 3px;
        }

        th {
            text-align: left;
        }

        .d-block {
            display: block;
        }

        img.image {
            width: 100px; /* Atur lebar foto */
            height: 80px; /* Atur tinggi foto */
            max-width: 150px;
            max-height: 150px;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .p-1 {
            padding: 5px 1px 5px 1px;
        }

        .font-10 {
            font-size: 10pt;
        }

        .font-11 {
            font-size: 11pt;
        }

        .font-12 {
            font-size: 12pt;
        }

        .font-13 {
            font-size: 13pt;
        }

        .border-bottom-header {
            border-bottom: 1px solid;
        }

        .border-all,
        .border-all th,
        .border-all td {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <table class="border-bottom-header">
        <tr>
            <td width="15%" class="text-left">
                <img src="{{ public_path('polinema-bw.png') }}" class="image">
            </td>
            <td width="85%">
                <span class="text-center d-block font-11 font-bold mb-1">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</span>
                <span class="text-center d-block font-13 font-bold mb-1">POLITEKNIK NEGERI MALANG</span>
                <span class="text-center d-block font-10">Jl. Soekarno-Hatta No. 9 Malang 65141</span>
                <span class="text-center d-block font-10">Telepon (0341) 404424 Pes. 101-105, 0341-404420, Fax. (0341) 404420</span>
                <span class="text-center d-block font-10">Laman: www.polinema.ac.id</span>
            </td>
        </tr>
    </table>
    <h3 class="text-center">LAPORAN DATA PENJUALAN</h3>
    <table class="border-all">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Kode Penjualan</th>
                <th class="text-center">Tanggal Penjualan</th>
                <th class="text-center">Pembeli</th>
                <th class="text-center">Penginput</th>
                <th class="text-center">Detail ID</th>
                <th class="text-center">Barang ID</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualan as $b)
                @php
                    $total = 0;
                @endphp
                @foreach($b->detail as $d)
                    @php
                        $subtotal = $d->harga * $d->jumlah;
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td class="text-center">{{ $loop->parent->iteration }}</td>
                        <td>{{ $b->penjualan_kode }}</td>
                        <td>{{ $b->penjualan_tanggal }}</td>
                        <td>{{ $b->pembeli }}</td>
                        <td>{{ $b->user->username}}</td>
                        <td>{{ $d->detail_id }}</td>
                        <td>{{ $d->barang->barang_nama }}</td>
                        <td>Rp.{{ number_format($d->harga, 0, ',', '.') }}</td>
                        <td>{{ $d->jumlah }}</td>
                        <td>Rp.{{ number_format($subtotal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="9" class="text-end"><strong>Total</strong></td>
                    <td><strong>Rp.{{ number_format($total, 0, ',', '.') }}</strong></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
