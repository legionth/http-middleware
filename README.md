# legionth/http-middleware

HTTP middleware interfaces based on the current status (2016-12-05) of the equivalent [PSR document from fig-php](https://github.com/php-fig/fig-standards/blob/master/proposed/http-middleware/middleware.md)

**Table of Contents**
* [Usage](#usage)
* [Install](#install)

## Usage

This is collection of all interfaces defined the currently proposed PSR-15 document.
It MAY can change in the future because this document is under discussions.

Create your own middleware e.g. using:

```php
class MyMiddleWare implements ClientMiddlewareInterface
{
    public function process(RequestInterface $request, DelegateInterface $next)
    {
        return $next->next($request);
    }
}
```

Checkout the PSR-15 proposed definitions.

## Install

[New to Composer?](https://getcomposer.org/doc/00-intro.md)

This will install the latest supported version:

```bash
$ composer require legionth/http-middleware:^0.1
```

## License

MIT
