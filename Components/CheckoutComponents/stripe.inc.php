<?php
 
    require_once "vendor/autoload.php";
 
    $stripe = new \Stripe\StripeClient('sk_test_51KiHJEEIsZ5yvNB5WoMfOjI15pYld5EF3uDYbD2XOFLUbNtvkcTku3VIYpf908EPcb1op4Nk0kJaDcOpqkV2FdSa00LV1zLrVL');
 
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