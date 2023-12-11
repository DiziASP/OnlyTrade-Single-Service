<!-- File: app/Views/auth/login.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #dc3545; /* Red background color */
        }
        .navbar-brand {
            color: #fff; /* White text color */
        }
        .container {
            max-width: 400px;
            margin-top: 100px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Increased thickness of box shadow */
            padding: 20px;
            border-radius: 8px;
        }
        .btn-red {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Only Trade</a>
        </div>
    </nav>
    <div class="container">
        <h2 class="mb-4 text-center">Login</h2>

        <!-- Menampilkan pesan kesalahan -->
      <?php if (session()->getFlashdata('error')) : ?>
           <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error') ?>
            </div>
      <?php endif; ?>

        <form action="/login_action" method="post">

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-red">Login</button>
            </div>
        </form>

        <p class="mt-3 text-center">Don't have an account? <a href="<?= base_url('register') ?>">Register here</a></p>

    </div>
</body>
</html>
