<?php

namespace Northeastern\Blade;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;
use Northeastern\Blade\Components\LocalHeader;

class JigsawServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Facade::setFacadeApplication($this->app);

        $this->loadViewsFrom(__DIR__.'/views', 'kernl-ui');

        $this->app->get('bladeCompiler')
            ->component(LocalHeader::class, 'kernl-local-header');
    }
}
