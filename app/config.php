<?php
// config file reads ENV or fallback to .env values
return [
    'env' => getenv('APP_ENV') ?: 'production',
    'app_url' => getenv('APP_URL') ?: 'http://localhost:8080',
    'db' => [
        'host' => getenv('DB_HOST') ?: '127.0.0.1',
        'name' => getenv('DB_NAME') ?: 'siakad',
        'user' => getenv('DB_USER') ?: 'siakad',
        'pass' => getenv('DB_PASSWORD') ?: '',
        'charset' => 'utf8mb4',
    ],
    'smtp' => [
        'host' => getenv('SMTP_HOST') ?: '',
        'port' => getenv('SMTP_PORT') ?: 587,
        'user' => getenv('SMTP_USER') ?: '',
        'pass' => getenv('SMTP_PASS') ?: '',
        'from_email' => getenv('SMTP_FROM') ?: 'siakad@example.com',
        'from_name' => getenv('SMTP_NAME') ?: 'SIAKAD NeoSync'
    ],
    'neo' => [
        'url' => getenv('NEO_FEEDER_URL') ?: '',
        'token' => getenv('NEO_FEEDER_TOKEN') ?: ''
    ],
    'default_sks_limit' => intval(getenv('DEFAULT_SKS_LIMIT') ?: 24),
    'cache_path' => __DIR__ . '/../cache',
    'cache_ttl' => 300
];
