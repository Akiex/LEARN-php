<?php
require __DIR__ . '/../../vendor/autoload.php';

use Dotenv\Dotenv;
use Stripe\StripeClient;

// Charge le fichier .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../config');
$dotenv->load();

// Initialisation de Stripe avec la clé secrète
$stripe = new StripeClient($_ENV['SK_TEST']);


function calculateOrderAmount(int $amount): int
{
    return max(100, $amount * 100);
}

// Réponse JSON
header('Content-Type: application/json');

try {
    $jsonStr = file_get_contents('php://input');

    $jsonObj = json_decode($jsonStr);

    if (!isset($jsonObj->amount) || !is_numeric($jsonObj->amount) || $jsonObj->amount < 1) {
        throw new Exception("Montant invalide : " . json_encode($jsonObj));
    }
    

    $paymentIntent = $stripe->paymentIntents->create([
    'amount' => calculateOrderAmount((int)$jsonObj->amount),
    'currency' => 'eur',
    'payment_method_types' => ['card'],
    ]);
    
    $output = [
        'clientSecret' => $paymentIntent->client_secret,
    ];
    

    echo json_encode($output);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}

