# Laravel Secure Middleware

A Laravel middleware package that enforces secure web behavior like automatic HTTPS redirection, forcing or removing `www.`, and setting the HSTS header for stricter browser security. Built for simplicity, flexibility, and modern Laravel projects.

## ✨ Features

- 🔐 Automatically redirects all HTTP traffic to HTTPS (`AlwaysUseHTTPS`)
- 🌐 Forces all URLs to remove the `www.` prefix (`ForceNonWWW`)
- 🌐 Or forces all URLs to use the `www.` prefix (`ForceWWW`)
- 🔒 Adds HTTP Strict Transport Security headers (`EnableHSTS`)
- 📦 Easy to install via Composer
- 🚀 Works out-of-the-box with Laravel's middleware stack

## 📦 Installation

Install the package using Composer:

```bash
composer require mohdraquib/laravel-secure-middleware
```

## 🧩 Usage

Register the middleware in your Laravel application's `app/Http/Kernel.php`.

### ➕ Add to Global Middleware Stack

```php
use MohdRaquib\SecureMiddleware\AlwaysUseHTTPS;
use MohdRaquib\SecureMiddleware\EnableHSTS;
use MohdRaquib\SecureMiddleware\ForceNonWWW;
// or use ForceWWW instead of ForceNonWWW

protected $middleware = [
    // ...
    AlwaysUseHTTPS::class,
    EnableHSTS::class,
    ForceNonWWW::class, // or ForceWWW::class
];
```

### ➕ Or Register as Route Middleware

```php
protected $routeMiddleware = [
    'https.redirect' => \MohdRaquib\SecureMiddleware\AlwaysUseHTTPS::class,
    'hsts' => \MohdRaquib\SecureMiddleware\EnableHSTS::class,
    'remove.www' => \MohdRaquib\SecureMiddleware\ForceNonWWW::class,
    'force.www' => \MohdRaquib\SecureMiddleware\ForceWWW::class,
];
```

Then apply to specific routes:

```php
Route::get('/secure', function () {
    return 'Secure Route';
})->middleware(['https.redirect', 'hsts', 'remove.www']);
```

## 🧱 Middleware Details

### `AlwaysUseHTTPS`
Redirects all HTTP requests to their HTTPS equivalents. Prevents unsecured traffic automatically.

### `EnableHSTS`
Adds the `Strict-Transport-Security` header to all secure (HTTPS) responses to instruct browsers to always use HTTPS.

### `ForceNonWWW`
Redirects all `www.example.com` URLs to `example.com`, maintaining SEO consistency and simplifying domain access.

### `ForceWWW`
Redirects all `example.com` URLs to `www.example.com`, if you prefer using the `www.` subdomain.

## 🔄 Example Redirects

- `http://www.example.com/test` → `https://example.com/test`
- `https://example.com/test` → `https://www.example.com/test` (if using `ForceWWW`)

## 📄 License

This package is open-sourced software licensed under the [MIT license](LICENSE).

## 👤 Author

**Mohammad Raquib**  
[GitHub](https://github.com/mohammadraquib)

---

Secure your Laravel application in seconds with smart middleware!
