<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Agenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Agenda</h3>
                    </div>
                    <div class="card-body">
                        <form action="/agenda/update" method="POST">
                            <input type="hidden" name="id_agenda" value="<?php echo $agenda['id_agenda']; ?>">
                            
                            <div class="mb-3">
                                <label for="nama_agenda" class="form-label">Nama Agenda</label>
                                <input type="text" class="form-control" id="nama_agenda" name="nama_agenda" 
                                       value="<?php echo $agenda['nama_agenda']; ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Waktu Mulai</label>
                                <input type="datetime-local" class="form-control" id="start_date" name="start_date" 
                                       value="<?php echo $agenda['start_date']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="end_date" class="form-label">Waktu Selesai</label>
                                <input type="datetime-local" class="form-control" id="end_date" name="end_date" 
                                       value="<?php echo $agenda['end_date']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" id="description" name="description" 
                                       value="<?php echo $agenda['description']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="location" class="form-label">Lokasi</label>
                                <input type="text" class="form-control" id="location" name="location" 
                                       value="<?php echo $agenda['location']; ?>" required>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <a href="/agenda" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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