
document.getElementById('billing-form').addEventListener('submit', function(event) {
    event.preventDefault();


    const tenantName = document.getElementById('tenant-name').value;
    const rentalMonth = parseInt(document.getElementById('rental-month').value);
    const monthRate = parseFloat(document.getElementById('month-rate').value);
    const paymentMethod = document.getElementById('payment-method').value;


    const totalBill = rentalMonth * monthRate;


    document.getElementById('bill-output').innerHTML = `
        <h2>Billing Summary</h2>
        <p>Tenant Name: ${tenantName}</p>
        <p>Rental Months: ${rentalMonth}</p>
        <p>Monthly Rate: ${monthRate.toFixed(2)}</p>
        <p>Payment Method: ${paymentMethod.replace('-', ' ').toUpperCase()}</p>
        <p><strong>Total Bill: ${totalBill.toFixed(2)}</strong></p>
    `;
});
