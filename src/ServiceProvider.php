<?php

namespace Northeastern\Blade;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Northeastern\Blade\Components\Accordion\Base;
use Northeastern\Blade\Components\Accordion\Item;
use Northeastern\Blade\Components\Accordion\WithLeftIcon;
use Northeastern\Blade\Components\LocalHeader;

class ServiceProvider extends BaseServiceProvider
{
    const COMPONENTS = [
        LocalHeader::class => 'kernl-local-header',
        Base::class => 'kernl-accordion.base',
        Item::class => 'kernl-accordion.item',
        WithLeftIcon::class => 'kernl-accordion.with-left-icon',
    ];
}
