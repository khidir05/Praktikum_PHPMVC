<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Daftar Peserta</h1>
        
        <a href="/peserta/create" class="btn btn-primary mb-3">Tambah Peserta</a>

        <div class="card">
            <div class="card-header">Daftar Peserta</div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Kontak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($peserta as $p): ?>
                        <tr>
                            <td><?php echo $p['nama']; ?></td>
                            <td><?php echo $p['kontak']; ?></td>
                            <td>
                                <a href="/peserta/edit?id=<?php echo $p['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/peserta/delete?id=<?php echo $p['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus peserta ini?');">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
