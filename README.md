# Northeastern Support

Package of Blade components for Northeastern University websites

## Installation

You can install the package via composer:

```bash
composer require northeastern-web/blade-components
```

> Note: You may need to add the following to your `composer.json` file before installing the package.

```json
    "minimum-stability": "dev",
    "prefer-stable": true
```

> Note: In order to use this package, your project must support the new Blade 7 components.

## Usage

### Local Header

To use the local header component, add the following markup to your Blade template.

```blade
<x-kernl-local-header :links="$links" :current-path="$currentPath">
    <x-slot name="logo">
        <!-- Insert SVG logo here with class="w-full" applied -->
    </x-slot>
    <x-slot name="searchModal">
        <!-- If you have a search modal implemented, add the markup/component here. Otherwise omit this slot. -->
    </x-slot>
</x-kernl-local-header>
```

#### Props

- `links` = Array of links for the navigation sections of the header. Each link can have a `children` key that's an array of more links. These links will be displayed in a dropdown under the parent link. Example:
    ```php
    $links = [
        [
            'text' => 'Our Programs',
            'href' => '/programs',
        ],
        [
            'text' => 'About',
            'href' => '/about',
            'children' => [
                [
                    'text' => 'Careers',
                    'href' => '/about/careers',
                ],
                [
                    'text' => 'Staff',
                    'href' => '/about/staff',
                ],
            ],
        ],
    ];
    ```
- `current-path` - Used to display the active state on each link. Pass the relative path of the current page (`/about/staff`).
