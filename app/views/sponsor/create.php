<!DOCTYPE html>
<html>

<head>
    <title>Tambah Sponsor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container mt-4">
        <h2>Tambah Sponsor Baru</h2>
        <form action="/sponsor/store" method="POST">
            <div class="form-group">
                <label>Event</label>
                <input type="text" name="event_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Nama Sponsor</label>
                <input type="text" name="sponsor_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Kontribusi</label>
                <textarea name="contribution" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label>Jumlah Kontribusi</label>
                <input type="number" name="contribution_amount" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/sponsor" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Memproses...',
                html: 'Mohon tunggu sebentar',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            this.submit();
        });
    </script>
</body>

</html>