<!DOCTYPE html>
<html>

<head>
    <title>Tambah Agenda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-size: 16px;
        }
        
        .container {
            max-width: 900px;
            padding: 2rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        label {
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #333;
        }
        
        .form-control {
            font-size: 1.1rem;
            padding: 0.8rem 1rem;
            height: auto;
            border-radius: 6px;
        }
        
        textarea.form-control {
            min-height: 120px;
        }
        
        .btn {
            font-size: 1.1rem;
            padding: 0.7rem 2rem;
            border-radius: 6px;
            font-weight: 500;
        }
        
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            margin-left: 1rem;
        }
        
        /* Membuat input number tidak memiliki arrow */
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0; 
        }
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>
    <div class="container">
        
        <form action="/agenda/store" method="POST">
            <div class="form-group">
                <label>Nama Agenda</label>
                <input type="text" name="nama_agenda" class="form-control" required placeholder="Masukkan nama agenda">
            </div>

            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="datetime-local" name="start_date" class="form-control" required placeholder="Masukkan Waktu Mulai">
            </div>

            <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="datetime-local" name="end_date" class="form-control" required placeholder="Masukkan Waktu Selesai">
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" name="description" class="form-control" required placeholder="Masukkan deskripsi">
            </div>

            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="location" class="form-control" required placeholder="Masukkan Lokasi">
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/agenda" class="btn btn-secondary">Kembali</a>
            </div>
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
                },
                width: '400px',
                padding: '2em'
            });
            
            this.submit();
        });
    </script>
</body>

</html>