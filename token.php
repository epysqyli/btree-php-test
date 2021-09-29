<?php
require './gateway.php';

echo json_encode($gateway->clientToken()->generate());