<x-layout>

    <table>
        <tr>
            <td>Nama</td>
            <td>{{ $pendaftaran->nama }}</td>
        </tr>
        <tr>
            <td>Alamat KTP</td>
            <td>{{ $pendaftaran->Alamat_KTP }}</td>
        </tr>
        <tr>
            <td>Alamat Lengkap</td>
            <td>{{ $pendaftaran->Alamat_lengkap }}</td>
        </tr>
        <tr>
            <td>Kecamatan</td>
            <td>{{ $pendaftaran->kecamatan }}</td>
        </tr>
        <tr>
            <td>Kabupaten</td>
            <td>{{ $pendaftaran->kabupaten->name ?? '-' }}</td>
        </tr>
        <tr>
            <td>Provinsi</td>
            <td>{{ $pendaftaran->provinsi->name ?? '-' }}</td>
        </tr>
        <tr>
            <td>Nomor Telepon</td>
            <td>{{ $pendaftaran->nomor_telpon }}</td>
        </tr>
        <tr>
            <td>Nomor HP</td>
            <td>{{ $pendaftaran->nomor_hp }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $pendaftaran->email }}</td>
        </tr>
        <tr>
            <td>Kewarganegaraan</td>
            <td>{{ $pendaftaran->kewarganegaraan }}</td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>{{ $pendaftaran->tanggal_lahir }}</td>
        </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td>{{ $pendaftaran->tempat_lahir }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>{{ $pendaftaran->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td>Status Menikah</td>
            <td>{{ $pendaftaran->status_menikah }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>{{ $pendaftaran->agama->name ?? '-' }}</td>
        </tr>
    </table>
    <a href="{{ route('dashboard-admin') }}" class="btn btn-secondary">Kembali</a>
</x-layout>
