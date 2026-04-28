<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran HMI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .header-section { background: linear-gradient(135deg, #0d6efd 0%, #003d99 100%); color: white; padding: 40px 0; border-radius: 0 0 20px 20px; margin-bottom: 30px; }
    </style>
</head>
<body>

<div class="header-section text-center">
    <h2 class="fw-bold">Himpunan Mahasiswa Informatika</h2>
    <p>Formulir Pendaftaran Anggota Baru</p>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card p-4">
                <h4 class="mb-4 text-primary">Form Pendaftaran</h4>
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="/anggota/store" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Contoh: Budi Santoso" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">NIM</label>
                        <input type="text" name="nim" class="form-control" placeholder="2024xxx" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Program Studi</label>
                        <input type="text" name="prodi" class="form-control" placeholder="Teknik Informatika" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="2" placeholder="Alamat lengkap..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">No HP</label>
                        <input type="text" name="no_hp" class="form-control" placeholder="0812xxxx" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Daftar Sekarang</button>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card p-4">
                <h4 class="mb-4 text-primary">Data Pendaftar Terkini</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Email</th>
                                <th>Prodi</th>
                                <th>No HP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $d)
                            <tr>
                                <td class="fw-bold">{{ $d['nama'] }}</td>
                                <td><span class="badge bg-secondary">{{ $d['nim'] }}</span></td>
                                <td>{{ $d['email'] }}</td>
                                <td>{{ $d['prodi'] }}</td>
                                <td>{{ $d['no_hp'] }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted italic">Belum ada pendaftar hari ini.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>