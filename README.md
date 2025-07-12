# Laravel Secure Middleware

A Laravel middleware package that enforces secure web behavior like automatic HTTPS redirection and forcing non-WWW domains. Built for simplicity, flexibility, and modern Laravel projects.

## ✨ Features

- 🔐 Automatically redirects all HTTP traffic to HTTPS (`AlwaysUseHTTPS`)
- 🌐 Forces all URLs to remove the `www.` prefix (`ForceNonWWW`)
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
use MohdRaquib\SecureMiddleware\ForceNonWWW;

protected $middleware = [
    // ...
    AlwaysUseHTTPS::class,
    ForceNonWWW::class,
];
```

### ➕ Or Register as Route Middleware

```php
protected $routeMiddleware = [
    'https.redirect' => \MohdRaquib\SecureMiddleware\AlwaysUseHTTPS::class,
    'remove.www' => \MohdRaquib\SecureMiddleware\ForceNonWWW::class,
];
```

Then apply to specific routes:

```php
Route::get('/secure', function () {
    return 'Secure Route';
})->middleware(['https.redirect', 'remove.www']);
```

## 🧱 Middleware Details

### `AlwaysUseHTTPS`
Redirects all HTTP requests to their HTTPS equivalents. Prevents unsecured traffic automatically.

### `ForceNonWWW`
Redirects all `www.example.com` URLs to `example.com`, maintaining SEO consistency and simplifying domain access.

## 🔄 Example Redirect

- `http://www.example.com/test` → `https://example.com/test`

## 📄 License

This package is open-sourced software licensed under the [MIT license](LICENSE).

## 👤 Author

**Mohammad Raquib**  
[GitHub](https://github.com/mohammadraquib)

---

Secure your Laravel application in seconds with smart middleware!
