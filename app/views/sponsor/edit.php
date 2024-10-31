<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sponsor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Sponsor</h3>
                    </div>
                    <div class="card-body">
                        <form action="/sponsor/update" method="POST">
                            <input type="hidden" name="id_sponsor" value="<?php echo $sponsor['id_sponsor']; ?>">
                            
                            <div class="mb-3">
                                <label for="nama_event" class="form-label">Nama Event</label>
                                <input type="text" class="form-control" id="nama_event" name="nama_event" 
                                       value="<?php echo $sponsor['nama_event']; ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="nama_sponsor" class="form-label">Nama Sponsor</label>
                                <input type="text" class="form-control" id="nama_sponsor" name="nama_sponsor" 
                                       value="<?php echo $sponsor['nama_sponsor']; ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="kontribusi_sponsor" class="form-label">Kontribusi Sponsor</label>
                                <input type="text" class="form-control" id="kontribusi_sponsor" name="kontribusi_sponsor" 
                                       value="<?php echo $sponsor['kontribusi_sponsor']; ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="besaran_kontribusi" class="form-label">Besaran Kontribusi</label>
                                <input type="number" class="form-control" id="besaran_kontribusi" name="besaran_kontribusi" 
                                       value="<?php echo $sponsor['besaran_kontribusi']; ?>" required>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <a href="/sponsor" class="btn btn-secondary">Kembali</a>
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