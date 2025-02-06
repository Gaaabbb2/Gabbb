<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 40px;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-sm {
            padding: 5px 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card p-4">
        <?php
        include 'db.php';

        // Display success message if passed in URL
        if (isset($_GET['message'])) {
            echo "<div class='alert alert-success' role='alert'>{$_GET['message']}</div>";
        }

        // Fetch loan records
        $sql = "SELECT * FROM loans";
        $result = $conn->query($sql);

        if (!$result) {
            die("<div class='alert alert-danger'>Query failed: " . $conn->error . "</div>");
        }
        ?>

        <h2 class="text-center mb-4">Loan Records</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Borrower</th>
                        <th>Amount</th>
                        <th>Interest Rate</th>
                        <th>Term</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['borrower_name']}</td>
                                <td>\${$row['amount']}</td>
                                <td>{$row['interest_rate']}%</td>
                                <td>{$row['term']} months</td>
                                <td><span class='badge bg-" . ($row['status'] === 'Approved' ? "success" : "warning") . "'>{$row['status']}</span></td>
                                <td>
                                    <a href='edit_loan.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='delete_loan.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center text-muted'>No loans found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-3">
            <a href="index.php" class="btn btn-primary">Go Back to Add Loan</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
