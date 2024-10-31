<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid p-5">
        <div class="card shadow w-100">
            <div class="card-body">
                <h1 class="text-center">Event</h1>
                <div class="d-flex my-3">
                    <a href="?action=add" class="btn btn-primary ms-auto">Add Event</a>
                </div>
                <?php if (isset($success)) : ?>
                    <div class="alert alert-success">
                        <?= $success ?>
                    </div>
                <?php endif ?>
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger">
                        <?= $error ?>
                    </div>
                <?php endif ?>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Title</th>
                            <th style="width: 25%;">Description</th>
                            <th>Time Start</th>
                            <th>Time End</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($events as $event): ?>
                            <tr>
                                <td><?= $event['id'] ?></td>
                                <td><img src="public/uploads/<?= htmlspecialchars($event['photo']) ?>" alt="Event Photo" width="150px"></td>
                                <td><?= $event['title'] ?></td>
                                <td><?= $event['description'] ?></td>
                                <td><?= date('d F Y H:i:s', strtotime($event['time_start'])) ?></td>
                                <td><?= date('d F Y H:i:s', strtotime($event['time_end'])) ?></td>
                                <td><?= $event['location'] ?></td>
                                <td>
                                    <a href="?action=edit&id=<?= $event['id'] ?>" class="btn btn-warning mb-2">
                                        Edit
                                    </a>
                                    <a href="?action=delete&id=<?= $event['id'] ?>" class="btn btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>