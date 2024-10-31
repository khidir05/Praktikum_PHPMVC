<!DOCTYPE html>
<html>

<head>
    <title>Tambah Sponsor</title>
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
        
        <form action="/sponsor/store" method="POST">
            <div class="form-group">
                <label>Event</label>
                <input type="text" name="event_name" class="form-control" required placeholder="Masukkan nama event">
            </div>

            <div class="form-group">
                <label>Nama Sponsor</label>
                <input type="text" name="sponsor_name" class="form-control" required placeholder="Masukkan nama sponsor">
            </div>

            <div class="form-group">
                <label>Kontribusi</label>
                <textarea name="contribution" class="form-control" required placeholder="Masukkan detail kontribusi"></textarea>
            </div>

            <div class="form-group">
                <label>Jumlah Kontribusi</label>
                <input type="number" name="contribution_amount" class="form-control" required placeholder="Masukkan jumlah kontribusi">
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/sponsor" class="btn btn-secondary">Kembali</a>
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