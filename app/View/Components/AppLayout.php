<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public function __construct(
        public string $page = '',
        public string $for = 'web',
    ) {}

    public function render(): View
    {
        $title = $this->page ? $this->page.' - '.config('app.name') : config('app.name');

        return match ($this->for) {
            'web' => view('layouts.app', compact('title')),
            'superadmin' => view('superadmin.layouts.app', compact('title')),
            default => view('layouts.app', compact('title')),
        };
    }
}
