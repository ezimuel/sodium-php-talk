<?php
/**
 * Talk "The Sodium crypto library of PHP 7"
 *
 * @author Enrico Zimuel (enrico@zimuel.it)
 * @license https://github.com/ezimuel/sodium-php-talk//blob/master/LICENSE.md
 */
 
$msg = 'This is the message to authenticate!';
$key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES); // 256 bit

// Generate the Message Authentication Code
$mac = sodium_crypto_auth($msg, $key);

// Altering $mac or $msg, verification will fail
echo sodium_crypto_auth_verify($mac, $msg, $key) ? 'Success' : 'Error';
