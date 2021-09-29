<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://js.braintreegateway.com/web/dropin/1.31.2/js/dropin.min.js"></script>
  <link rel="stylesheet" href="styles/style.css">
  <title>Braintree Test</title>
</head>

<body>
  <form action="payment.php" method="post" class="payment-form" id="payment-form">
    <label for="firstName" class="heading">First Name</label><br>
    <input type="text" name="firstName" id="firstName"><br><br>

    <label for="lastName" class="heading">Last Name</label><br>
    <input type="text" name="lastName" id="lastName"><br><br>

    <label for="amount" class="heading">Amount- USD</label><br>
    <input type="text" name="amount" id="amount"><br><br>

    <div id="dropin-container"></div>
    <br><br>
    <button type="submit">Pay with Braintree</button>
    <input type="hidden" id="nonce" name="payment_method_nonce">
  </form>

  <script>
    const form = document.getElementById('payment-form');

    const getToken = async () => {
      const req = await fetch("/btree/token.php");
      const token = await req.json();
      braintree.dropin.create({
        authorization: token,
        container: document.getElementById('dropin-container'),
      }).then(dropinInstance => {
        form.addEventListener('submit', (e) => {
          e.preventDefault();

          dropinInstance.requestPaymentMethod().then(payload => {
            document.getElementById('nonce').value = payload.nonce;
            form.submit();
          }).catch(error => {
            throw error;
          });
        })
      }).catch(error => {
        console.log(error);
      })
    }

    // fire getToken on DOMContentLoaded
    document.addEventListener('DOMContentLoaded', () => {
      getToken();
    });
  </script>

</body>

</html>