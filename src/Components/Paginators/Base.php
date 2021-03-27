<?php

namespace Northeastern\Blade\Components\Paginators;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Base extends Component
{
    public $name;
    public $mode;
    public $numberOfPages;
    public $currentPage;
    public $paginationUrl;
    public $queryParamName;
    public $appends;

    public function __construct(
        $name = null,
        $mode = 'php',
        $numberOfPages = 0,
        $currentPage = null,
        $paginationUrl = '#',
        $queryParamName = 'page',
        $appends = []
    ) {
        $this->name = $name;
        $this->mode = $mode;
        $this->numberOfPages = (int) $numberOfPages;
        $this->currentPage = $currentPage ? (int) $currentPage : 1;
        $this->paginationUrl = $paginationUrl;
        $this->queryParamName = $queryParamName;
        $this->appends = $appends;
    }

    public function inPhpMode(): bool
    {
        return $this->mode === 'php';
    }

    public function pagePaginationUrl($page)
    {
        if ($page < 1) {
            return '#';
        }

        if ($page > $this->numberOfPages) {
            return '#';
        }

        if ($this->currentPage === $page) {
            return '#';
        }

        $queryParams = collect()
            ->merge([
                $this->queryParamName => $page,
            ])
            ->merge($this->appends)
            ->map(function ($queryParamValue, $queryParamName) {
                return collect()
                    ->push($queryParamName)
                    ->push($queryParamValue)
                    ->join('=');
            })
            ->join('&');

        return "{$this->paginationUrl}?{$queryParams}";
    }

    public function pageClasses($page)
    {
        return collect()
            ->when($page === $this->currentPage, function ($collection) {
                return $collection->merge([
                    'inline-flex',
                    'items-center',
                    'justify-center',
                    'w-6',
                    'h-6',
                    'text-sm',
                    'leading-none',
                    'text-white',
                    'bg-gray-900',
                    'rounded-full',
                    'focus:outline-none',
                    'focus:ring',
                    'focus:ring-blue-500',
                ]);
            })
            ->when($page !== $this->currentPage, function ($collection) {
                return $collection->merge([
                    'inline-flex',
                    'items-center',
                    'justify-center',
                    'w-6',
                    'h-6',
                    'text-sm',
                    'leading-none',
                    'rounded-full',
                    'focus:outline-none',
                    'focus:ring',
                    'focus:ring-blue-500',
                ]);
            })
            ->join(' ');
    }

    public function navigationArrowsClasses($page)
    {
        return collect()
            ->merge([
                'inline-flex',
                'items-center',
                'justify-center',
                'w-6',
                'h-6',
                'text-sm',
                'leading-none',
                'rounded-full',
                'focus:outline-none',
                'focus:ring',
                'focus:ring-blue-500',
            ])
            ->when(1 > $page || $page > $this->numberOfPages, function ($collection) {
                return $collection->push('text-gray-300');
            })
            ->when(1 < $page && $page < $this->currentPage, function ($collection) {
                return $collection->push('text-gray-700');
            })
            ->join(' ');
    }

    public function render()
    {
        return View::make('kernl-ui::paginators.base');
    }
}
