<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php view("components/navbar") ?>

    <div class="container py-5">
        <div class="d-flex mb-4">
            <h2>Create Article</h2>
        </div>

        <form method="POST" action="">
            <div class="mb-3 row">
                <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" placeholder="input title..." id="inputTitle">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputContent" class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                    <textarea rows="5" name="content" class="form-control" id="inputContent"></textarea>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-10 ms-auto">
                    <button type="submit" name="Create" class="btn btn-primary">Publish</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>