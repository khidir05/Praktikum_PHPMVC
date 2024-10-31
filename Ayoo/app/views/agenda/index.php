
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Project PHP MVC</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Custom Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html"><span class="fw-bolder text-primary">Manajemen event-agenda TI 2A</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                            <li class="nav-item"><a class="nav-link" href="?action=create">Add Agenda</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- About Section-->
            <section class="bg-light py-5">
                <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                            <div class="text-center my-5">
                                <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">What's going on?</span></h2>
                                <p class="lead fw-light mb-4">What should I do the next</p>
                                <p class="text-muted">Lets manage your idea and schedule to make your day pretty</p>
                            </div>
                    </div>
                </div>
            </section>
              <section class="intro">
                  <div class="d-flex align-items-center">
                    <div class="container">
                      <div class="row justify-content-center">
                        <div class="col-12">
                          <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                  <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Agenda</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Deskripsi</th>
                                        <th>Lokasi</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php if(empty($agendas)): ?>
                                      <tr><td colspan="6" class="text-center">Belum ada data sponsor</td></tr>
                                    <?php else: ?>
                                    <?php foreach ($agendas as $agenda): ?>
                                        <tr>
                                            <td><?php echo $agenda["id_agenda"]; ?></td>
                                            <td><?php echo $agenda['nama']; ?></td>
                                            <td><?php echo date('d F Y H:i:s', strtotime($agenda['start_date'])); ?></td>
                                            <td><?php echo date('d F Y H:i:s', strtotime($agenda['end_date'])); ?></td>
                                            <td><?php echo $agenda['description']; ?></td>
                                            <td><?php echo $agenda['location']; ?></td>
                                            <td><a href="?action=edit&id=<?php echo $agenda['id_agenda']; ?>" class="btn btn-primary btn-sm">Edit</a></td>
                                            <td><a href="?action=delete&id=<?php echo $agenda['id_agenda']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                  <?php endif; ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah data</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </section>
        </main>
        <!-- Footer-->
        <footer class="bg-white py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0">Copyright &copy; Your Website 2023</div></div>
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
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <div class="row gx-3 justify-content-center">
                <div class="text-center my-5">
                  <h2 class="display-8 fw-bolder"><span class="text-gradient d-inline">Make your days pretty</span></h2>
                      <p class="lead fw-light mb-7">By Managing your time today!</p>
                   </div>
                  </div>
                  <form action="/agenda/store" method="POST">
                      <div class="form-floating mb-3">
                          <input class="form-control" id="nama_agenda" name="nama_agenda" type="text" required />
                          <label for="nama_agenda">Agenda's name</label>
                      </div>
                      <div class="form-floating mb-3">
                          <input class="form-control" id="start_date" name="start_date" type="datetime-local" required />
                          <label for="start_date">Start time</label>
                      </div>
                      <div class="form-floating mb-3">
                          <input class="form-control" id="end_date" name="end_date" type="datetime-local" required />
                          <label for="end_date">End time</label>
                      </div>
                      <div class="form-floating mb-3">
                          <input class="form-control" id="description" name="description" type="text" />
                          <label for="description">Description</label>
                      </div>
                      <div class="form-floating mb-3">
                          <input class="form-control" id="location" name="location" type="text" required />
                          <label for="location">Location</label>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                  </form>
              </div>
            </div>
          </div>
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
        <!-- Bootstrap core JS-->
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
