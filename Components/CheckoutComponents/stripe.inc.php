<?php
 
    require_once "vendor/autoload.php";
 
    $stripe = new \Stripe\StripeClient('sk_test_51KiJStCiLMNwkdjmlxRvmpexo2tsqrExebyJfWBgxRp6UhZaN0M76FoVH45xE98v7gdaO16DzooG5hk2G2TH4P7900I8n6AE13');
 
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