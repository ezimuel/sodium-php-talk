<?php
/**
 * Talk "The Sodium crypto library of PHP 7"
 *
 * @author Enrico Zimuel (enrico@zimuel.it)
 * @license https://github.com/ezimuel/sodium-php-talk//blob/master/LICENSE.md
 */
 
$aliceKeypair = sodium_crypto_box_keypair();
$alicePublicKey = sodium_crypto_box_publickey($aliceKeypair);
$aliceSecretKey = sodium_crypto_box_secretkey($aliceKeypair);

$bobKeypair = sodium_crypto_box_keypair();
$bobPublicKey = sodium_crypto_box_publickey($bobKeypair); // 32 bytes
$bobSecretKey = sodium_crypto_box_secretkey($bobKeypair); // 32 bytes

$msg = 'Hi Bob, this is Alice!';
$nonce = random_bytes(SODIUM_CRYPTO_BOX_NONCEBYTES); // 24 bytes

$keyEncrypt = $aliceSecretKey . $bobPublicKey;
$ciphertext = sodium_crypto_box($msg, $nonce, $keyEncrypt);

$keyDecrypt = $bobSecretKey . $alicePublicKey;
$plaintext = sodium_crypto_box_open($ciphertext, $nonce, $keyDecrypt);
echo $plaintext === $msg ? 'Success' : 'Error';
