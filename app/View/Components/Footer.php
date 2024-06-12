<?php

namespace App\View\Components;

use App\Models\SocialSite;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public $socialSites;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->socialSites = SocialSite::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.footer');
    }
}
