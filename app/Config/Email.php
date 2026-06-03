<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail = 'praveen.r@atnatechnologies.com';

    public string $fromName = 'ATNA Technologies';

    public string $recipients = '';

    public string $userAgent = 'CodeIgniter';

    /*
    |--------------------------------------------------------------------------
    | Mail Protocol
    |--------------------------------------------------------------------------
    | */
    public string $protocol = 'smtp';

    public string $mailPath = '/usr/sbin/sendmail';

    /*
    |--------------------------------------------------------------------------
    | Microsoft 365 SMTP Settings
    |--------------------------------------------------------------------------
    | */
    public string $SMTPHost = 'smtp.office365.com';

    public string $SMTPUser = 'praveen.r@atnatechnologies.com';

    public string $SMTPPass = 'Cloud@1995';

    public int $SMTPPort = 465;

    public int $SMTPTimeout = 30;

    public bool $SMTPKeepAlive = false;

    public string $SMTPCrypto = 'ssl';

    /*
    |--------------------------------------------------------------------------
    | Mail Format
    |--------------------------------------------------------------------------
    | */
    public bool $wordWrap = true;

    public int $wrapChars = 76;

    public string $mailType = 'html';

    public string $charset = 'UTF-8';

    public bool $validate = true;

    public int $priority = 3;

    public string $CRLF = "\r\n";

    public string $newline = "\r\n";

    public bool $BCCBatchMode = false;

    public int $BCCBatchSize = 200;

    public bool $DSN = false;
}