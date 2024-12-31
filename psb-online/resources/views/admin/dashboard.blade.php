<x-layout-admin>
    <div class="container">
        <h1>Data Pendaftaran</h1>

        @if ($pendaftaran->isEmpty())
            <p>Belum ada data pendaftaran.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No. Telepon</th>
                        <th>No. HP</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftaran as $index => $pendaftaran)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pendaftaran->nama }}</td>
                            <td>{{ $pendaftaran->nomor_telpon }}</td>
                            <td>{{ $pendaftaran->nomor_hp }}</td>
                            <td>{{ $pendaftaran->email }}</td>
                            <td>
                                <a href="{{ route('show-admin', $pendaftaran->id) }}">Lihat Detail</a>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-layout-admin>
