<?php

namespace Northeastern\Blade;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

class JigsawServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Facade::setFacadeApplication($this->app);

        $this->loadViewsFrom(__DIR__.'/views', 'kernl-ui');

        $this->app->get('bladeCompiler')
            ->components(self::COMPONENTS);
    }
}
