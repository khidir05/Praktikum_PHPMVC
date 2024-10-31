<!-- app/views/user/index.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Daftar Sponsor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container mt-4">
        <h2>Daftar Sponsor Event</h2>
        <a href="/sponsor/create" class="btn btn-primary mb-3">Tambah Sponsor</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Event</th>
                    <th>Nama Sponsor</th>
                    <th>Kontribusi</th>
                    <th>Jumlah Kontribusi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($sponsors)): ?>
                <tr>
                    <td colspan="6" class="text-center">Belum ada data sponsor</td>
                </tr>
                <?php else: ?>
                <?php foreach ($sponsors as $index => $sponsor): ?>
                <tr>
                    <td><?= $index + 1 . "." ?></td>
                    <td><?= htmlspecialchars($sponsor['nama_event']) ?></td>
                    <td><?= htmlspecialchars($sponsor['nama_sponsor']) ?></td>
                    <td><?= htmlspecialchars($sponsor['kontribusi_sponsor']) ?></td>
                    <td>Rp <?= number_format($sponsor['besaran_kontribusi'], 0, ',', '.') ?></td>
                    <td>
                        <a href="/sponsor/edit?id=<?php echo $sponsor['id_sponsor']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <button onclick="confirmDelete('/sponsor/hapus?id=<?php echo $sponsor['id_sponsor']; ?>')" class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script>
    function showAlert(type, message) {
        Swal.fire({
            icon: type,
            title: message,
            showConfirmButton: false,
            timer: 1500
        });
    }

    function confirmDelete(url) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

    <?php 
    if(isset($_SESSION['flash_message'])) {
        switch($_SESSION['flash_message']) {
            case 'success_add':
                echo "showAlert('success', 'Data berhasil ditambahkan!');";
                break;
            case 'success_update':
                echo "showAlert('success', 'Data berhasil diperbarui!');";
                break;
            case 'success_delete':
                echo "showAlert('success', 'Data berhasil dihapus!');";
                break;
            case 'error':
                echo "showAlert('error', 'Terjadi kesalahan!');";
                break;
        }
        unset($_SESSION['flash_message']);
    }
    ?>
</script>
</body>

</html>