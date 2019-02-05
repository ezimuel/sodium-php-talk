<?php
/**
 * Talk "The Sodium crypto library of PHP 7"
 *
 * @author Enrico Zimuel (enrico@zimuel.it)
 * @license https://github.com/ezimuel/sodium-php-talk//blob/master/LICENSE.md
 */

$msg = 'This is a super secret message!';

// Generating an encryption key and a nonce
$key   = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES); // 256 bit
$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES); // 24 bytes

// Encrypt
$ciphertext = sodium_crypto_secretbox($msg, $nonce, $key);
// Decrypt
$plaintext = sodium_crypto_secretbox_open($ciphertext, $nonce, $key);

echo $plaintext === $msg ? 'Success' : 'Error';
