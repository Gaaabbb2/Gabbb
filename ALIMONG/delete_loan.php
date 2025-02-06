<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Loan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 100px;
            max-width: 500px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card text-center">
        <?php
        include 'db.php';

        $id = intval($_GET['id']); // Prevents SQL injection
        $sql = "DELETE FROM loans WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Loan deleted successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
        }

        $conn->close();
        ?>

        <div class="mt-3">
            <a href="index.php" class="btn btn-primary">Return to Loan List</a>
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        window.location.href = "index.php"; // Auto-redirect after 3 seconds
    }, 3000);
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
