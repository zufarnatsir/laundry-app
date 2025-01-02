<!-- application/views/view_orders.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders - SmartWash</title>
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
                            <a class="nav-link active" aria-current="page" href="<?php echo site_url('Orders'); ?>">View Orders</a>
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
        <h2>View Orders</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Service Type</th>
                    <th>Weight (kg)</th>
                    <th>Total Price (Rp)</th>
                    <th>Status</th>
                    <th>Customer Name</th>
                    <th>Customer Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['service_name']); ?></td>
                        <td><?php echo htmlspecialchars($order['weight']); ?></td>
                        <td><?php echo htmlspecialchars($order['total_price']); ?></td>
                        <td>
                            <?php if ($order['status'] === 'Pending'): ?>
                                <?php echo form_open('orders/update_status', ['class' => 'd-inline']); ?>
                                    <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                    <button type="submit" name="update_status" class="btn btn-warning">Pending</button>
                                <?php echo form_close(); ?>
                            <?php else: ?>
                                <?php echo htmlspecialchars($order['status']); ?>
                            <?php endif; ?>
                        </td>
                        <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                        <td><?php echo htmlspecialchars($order['customer_phone']); ?></td>
                        <td>
                            <?php echo form_open('orders/delete', ['class' => 'd-inline']); ?>
                                <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                            <?php echo form_close(); ?>
                            <?php echo form_open('orders/generate_invoice', ['class' => 'd-inline']); ?>
                                <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                <button type="submit" name="generate_invoice" class="btn btn-info">Create PDF</button>
                            <?php echo form_close(); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <footer>
        <br>
        <p>© 2024 SmartWash, Inc.</p>
    </footer>

    <script src="<?php echo base_url('js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/scripts.js'); ?>"></script>
</body>
</html>
