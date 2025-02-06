<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loan Management System</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow p-4">
            <h1 class="text-center text-primary">Loan Management System</h1>
            
            <!-- View Loans Button -->
            <div class="text-center my-3">
                <a href="view_loans.php" class="btn btn-success">View Loans</a>
            </div>

            <h2 class="text-center text-secondary">Add New Loan</h2>
            
            <form action="add_loan.php" method="POST" class="mt-3">
                <div class="mb-3">
                    <label class="form-label">Borrower Name</label>
                    <input type="text" name="borrower_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <input type="text" name="amount" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Interest Rate (%)</label>
                    <input type="text" name="interest_rate" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Term (Months)</label>
                    <input type="text" name="term" class="form-control" required>
                </div>

                <div class="text-center">
                    <input type="submit" value="Add Loan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS (optional, only needed if you use Bootstrap JS components like modals) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
