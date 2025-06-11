<?php

use App\Kernel;
require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

$privateKey = __DIR__ . '/config/jwt/private.pem';
$publicKey = __DIR__ . '/config/jwt/public.pem';

echo 'Private key exists? ' . (file_exists($privateKey) ? 'Yes' : 'No') . PHP_EOL;
echo 'Public key exists? ' . (file_exists($publicKey) ? 'Yes' : 'No') . PHP_EOL;

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
