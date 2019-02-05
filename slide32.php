<?php
/**
 * Talk "The Sodium crypto library of PHP 7"
 *
 * @author Enrico Zimuel (enrico@zimuel.it)
 * @license https://github.com/ezimuel/sodium-php-talk//blob/master/LICENSE.md
 */

$password = 'password';

// Argon2i without Sodium
$hash = password_hash($password, PASSWORD_ARGON2I); // 95 bytes
// Argon2id with PHP 7.3
$hash2 = password_hash($password, PASSWORD_ARGON2ID);

echo password_verify($password, $hash) ? 'OK' : 'Error';
echo password_verify($password, $hash2) ? 'OK' : 'Error';
