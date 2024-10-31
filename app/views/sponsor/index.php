<!DOCTYPE html>
<html>

<head>
    <title>Daftar Sponsor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-size: 15px;
        }
        
        .container {
            max-width: 1500px;
            padding: 1.5rem;
        }
        
        .page-title {
            font-size: 1.5rem;
            margin-bottom: 1.25rem;
        }
        
        .table {
            font-size: 1.1rem;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .table th {
            font-size: 1.15rem;
            padding: 1rem 0.8rem;
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            vertical-align: middle;
        }
        
        .table td {
            padding: 0.8rem;
            vertical-align: middle;
        }
        
        .btn {
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }
        
        .btn-primary {
            padding: 0.6rem 1.5rem;
            font-weight: 500;
        }
        
        .btn-warning, .btn-danger {
            padding: 0.4rem 1.2rem;
            margin: 0 0.2rem;
        }
        
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #000;
        }
        
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
        }
        
        .table td:first-child {
            width: 5%;
            text-align: center;
        }
        
        .table td:last-child {
            width: 15%;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="/sponsor/create" class="btn btn-primary mb-4">Tambah Sponsor</a>

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
                    <td colspan="6" class="text-center py-4">Belum ada data sponsor</td>
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
                        <a href="/sponsor/edit?id=<?php echo $sponsor['id_sponsor']; ?>" class="btn btn-warning">Edit</a>
                        <button onclick="confirmDelete('/sponsor/hapus?id=<?php echo $sponsor['id_sponsor']; ?>')" class="btn btn-danger">Hapus</button>
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
            timer: 1500,
            width: '400px',
            heightAuto: true,
            padding: '2em',
            fontSize: '1.1rem'
        });
    }

    function confirmDelete(url) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            width: '400px',
            padding: '2em',
            fontSize: '1.1rem'
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