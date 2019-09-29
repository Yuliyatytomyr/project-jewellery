<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/dropzone/deleteFiles',
        'mailing/subscribe',
        'mailing/unsubscribe',
        'payment',
        'ua/manager/gproducts',
        'payment/result',
        'payment/approved',
        'dropzone/uploadFiles'
    ];
}
