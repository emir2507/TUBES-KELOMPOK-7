<x-layout>
    <div class="container">
        <h2 class="mb-4">Formulir Pendaftaran</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pendaftaran-store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="Alamat_KTP" class="form-label">Alamat KTP</label>
                <input type="text" class="form-control" id="Alamat_KTP" name="Alamat_KTP"
                    value="{{ old('Alamat_KTP') }}" required>
            </div>

            <div class="mb-3">
                <label for="Alamat_lengkap" class="form-label">Alamat Lengkap</label>
                <input type="text" class="form-control" id="Alamat_lengkap" name="Alamat_lengkap"
                    value="{{ old('Alamat_lengkap') }}" required>
            </div>

            <div class="mb-3">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                    value="{{ old('kecamatan') }}" required>
            </div>

            <div class="mb-3">
                <label for="kabupaten_id" class="form-label">Kabupaten</label>
                <select class="form-select" id="kabupaten_id" name="kabupaten_id" required>
                    <option value="">Pilih Kabupaten</option>
                    @foreach ($kabupatens as $kabupaten)
                        <option value="{{ $kabupaten->id }}"
                            {{ old('kabupaten_id') == $kabupaten->id ? 'selected' : '' }}>{{ $kabupaten->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="provinsi_id" class="form-label">Provinsi</label>
                <select class="form-select" id="provinsi_id" name="provinsi_id" required>
                    <option value="">Pilih Provinsi</option>
                    @foreach ($provinsis as $provinsi)
                        <option value="{{ $provinsi->id }}"
                            {{ old('provinsi_id') == $provinsi->id ? 'selected' : '' }}>{{ $provinsi->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="nomor_telpon" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="nomor_telpon" name="nomor_telpon"
                    value="{{ old('nomor_telpon') }}" required>
            </div>

            <div class="mb-3">
                <label for="nomor_hp" class="form-label">Nomor HP</label>
                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan"
                    value="{{ old('kewarganegaraan') }}" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                    value="{{ old('tanggal_lahir') }}" required>
            </div>

            <div class="mb-3">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                    value="{{ old('tempat_lahir') }}" required>
            </div>

            <div class="mb-3">
                <label for="optional_tempat" class="form-label">Optional Tempat</label>
                <input type="text" class="form-control" id="optional_tempat" name="optional_tempat"
                    value="{{ old('optional_tempat') }}">
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Pria" {{ old('jenis_kelamin') == 'Pria' ? 'selected' : '' }}>Pria</option>
                    <option value="Wanita" {{ old('jenis_kelamin') == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="status_menikah" class="form-label">Status Menikah</label>
                <select class="form-select" id="status_menikah" name="status_menikah" required>
                    <option value="">Pilih Status</option>
                    <option value="Belum menikah" {{ old('status_menikah') == 'Belum menikah' ? 'selected' : '' }}>
                        Belum menikah</option>
                    <option value="Menikah" {{ old('status_menikah') == 'Menikah' ? 'selected' : '' }}>Menikah
                    </option>
                    <option value="Lain-lain(janda/duda)"
                        {{ old('status_menikah') == 'Lain-lain(janda/duda)' ? 'selected' : '' }}>Lain-lain(janda/duda)
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label for="agama_id" class="form-label">Agama</label>
                <select class="form-select" id="agama_id" name="agama_id" required>
                    <option value="">Pilih Agama</option>
                    @foreach ($agamas as $agama)
                        <option value="{{ $agama->id }}" {{ old('agama_id') == $agama->id ? 'selected' : '' }}>
                            {{ $agama->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>
    @include('sweetalert::alert')
</x-layout>
