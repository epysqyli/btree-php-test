<?php
require 'boot.php';

print_r($_POST);

if (empty($_POST['payment_method_nonce'])) {
  header('location: index.php');
}

$result = $gateway->transaction()->sale([
  'amount' => $_POST['amount'],
  'merchantAccountId' => 'randomId1234',
  'paymentMethodNonce' => $_POST['payment_method_nonce'],
  'customer' => [
    'firstName' => $_POST['firstName'],
    'lastName' => $_POST['lastName'],
  ],
  'options' => [
    'submitForSettlement' => True
  ]
]);

if ($result->success === true) {
} else {
  var_dump($result->errors);
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
  <title>Payment Report</title>
</head>

<body>
  <form class="payment-form">
    <label for="ID" class="heading">Transaction ID</label><br>
    <input type="text" disabled='disable' name="firstName" id="firstName" value="<?php echo $result->transaction->id; ?>"><br><br>

    <label for="firstName" class="heading">First Name</label><br>
    <input type="text" disabled='disable' name="firstName" id="firstName" value="<?php echo $result->transaction->customer['firstName']; ?>"><br><br>

    <label for="lastName" class="heading">Last Name</label><br>
    <input type="text" disabled='disable' name="lastName" id="lastName" value="<?php echo $result->transaction->customer['lastName']; ?>"><br><br>

    <label for="amount" class="heading">Amount- USD</label><br>
    <input type="text" disabled='disable' name="amount" id="amount" value="<?php echo $result->transaction->amount . " " . $result->transaction->currencyIsoCode; ?>"><br><br>

    <label for="status" class="heading">Status</label><br>
    <input type="text" disabled='disable' name="amount" id="amount" value="Successful"><br><br>

    <div id="dropin-container"></div>
    <br><br>
    <button type="submit">Pay with Braintree</button>
  </form>
</body>

</html>