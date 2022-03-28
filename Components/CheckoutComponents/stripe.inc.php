<?php
 
    require_once "vendor/autoload.php";
 
    $stripe = new \Stripe\StripeClient('sk_test_5OX6hk9hz9BfzfTNmV8R0RlW');
 
    try
    {
        $payment = $stripe->paymentIntents->retrieve(
            $_POST["payment_id"],
            []
        );
 
        if ($payment->status == "succeeded")
        {
            echo json_encode([
                "status" => "success",
                "payment" => $payment,
            ]);
            header('Location: paymentSuccess.php');
            exit();
        }
    }
    catch (\Exception $exp)
    {
        header('Location: paymentError.php');
        echo json_encode([
            "status" => "error",
            "message" => $exp->getMessage()
        ]);
        exit();
    }