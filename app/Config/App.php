<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Session\Handlers\FileHandler;

class App extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Base Site URL
     * --------------------------------------------------------------------------
     *
     * URL to your CodeIgniter root. 
     * FIXED: Changed from port 8080 to match your exact working local development url path string.
     */
    public string $baseURL = 'http://localhost/atns/public/';

    /**
     * Allowed Hostnames in the Site URL other than the hostname in the baseURL.
     *
     * @var string[]
     * @phpstan-var list<string>
     */
    public array $allowedHostnames = [];

    /**
     * --------------------------------------------------------------------------
     * Index File
     * --------------------------------------------------------------------------
     */
    public string $indexPage = '';

    /**
     * --------------------------------------------------------------------------
     * URI PROTOCOL
     * --------------------------------------------------------------------------
     */
    public string $uriProtocol = 'REQUEST_URI';

    /**
     * --------------------------------------------------------------------------
     * Allowed URL URI Characters
     * --------------------------------------------------------------------------
     *
     * FIXED: Added this modern string definition property directly here to completely 
     * eliminate the framework runtime router engine crash.
     */
    public string $permittedURIChars = 'a-z 0-9~%.:_\-';

    /**
     * --------------------------------------------------------------------------
     * Default Locale
     * --------------------------------------------------------------------------
     */
    public string $defaultLocale = 'en';

    /**
     * --------------------------------------------------------------------------
     * Negotiate Locale
     * --------------------------------------------------------------------------
     */
    public bool $negotiateLocale = false;

    /**
     * --------------------------------------------------------------------------
     * Supported Locales
     * --------------------------------------------------------------------------
     *
     * @var string[]
     */
    public array $supportedLocales = ['en'];

    /**
     * --------------------------------------------------------------------------
     * Application Timezone
     * --------------------------------------------------------------------------
     */
    public string $appTimezone = 'Asia/Kolkata';

    /**
     * --------------------------------------------------------------------------
     * Default Character Set
     * --------------------------------------------------------------------------
     */
    public string $charset = 'UTF-8';

    /**
     * --------------------------------------------------------------------------
     * Force Global Secure Requests (HTTPS)
     * --------------------------------------------------------------------------
     */
    public bool $forceGlobalSecureRequests = false;

    /**
     * @deprecated use Config\Session::$driver instead.
     */
    public string $sessionDriver = FileHandler::class;

    /**
     * @deprecated use Config\Session::$cookieName instead.
     */
    public string $sessionCookieName = 'ci_session';

    /**
     * @deprecated use Config\Session::$expiration instead.
     */
    public int $sessionExpiration = 7200;

    /**
     * @deprecated use Config\Session::$savePath instead.
     */
    public string $sessionSavePath = WRITEPATH . 'session';

    /**
     * @deprecated use Config\Session::$matchIP instead.
     */
    public bool $sessionMatchIP = false;

    /**
     * @deprecated use Config\Session::$timeToUpdate instead.
     */
    public int $sessionTimeToUpdate = 300;

    /**
     * @deprecated use Config\Session::$regenerateDestroy instead.
     */
    public bool $sessionRegenerateDestroy = false;

    /**
     * @deprecated use Config\Session::$DBGroup instead.
     */
    public ?string $sessionDBGroup = null;

    /**
     * @deprecated use Config\Cookie::$prefix property instead.
     */
    public string $cookiePrefix = '';

    /**
     * @deprecated use Config\Cookie::$domain property instead.
     */
    public string $cookieDomain = '';

    /**
     * @deprecated use Config\Cookie::$path property instead.
     */
    public string $cookiePath = '/';

    /**
     * @deprecated use Config\Cookie::$secure property instead.
     */
    public bool $cookieSecure = false;

    /**
     * @deprecated use Config\Cookie::$httponly property instead.
     */
    public bool $cookieHTTPOnly = true;

    /**
     * @deprecated use Config\Cookie::$samesite property instead.
     */
    public ?string $cookieSameSite = 'Lax';

    /**
     * @var array<string, string>
     */
    public array $proxyIPs = [];

    /**
     * @deprecated Use `Config\Security` $tokenName property instead.
     */
    public string $CSRFTokenName = 'csrf_test_name';

    /**
     * @deprecated Use `Config\Security` $headerName property instead.
     */
    public string $CSRFHeaderName = 'X-CSRF-TOKEN';

    /**
     * @deprecated Use `Config\Security` $cookieName property instead.
     */
    public string $CSRFCookieName = 'csrf_cookie_name';

    /**
     * @deprecated Use `Config\Security` $expire property instead.
     */
    public int $CSRFExpire = 7200;

    /**
     * @deprecated Use `Config\Security` $regenerate property instead.
     */
    public bool $CSRFRegenerate = true;

    /**
     * @deprecated Use `Config\Security` $redirect property instead.
     */
    public bool $CSRFRedirect = false;

    /**
     * @deprecated `Config\Cookie` $samesite property is used.
     */
    public string $CSRFSameSite = 'Lax';

    /**
     * Content Security Policy Settings
     */
    public bool $CSPEnabled = false;
}