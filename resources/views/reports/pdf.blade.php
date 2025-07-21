<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Rapor {{ $report->nama }} - {{ $report->kelas }}</title>
    <style>
        @page {
            size: A4;
            margin: 2cm;
            page-break-after: always;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
            font-size: 12px;
        }

        th {
            background-color: #a1b6cdff;
            font-weight: bold;
        }

        .section-header {
            font-weight: bold;
            background-color: #a1b6cdff;
        }

        .text-center {
            text-align: center;
        }

        .point-header {
            font-weight: bold;
        }

        .sub-point {
            padding-left: 20px;
        }

        .ceklis {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 20px;
            text-align: center;
        }

        .divider {
            border-top: dashed #ffffffff;
            margin: 2px 0;
        }

        .student-name {
            text-align: left;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .guru {
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <table>
        <tr style="border:none;">
            <td colspan="7" class="text-center" style="border:none;"><strong>LAPORAN CAPAIAN
                    PEMBELAJARAN SISWA</strong></td>
        </tr>
        <tr style="border:none;">
            <td colspan="7" class="text-center" style="border:none;">
                <strong>{{ $report->kelas }}</strong>
            </td>
        </tr>
        <tr style="border:none;">
            <td colspan="7" class="text-center" style="border:none;"><strong>SEMESTER
                    {{ $report->semester == '1' ? 'I' : 'II' }}</strong>
            </td>
        </tr>
        <tr style="border:none;">
            <td colspan="7" class="text-center" style="border:none;"><strong>TAHUN PELAJARAN
                    {{ $report->tahun_ajaran }}</strong>
            </td>
        </tr>
        <tr style="border:none;">
            <td colspan="2" style="border:none;"></td>
            <td colspan="3" class="text-center" style="border:none;"><strong>{{ $report->nama }}</strong>
            </td>
            <td colspan="2" style="border:none;"></td>
        </tr>
        <tr>
            <th width="5%"></th>
            <th width="60%">CAPAIAN PEMBELAJARAN</th>
            <th width="5%">BM</th>
            <th width="5%">MM</th>
            <th width="5%">BSH</th>
            <th width="5%">BSB</th>
            <th width="15%">KET</th>
        </tr>
        <!-- A. NILAI AGAMA DAN BUDI PEKERTI -->
        <tr class="section-header">
            <td colspan="7">A.<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>NILAI AGAMA DAN BUDI
                PEKERTI</td>
        </tr>
        <!-- POIN A1 -->
        <tr>
            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>1</strong>
            </td>
            <td><strong>Dapat mengucapkan bacaan doa dan lagu keagamaan sederhana</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>1.1. Mengikuti bacaan doa/berdoa sebelum dan sesudah kegiatan</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A11 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A11 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A11 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A11 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_A11 }}</td>
        </tr>
        <tr>
            <td>1.2. Menirukan lagu-lagu keagamaan</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A12 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A12 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A12 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A12 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_A12 }}</td>
        </tr>
        <!-- POIN A2 -->
        <tr>
            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>2</strong>
            </td>
            <td><strong>Dapat mengucapkan bacaan doa dan lagu keagamaan sederhana</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>2.1. Mengikuti bacaan doa/berdoa sebelum dan sesudah kegiatan</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A21 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A21 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A21 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A21 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_A21 }}</td>
        </tr>
        <tr>
            <td>2.2. Menirukan lagu-lagu keagamaan</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A22 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A22 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A22 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A22 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_A22 }}</td>
        </tr>
        <!-- POIN A3 -->
        <tr>
            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>3</strong>
            </td>
            <td><strong>Mengucap doa sebelum dan sesudah melakukan sesuatu</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>3.1. Doa sebelum melakukan kegiatan </td>
            <td style="text-align: center;" class="ceklis">{{ $report->A31 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A31 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A31 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A31 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_A31 }}</td>
        </tr>
        <tr>
            <td>3.2. Doa setelah melakukan kegiatan</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A32 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A32 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A32 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A32 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_A32 }}</td>
        </tr>
        <!-- POIN A4 -->
        <tr>
            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>4</strong>
            </td>
            <td><strong>Mengenal berprilaku baik dan sopan</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>4.1. Berbicara/ berbahasa yang baik/sopan dengan sesama teman</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A41 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A41 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A41 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A41 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_A41 }}</td>
        </tr>
        <tr>
            <td>4.2. Bersikap ramah</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A42 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A42 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A42 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A42 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_A42 }}</td>
        </tr>
        <!-- POIN A5 -->
        <tr>
            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>5</strong>
            </td>
            <td><strong>Membiasakan diri berprilaku baik</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>5.1. Menggunakan barang orang lain dengan hati-hati</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A51 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A51 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A51 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A51 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_A52 }}</td>
        </tr>
        <tr>
            <td>5.2. Mau menghormati teman, guru,orang tua atau orang dewasa lainnya</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A52 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A52 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A52 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A52 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_A52 }}</td>
        </tr>
        <!-- POIN A6 -->
        <tr>
            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>6</strong>
            </td>
            <td><strong>Dapat mengenal sopan santun dan mulai berperilaku saling
                    menghormati</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>6.1. Membiasakan diri mengucapkan salam</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A61 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A61 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A61 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A61 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_A61 }}</td>
        </tr>
        <tr>
            <td>6.2. Membiasakan diri membalas salam</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A62 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A62 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A62 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->A62 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_A62 }}</td>
        </tr>
        <!--Iqro Section -->
        <tr>
            <td rowspan="2" style="vertical-align: top; text-align: center;"><strong>7</strong>
            </td>
            <td><strong>Perkembangan membaca Iqro'</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td aria-required="true">
                Jilid ...... {{ $report->A7JIL }} .......
                Halaman ...... {{ $report->A7HAL }} ......
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                {{ $report->ket_A7 }}
            </td>
        </tr>
        <!-- B. JATI DIRI -->
        <tr class="section-header">
            <td colspan="7">B.<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>JATI DIRI</td>
        </tr>
        <!-- Poin B1 -->
        <tr>
            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>1</strong>
            </td>
            <td><strong>Dapat berinteraksi dengan teman sebaya dan orang dewasa yang
                    dikenal</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>1.1. Senang bermain dengan teman</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B11 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B11 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B11 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B11 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_B11 }}</td>
        </tr>
        <tr>
            <td>1.2. Mampu bekerja sendiri</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B12 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B12 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B12 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B12 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_B12 }}</td>
        </tr>
        <!-- POIN B2 -->
        <tr>
            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>2</strong>
            </td>
            <td><strong>Mau berbagi, menolong dan membantu teman</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>2.1. Mau berbagi dengan teman</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B21 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B12 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B21 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B21 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_B21 }}</td>
        </tr>
        <tr>
            <td>2.2. Bersedia bermain dengan teman</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B22 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B22 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B22 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B22 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_B22 }}</td>
        </tr>
        <!-- POIN B3 -->
        <tr>
            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>3</strong>
            </td>
            <td><strong>Menunjukkan antusiasme dalam melakukan permainan kompetitif secara
                    positif</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>3.1. Mau mengikuti lomba dalam permainan</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B31 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B31 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B31 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B31 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_B31 }}</td>
        </tr>
        <tr>
            <td>3.2. Bersikap sportif dalam permainan</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B32 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B32 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B32 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->B32 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_B32 }}</td>
        </tr>
        <!-- C. DASAR DASAR LITERASI,MATEMATIK,SAINS,TEKNOLOGI DAN SENI-->
        <tr class="section-header">
            <td colspan="7">C.<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>DASAR DASAR
                LITERASI,MATEMATIK,SAINS,TEKNOLOGI DAN
                SENI</td>
        </tr>
        <!-- POIN C1 -->
        <tr>
            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>1</strong>
            </td>
            <td><strong>Bahasa</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>1.1. Mengikuti dua petunjuk atau lebih petunjuk/perintah</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C11 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C11 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C11 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C11 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_C11 }}</td>
        </tr>
        <tr>
            <td>1.2. Bertanya dan berkomentar tentang cerita yang di dengar</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C12 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C12 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C12 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C12 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_C12 }}</td>
        </tr>
        <!-- POIN C2 -->
        <tr>
            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>2</strong>
            </td>
            <td><strong>Keaksaraan</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>2.1. Meniru huruf</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C21 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C21 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C21 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C21 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_C21 }}</td>
        </tr>
        <tr>
            <td>2.2. Membuat huruf</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C22 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C22 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C22 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C22 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_C22 }}</td>
        </tr>
        <!-- POIN C3 -->
        <tr>
            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>3</strong>
            </td>
            <td><strong>Mulai menunjukkan dorongan untuk membaca</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>3.1. Tertarik pada buku cerita</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C31 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C31 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C31 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C31 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_C31 }}</td>
        </tr>
        <tr>
            <td>3.2. Meminta untuk dibacakan buku cerita</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C32 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C32 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C32 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->C32 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_C32 }}</td>
        </tr>
        <!-- D. MATEMATIKA/NALAR-->
        <tr class="section-header">
            <td colspan="7">D.<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>MATEMATIKA/NALAR</td>
        </tr>
        <!-- POIN D1 -->
        <tr>
            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>1</strong>
            </td>
            <td><strong>Dapat mengenal klasifikasi sederhana</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>1.1. Mengelompokkan benda berdasarkan ciri tertentu (menurut
                warna,ukuran,bentuk)</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D11 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D11 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D11 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D11 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_D11 }}</td>
        </tr>
        <tr>
            <td>1.2. Menunjukkan benda yang memiliki ciri tertentu ( misal: kasar, halus)</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D12 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D12 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D12 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D12 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_D12 }}</td>
        </tr>
        <!-- POIN D2 -->
        <tr>
            <td rowspan="2" style="vertical-align: top; text-align: center;"><strong>2</strong>
            </td>
            <td><strong>Mulai menunjukkan tentang konsep bilangan</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>2.1. Mengenal konsep bilangan 1-10</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D21 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D21 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D21 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D21 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_D21 }}</td>
        </tr>
        <tr>
            <td></td>
            <td>2.2. Mampu berhitung 1-10</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D22 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D22 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D22 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D22 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_D22 }}</td>
        </tr>
        <!-- POIN D3 -->
        <tr>
            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>3</strong>
            </td>
            <td><strong>Menunjukkan pemaaman tentan geometri</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>3.1. Menunjukkan bentuk geometri (lingkaran,segitiga,segi empat)</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D31 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D31 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D31 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D31 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_D31 }}</td>
        </tr>
        <tr>
            <td>3.2. Membedakan benda berdasarkan bentuk geometri</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D32 == 'BM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D32 == 'MM' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D32 == 'BSH' ? '✓' : '' }}</td>
            <td style="text-align: center;" class="ceklis">{{ $report->D32 == 'BSB' ? '✓' : '' }}</td>
            <td style="text-align: center;">{{ $report->ket_D32 }}</td>
        </tr>
        <tr style="border: none;">
            <td colspan="7" style="border: none; padding: 15px;"></td>
        </tr>
        <tr class="guru" style="border: none;">
            <td colspan="2" style="border: none;"></td>
            <td colspan="4" style="border: none; text-align: center;"><strong>Guru Kelas {{ $report->kelas }}</strong>
            </td>
            <td style="border: none;"></td>
        </tr>
        <tr style="border: none;">
            <td colspan="7" style="border: none; padding: 30px;"></td>
        </tr>
        <tr class="guru">
            <td colspan="2" style="border: none;"></td>
            <td colspan="4" style="border: none; text-align: center;">{{ $report->guru_kelas }}</td>
            <td style="border: none;"></td>
        </tr>
    </table>
</body>

</html>