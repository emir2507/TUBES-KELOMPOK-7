<x-layout>
    <div class="container">
        <h1>Data Pendaftaran</h1>

        @if ($pendaftarans->isEmpty())
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
                    @foreach ($pendaftarans as $index => $pendaftaran)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pendaftaran->nama }}</td>
                            <td>{{ $pendaftaran->nomor_telpon }}</td>
                            <td>{{ $pendaftaran->nomor_hp }}</td>
                            <td>{{ $pendaftaran->email }}</td>
                            <td>
                                <a href="{{ route('status-pendaftaran-show', $pendaftaran->id) }}"
                                    class="btn btn-sm btn-success">Detail</a>

                                <a href="{{ route('pendaftaran-edit', $pendaftaran->id) }}"
                                    class="btn btn-sm btn-primary">Edit</a>

                                <form action="{{ route('pendaftaran-delete', $pendaftaran->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    @include('sweetalert::alert')
</x-layout>
