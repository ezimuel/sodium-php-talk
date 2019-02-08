<?php
/**
 * Talk "The Sodium crypto library of PHP 7"
 *
 * @author Enrico Zimuel (enrico@zimuel.it)
 * @license https://github.com/ezimuel/sodium-php-talk//blob/master/LICENSE.md
 */
 
$password = 'password';
$salt = random_bytes(SODIUM_CRYPTO_PWHASH_SALTBYTES);

$key = sodium_crypto_pwhash(
    32,
    $password,
    $salt,
    SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE,
    SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE
);

var_dump($key);
