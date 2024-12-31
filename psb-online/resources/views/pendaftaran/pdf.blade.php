<!DOCTYPE html>
<html>

<head>
    <title>Detail Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Detail Pendaftaran</h1>
    <table>
        <tr>
            <th>Nama</th>
            <td>{{ $pendaftaran->nama }}</td>
        </tr>
        <tr>
            <th>Alamat KTP</th>
            <td>{{ $pendaftaran->Alamat_KTP }}</td>
        </tr>
        <tr>
            <th>Alamat Lengkap</th>
            <td>{{ $pendaftaran->Alamat_lengkap }}</td>
        </tr>
        <tr>
            <th>Kecamatan</th>
            <td>{{ $pendaftaran->kecamatan }}</td>
        </tr>
        <tr>
            <th>Kabupaten</th>
            <td>{{ $pendaftaran->kabupaten->name ?? '-' }}</td>
        </tr>
        <tr>
            <th>Provinsi</th>
            <td>{{ $pendaftaran->provinsi->name ?? '-' }}</td>
        </tr>
        <tr>
            <th>No. Telepon</th>
            <td>{{ $pendaftaran->nomor_telpon }}</td>
        </tr>
        <tr>
            <th>No. HP</th>
            <td>{{ $pendaftaran->nomor_hp }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $pendaftaran->email }}</td>
        </tr>
        <tr>
            <th>Kewarganegaraan</th>
            <td>{{ $pendaftaran->kewarganegaraan }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $pendaftaran->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>{{ $pendaftaran->tempat_lahir }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $pendaftaran->jenis_kelamin }}</td>
        </tr>
        <tr>
            <th>Status Menikah</th>
            <td>{{ $pendaftaran->status_menikah }}</td>
        </tr>
        <tr>
            <th>Agama</th>
            <td>{{ $pendaftaran->agama->name ?? '-' }}</td>
        </tr>
    </table>
</body>

</html>
