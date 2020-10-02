<?php

namespace Northeastern\Blade;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Northeastern\Blade\Components\Accordion\Base as AccordionBase;
use Northeastern\Blade\Components\Accordion\Item as AccordionItem;
use Northeastern\Blade\Components\Accordion\WithLeftIcon as AccordionWithLeftIcon;
use Northeastern\Blade\Components\Carousel\Base as CarouselBase;
use Northeastern\Blade\Components\Carousel\Base\Slide as CarouselBaseSlide;
use Northeastern\Blade\Components\LocalHeader;

class ServiceProvider extends BaseServiceProvider
{
    const COMPONENTS = [
        LocalHeader::class => 'kernl-local-header',
        AccordionBase::class => 'kernl-accordion.base',
        AccordionItem::class => 'kernl-accordion.item',
        AccordionWithLeftIcon::class => 'kernl-accordion.with-left-icon',
        CarouselBase::class => 'kernl-carousel.base',
        CarouselBaseSlide::class => 'kernl-carousel.base.slide',
    ];
}
