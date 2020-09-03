<?php

namespace Northeastern\Blade;

use Illuminate\Support\Facades\Blade;

class NUKernlUIBladeComponentsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'kernl-ui');

        Blade::components(self::COMPONENTS);
    }
}
