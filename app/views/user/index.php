
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../public/css/styles.css" rel="stylesheet" />
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
                            <li class="nav-item"><a class="nav-link" href="/user/create">Add Agenda</a></li>
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
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?php echo $user["id_agenda"]; ?></td>
                                            <td><?php echo $user['nama']; ?></td>
                                            <td><?php echo $user['start_date']; ?></td>
                                            <td><?php echo $user['end_date']; ?></td>
                                            <td><?php echo $user['description']; ?></td>
                                            <td><?php echo $user['location']; ?></td>
                                            <td><a href="/user/edit?id=<?php echo $user['id_agenda']; ?>" class="btn btn-primary btn-sm">Edit</a></td>
                                            <td><a href="/user/delete?id=<?php echo $user['id_agenda']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a></td>
                                        </tr>
                                    <?php endforeach; ?>
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
                  <form action="/user/store" method="POST">
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
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../../public/js/scripts.js"></script>
    </body>
</html>
