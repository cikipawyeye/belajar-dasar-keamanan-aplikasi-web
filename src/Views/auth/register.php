<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container py-5 d-flex">
        <div class="card mx-auto w-100 shadow border-0" style="max-width: 500px;">
            <div class="card-body">
                <h3 class="card-title mb-5">Register</h3>

                <?php if (isset($error)) : ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Name</label>
                        <input required name="name" type="text" class="form-control" id="inputName">
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email address</label>
                        <input required name="email" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input required name="password" type="password" class="form-control" id="inputPassword">
                    </div>

                    <button type="submit" name="Register" class="btn btn-primary w-100 mt-2">Register</button>
                </form>

                <p class="mt-5 text-center">Already have an account? <a href="/login">Login</a></p>
                <p class="mt-2 text-center">or <a href="/">Back to home page</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>