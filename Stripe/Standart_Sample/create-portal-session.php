<?php

require 'vendor/autoload.php';
// This is your real test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51LakSyFzKXDxC9tYjQl8qKF3D8vjLtEzvfq4hBwzr1XDpo8lpqPUNEvTztLmU5VO6oHJ9F3IFmonbkOFsrifH1yt00KjfplTGV');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost:4242/public/success.html';

try {
  $checkout_session = \Stripe\Checkout\Session::retrieve($_POST['session_id']);
  $return_url = $YOUR_DOMAIN;

  // Authenticate your user.
  $session = \Stripe\BillingPortal\Session::create([
    'customer' => $checkout_session->customer,
    'return_url' => $return_url,
  ]);
  header("HTTP/1.1 303 See Other");
  header("Location: " . $session->url);
} catch (Error $e) {
  http_response_code(500);
  echo json_encode(['error' => $e->getMessage()]);
}