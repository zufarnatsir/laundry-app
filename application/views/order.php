<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order - SmartWash</title>
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
                            <a class="nav-link" href="<?php echo site_url('OrderMenu'); ?>">Add/Modify/Delete Order Menu</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <h2>Place Order</h2>
        <?php if (isset($success)) { ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php } ?>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <?php echo form_open('order/place_order'); ?>
            <div class="mb-3">
                <label for="customer_name" class="form-label">Customer Name:</label>
                <input type="text" id="customer_name" name="customer_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="customer_phone" class="form-label">Customer Phone:</label>
                <input type="text" id="customer_phone" name="customer_phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="service_id" class="form-label">Service Type:</label>
                <select id="service_id" name="service_id" class="form-select" required>
                    <?php foreach ($services as $service): ?>
                        <option value="<?php echo $service['id']; ?>"><?php echo $service['name']; ?> - Rp <?php echo $service['price_per_kg']; ?> per kg</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Weight (kg):</label>
                <input type="number" id="weight" name="weight" class="form-control" min="0" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-custom">Place Order</button>
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