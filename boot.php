<?php

require './vendor/autoload.php';

$gateway = new Braintree\Gateway([
  'environment' => 'sandbox',
  'merchantId' => '33h8f2cgrkxjwbqb',
  'publicKey' => '77hx874xb6fn2bh5',
  'privateKey' => 'a3cd858e9849fcb709bfc24caf6f7107'
]);