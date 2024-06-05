<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script>
        function confirmDelete(articleId) {
            if (confirm('Are you sure you want to delete this article?')) {
                window.location.href = '/articles/delete/' + articleId;
            }
        }
    </script>
</head>

<body>
    <?php view("components/navbar") ?>

    <div class="container py-5">
        <div class="d-flex mb-4">
            <h2>Article List</h2>
            <a class="ms-auto my-auto btn btn-primary" href="/articles/create">Create Article</a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($articles as $article) : ?>
                                <tr>
                                    <td><?= $article['id']; ?></td>
                                    <td>
                                        <a target="_blank" href="/articles/show/<?= $article['id']; ?>"><?= $article['title']; ?></a>
                                    </td>
                                    <td><?= truncateString($article['content']); ?></td>
                                    <td>
                                        <a class="btn btn-outline-warning btn-sm" href="/articles/edit/<?= $article['id']; ?>">Edit</a>
                                        <button class="btn btn-outline-danger btn-sm" onclick="confirmDelete(<?= $article['id']; ?>);">Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td><?= $user['id']; ?></td>
                                    <td><?= $user['name']; ?></td>
                                    <td><?= $user['email']; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-warning" href="/users/edit/<?= $user['id']; ?>">Edit</a>
                                        <a class="btn btn-sm btn-outline-danger" href="/users/delete/<?= $user['id']; ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>