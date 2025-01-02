<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SmartWash</title>
    <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="<?php echo base_url('assets/logo.jpg'); ?>" alt="Logo" style="height: 60px; margin-right: 10px;">
                    SmartWash
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('register'); ?>">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('login'); ?>">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <h2>Login</h2>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <?php echo form_open('login/submit'); ?>
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-custom">Login</button>
        <?php echo form_close(); ?>
    </div>

    <footer>
        <br>
        <p>© 2024 SmartWash, Inc.</p>
    </footer>

    <script src="<?php echo base_url('js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/scripts.js'); ?>"></script>
</body>
</html>