<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Project PHP MVC - Add Data</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;900&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
            <div class="container px-5">
                <a class="navbar-brand" href="index.html"><span class="fw-bolder text-primary">Manajemen Event-Agenda TI 2A</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                        <li class="nav-item"><a class="nav-link" href="/agenda">Return to Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Page content -->
        <section class="py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="text-center my-5">
                        <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">Mistake in Schedule?</span></h2>
                        <p class="lead fw-light mb-4">Repair now, for a great future</p>
                    </div>
                </div>
                <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                    <div class="row gx-5 justify-content-center">
                        <?php if (isset($success)) : ?>
                            <div class="alert alert-success"><?= $success ?></div>
                        <?php endif ?>
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-danger"><?= $error ?></div>
                        <?php endif ?>
                        <div class="col-lg-8 col-xl-6">
                        <form method="POST" action="">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="nama" name="nama" type="text" required value="<?= htmlspecialchars($agenda['nama'] ?? '') ?>">
                                <label for="nama">Agenda Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="start" name="start_date" type="datetime-local" required value="<?= htmlspecialchars($agenda['start_date'] ?? '') ?>">
                                <label for="start">Start Time</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="end" name="end_date" type="datetime-local" required value="<?= htmlspecialchars($agenda['end_date'] ?? '') ?>">
                                <label for="end">End Time</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="desc" name="description" type="text" required value="<?= htmlspecialchars($agenda['description'] ?? '') ?>">
                                <label for="desc">Description</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="location" name="location" type="text" required value="<?= htmlspecialchars($agenda['location'] ?? '') ?>">
                                <label for="location">Location</label>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <!-- Footer -->
    <footer class="bg-white py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0">Copyright &copy; Your Website 2023</div>
                </div>
                <div class="col-auto">
                    <a class="small" href="#!">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="#!">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a class="small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
