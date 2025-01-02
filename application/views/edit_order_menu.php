<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order Menu - SmartWash</title>
    <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">SmartWash</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('Register'); ?>">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('Login'); ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('Order'); ?>">Place Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('Orders'); ?>">View Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo site_url('OrderMenu'); ?>">Add/Modify/Delete Order Menu</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <h2>Edit Order Menu</h2>
        <?php echo form_open('OrderMenu/edit/' . $service['id']); ?>
            <div class="mb-3">
                <label for="name" class="form-label">Service Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($service['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="price_per_kg" class="form-label">Price per kg (Rp):</label>
                <input type="number" id="price_per_kg" name="price_per_kg" class="form-control" value="<?php echo htmlspecialchars($service['price_per_kg']); ?>" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Service</button>
        <?php echo form_close(); ?>
    </div>

    <footer>
        <p>© 2024 SmartWash, Inc.</p>
    </footer>

    <script src="<?php echo base_url('js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/scripts.js'); ?>"></script>
</body>
</html>
