<?php
/**
 * Talk "The Sodium crypto library of PHP 7"
 *
 * @author Enrico Zimuel (enrico@zimuel.it)
 * @license https://github.com/ezimuel/sodium-php-talk//blob/master/LICENSE.md
 */

$keypair = sodium_crypto_sign_keypair();
$publicKey = sodium_crypto_sign_publickey($keypair); // 32 bytes
$secretKey = sodium_crypto_sign_secretkey($keypair); // 64 bytes

$msg = 'This message is from Alice';
// Sign a message
$signedMsg = sodium_crypto_sign($msg, $secretKey);
// Or generate only the signature (detached mode)
$signature = sodium_crypto_sign_detached($msg, $secretKey); // 64 bytes

// Verify the signed message
$original = sodium_crypto_sign_open($signedMsg, $publicKey);
echo $original === $msg ? 'Signed msg ok' : 'Error signed msg';

// Verify the signature
echo sodium_crypto_sign_verify_detached($signature, $msg, $publicKey) ?
     'Signature ok' : 'Error signature';
