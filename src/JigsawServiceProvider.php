<?php

namespace Northeastern\Blade;

use Illuminate\Support\Facades\Facade;

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
