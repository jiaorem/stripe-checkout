<?php require "vendor/autoload.php";

$stripe = new \Stripe\StripeClient(
  'sk_test_51LgIL6JDVdkZQkB8LlIgHQbRhd0nkWRJZmUlg32mJIleQ6DyHGmdMg2JXKk3wXWenDOaQ8fMGgmBBSt0wmJeY0HY00FjrBokRO'
);
$result = $stripe->products->retrieve(
  'prod_MP6pNBh2v4EVfo',
  []
);
var_dump($result);