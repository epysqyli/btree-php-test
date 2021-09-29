<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://js.braintreegateway.com/js/braintree-2.32.1.min.js"></script>
  <link rel="stylesheet" href="styles/style.css">

  <script>
    const getToken = async () => {
      const req = await fetch("/btree/token.php");
      const token = await req.json();
      braintree.setup(token, 'dropin', {
        container: 'dropin-container',
      });
    }

    document.addEventListener('DOMContentLoaded', () => {
      getToken();
    });
  </script>

  <title>Braintree Test</title>
</head>

<body>
  <form action="payment.php" method="post" class="payment-form">
    <label for="firstName" class="heading">First Name</label><br>
    <input type="text" name="firstName" id="firstName"><br><br>

    <label for="lastName" class="heading">Last Name</label><br>
    <input type="text" name="lastName" id="lastName"><br><br>

    <label for="amount" class="heading">Amount- USD</label><br>
    <input type="text" name="amount" id="amount"><br><br>

    <div id="dropin-container"></div>
    <br><br>
    <button type="submit">Pay with Braintree</button>
  </form>
</body>

</html>