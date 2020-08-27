<?php

namespace Northeastern\Blade;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;
use Northeastern\Blade\Components\Accordion\Base;
use Northeastern\Blade\Components\Accordion\Item;
use Northeastern\Blade\Components\Accordion\WithLeftIcon;
use Northeastern\Blade\Components\LocalHeader;

class JigsawServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Facade::setFacadeApplication($this->app);

        $this->loadViewsFrom(__DIR__.'/views', 'kernl-ui');

        $this->app->get('bladeCompiler')
            ->components([
                LocalHeader::class => 'kernl-local-header',
                Base::class => 'kernl-accordion.base',
                Item::class => 'kernl-accordion.item',
                WithLeftIcon::class => 'kernl-accordion.with-left-icon',
            ]);
    }
}
