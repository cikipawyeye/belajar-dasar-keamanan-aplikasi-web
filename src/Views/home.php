<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php view("components/navbar") ?>

    <div class="container py-5">
        <h2 class="text-center mb-5">Articles</h2>
        <div class="row">
            <?php foreach ($articles as $article) : ?>
                <div class="col-6 col-md-4 d-flex py-3">
                    <div class="card w-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= $article['title'] ?></h5>
                            <span>By <?= $article['author'] ?></span>
                            <span><?= $article['created_at'] ?></span>
                            <p><?= truncateString($article['content']) ?></p>
                            <a href="/articles/show/<?= $article['id'] ?>" class="mt-auto me-auto btn btn-primary">
                                Read
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>