<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php view("components/navbar") ?>

    <div class="container py-5">
        <div class="d-flex mb-4">
            <h2>My Profile</h2>
        </div>

        <form method="POST" action="">
            <div class="mb-3 row">
                <label for="staticId" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticId" value="<?= $user['id'] ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" placeholder="input name..." id="inputName" value="<?= $user['name'] ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" placeholder="input email..." id="inputEmail" value="<?= $user['email'] ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">New password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" placeholder="input new password..." id="inputPassword">
                    <div id="passwordHelp" class="form-text">leave blank if you don't want to change the password.</div>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-10 ms-auto">
                    <button type="submit" name="Update" class="btn btn-primary">Update Profile</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>