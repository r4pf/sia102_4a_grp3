<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $tenantName = htmlspecialchars($_POST['tenant_name']);
    $rentalMonths = intval($_POST['rental_month']);
    $monthlyRate = floatval($_POST['month_rate']);
    $paymentMethod = htmlspecialchars($_POST['payment_method']);
    $tenantEmail = filter_var($_POST['tenant_email'], FILTER_VALIDATE_EMAIL);

    // Validate email
    if (!$tenantEmail) {
        echo "Invalid email address.";
        exit;
    }

    // Calculate total bill
    $totalAmount = $rentalMonths * $monthlyRate;

    // Email content
    $subject = "Your Rental Bill";
    $message = "
        Dear $tenantName,\n\n
        Here are your rental details:\n
        Number of Rental Months: $rentalMonths\n
        Monthly Rate: $$monthlyRate\n
        Payment Method: $paymentMethod\n
        Total Amount: $$totalAmount\n\n
        Thank you for choosing us!
    ";
    $headers = "From: your_email@example.com";

    // Send email
    if (mail($tenantEmail, $subject, $message, $headers)) {
        echo "Email sent successfully to $tenantEmail.";
    } else {
        echo "Failed to send email.";
    }
}
?>
