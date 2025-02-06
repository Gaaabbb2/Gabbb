<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['borrower_name'];
    $amount = $_POST['amount'];
    $rate = $_POST['interest_rate'];
    $term = $_POST['term'];

    // Insert loan into the database
    $sql = "INSERT INTO loans (borrower_name, amount, interest_rate, term) 
            VALUES ('$name', '$amount', '$rate', '$term')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to view_loans.php with a success message
        header("Location: view_loans.php?message=Loan added successfully!");
        exit();  // Don't forget to call exit after header redirection!
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
