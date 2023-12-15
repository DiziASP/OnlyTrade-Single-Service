<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #dc3545;
            /* Red background color */
        }

        .navbar-brand {
            color: #fff;
            /* White text color */
        }

        .container {
            max-width: 400px;
            margin-top: 100px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            /* Increased thickness of box shadow */
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
        <h2 class="mb-4 text-center">Register</h2>
        <form action="/api/auth/register" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Create your password" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Create your password" required>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-red">Register</button>
            </div>
        </form>
        <p class="mt-3 text-center">Already have an account? <a href="<?= base_url('login') ?>">Login here</a></p>

    </div>
    </div>
</body>

</html>