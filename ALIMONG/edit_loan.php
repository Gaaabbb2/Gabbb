<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Loan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 40px;
            max-width: 600px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card p-4">
        <h2 class="text-center mb-4">Edit Loan</h2>

        <?php
        include 'db.php';

        $id = $_GET['id'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['borrower_name'];
            $amount = $_POST['amount'];
            $rate = $_POST['interest_rate'];
            $term = $_POST['term'];
            $status = $_POST['status'];

            $sql = "UPDATE loans SET borrower_name='$name', amount='$amount', interest_rate='$rate', term='$term', status='$status' WHERE id=$id";
            
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'>Loan updated successfully!</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
            }
        }

        $result = $conn->query("SELECT * FROM loans WHERE id=$id");
        $row = $result->fetch_assoc();
        ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Borrower Name</label>
                <input type="text" class="form-control" name="borrower_name" value="<?= $row['borrower_name'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" class="form-control" name="amount" value="<?= $row['amount'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Interest Rate (%)</label>
                <input type="number" class="form-control" name="interest_rate" value="<?= $row['interest_rate'] ?>" step="0.01" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Term (months)</label>
                <input type="number" class="form-control" name="term" value="<?= $row['term'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-select" name="status">
                    <option value="Pending" <?= ($row['status'] == 'Pending') ? 'selected' : '' ?>>Pending</option>
                    <option value="Approved" <?= ($row['status'] == 'Approved') ? 'selected' : '' ?>>Approved</option>
                    <option value="Rejected" <?= ($row['status'] == 'Rejected') ? 'selected' : '' ?>>Rejected</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Update Loan</button>
                <a href="index.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>
