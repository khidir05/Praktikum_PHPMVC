<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
    .sidebar {
        min-height: 100vh;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .nav-link {
        color: #333;
        padding: 0.8rem 1rem;
    }

    .nav-link:hover {
        background-color: #f8f9fa;
    }

    .nav-link.active {
        background-color: #e9ecef;
        color: #0d6efd;
        border-right: 4px solid #0d6efd;
    }

    .content-wrapper {
        min-height: 100vh;
        background-color: #f8f9fa;
    }

    .card-stats {
        transition: transform 0.2s;
    }

    .card-stats:hover {
        transform: translateY(-5px);
    }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0 bg-white sidebar">
                <div class="p-3 border-bottom">
                    <h4 class="text-primary">Admin Panel</h4>
                </div>
                <div class="nav flex-column">
                    <a href="/sponsor" class="nav-link active">
                        <i class="fas fa-handshake me-2"></i> Sponsors
                    </a>
                    <a href="/agenda" class="nav-link">
                        <i class="fas fa-calendar-alt me-2"></i> Agenda
                    </a>
                    <a href="/events" class="nav-link">
                        <i class="fas fa-calendar-check me-2"></i> Events
                    </a>
                    <a href="/peserta" class="nav-link">
                        <i class="fas fa-users me-2"></i> Peserta
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 content-wrapper">
                <!-- Top Header -->
                <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
                    <div class="container-fluid">
                        <h5 class="mb-0"><?php 
                        switch($_SERVER['REQUEST_URI']) {
                            case '/' :
                                echo 'Daftar Sponsor Event';
                                break;
                            case '/sponsor' :
                                echo 'Daftar Sponsor Event';
                                break;
                            case '/sponsor/create' :
                                echo  'Tambah Sponsor Baru';
                                break;    
                        }
                    ?></h5>
                        <button class="btn btn-link">
                            <i class="fas fa-cog"></i>
                        </button>
                    </div>
                </nav>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js">
                </script>
</body>

</html>