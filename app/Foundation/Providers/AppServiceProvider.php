<?php

namespace ActLoudBur\Foundation\Providers;

use Illuminate\Support\AggregateServiceProvider;

class AppServiceProvider extends AggregateServiceProvider
{
    protected $providers = [
        AuthServiceProvider::class,
        EventServiceProvider::class,
        RouteServiceProvider::class,
    ];
}
