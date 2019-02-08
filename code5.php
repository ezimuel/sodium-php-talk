<?php
/**
 * Talk "The Sodium crypto library of PHP 7"
 *
 * @author Enrico Zimuel (enrico@zimuel.it)
 * @license https://github.com/ezimuel/sodium-php-talk//blob/master/LICENSE.md
 */
 
if (! sodium_crypto_aead_aes256gcm_is_available()) {
    throw new \Exception("AES-GCM is not supported on this platform");
}
$msg = 'Super secret message!';
$key = random_bytes(SODIUM_CRYPTO_AEAD_AES256GCM_KEYBYTES);
$nonce = random_bytes(SODIUM_CRYPTO_AEAD_AES256GCM_NPUBBYTES);

// AEAD encryption
$ad = 'Additional public data';
$ciphertext = sodium_crypto_aead_aes256gcm_encrypt(
    $msg,
    $ad,
    $nonce,
    $key
);
// AEAD decryption
$decrypted = sodium_crypto_aead_aes256gcm_decrypt(
    $ciphertext,
    $ad,
    $nonce,
    $key
);
if ($decrypted === false) {
    throw new \Exception("Decryption failed");
}
echo $decrypted === $msg ? 'OK' : 'Error';
