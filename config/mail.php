<?php

return [
    'driver' => 'mailgun',
    'host' => 'smtp.mailgun.org',
    'port' => 587,
    'from' => ['address' => 'postmaster@sandbox56f840fe90394f34bc21f4fd28a1237a.mailgun.org', 'name' => 'Mailgun'],
    'reply-to' => ['address' => 'pakaporn@hotmail.com','name' => 'pakaporn'],
    'encryption' => 'tls',
    'username' => 'postmaster@sandbox56f840fe90394f34bc21f4fd28a1237a.mailgun.org',
    'password' => '4491907d44334e2eca3913bcf65e25f0',
    
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => false,
    'use_mailgun' => true,
];

