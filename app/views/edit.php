<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex justify-content-center p-5">
        <div class="card shadow w-75">
            <div class="card-body">
                <h1 class="text-center">Edit Event</h1>
                <div class="d-flex justify-content-end my-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/event">Event</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
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
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <p class="text-danger m-0">*Isi jika ingin mengubah foto</p>
                        <label for="photo" class="form-label">Photo</label>
                        <input class="form-control" type="file" id="photo" name="photo" accept="image/*" >
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required value="<?=$event['title']?>">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"
                            required><?=$event['description']?></textarea>
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="timeStart" class="form-label">Time Start</label>
                            <input type="datetime-local" class="form-control" id="timeStart" name="timeStart" required  value="<?=$event['time_start']?>">
                        </div>
                        <div class="col">
                            <label for="timeEnd" class="form-label">Time End</label>
                            <input type="datetime-local" class="form-control" id="timeEnd" name="timeEnd" required  value="<?=$event['time_end']?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <textarea class="form-control" id="location" name="location" rows="3"
                            required><?=$event['location']?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>