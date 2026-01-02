<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    public function __construct(
        public string $page = '',
        public string $for = 'web',
        public bool $sticky = false,
    ) {}

    public function render(): View
    {
        $title = $this->page ? $this->page.' - '.config('app.name') : config('app.name');
        $sticky = $this->sticky;

        return match ($this->for) {
            'web' => view('layouts.guest', compact('title')),
            'superadmin' => view('superadmin.layouts.guest', compact('title')),
            'landing' => view('layouts.landing', compact('title', 'sticky')),
            'auth' => view('layouts.auth', compact('title')),
            default => view('layouts.guest', compact('title')),
        };
    }
}
