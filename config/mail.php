<?php

declare(strict_types=1);

/**
 * SMTP / mail configuration (overridden by settings table when present)
 */
return [
    'driver'     => 'smtp',
    'host'       => 'smtp.gmail.com',
    'port'       => 587,
    'encryption' => 'tls',
    'username'   => '',
    'password'   => '',
    'from_email' => 'noreply@localhost',
    'from_name'  => 'CMS Portal',
];
