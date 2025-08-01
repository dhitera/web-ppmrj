<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProfileCard extends Component
{
    public $image;
    public $name;
    public $jabatan;

    /**
     * Create a new component instance.
     */
    public function __construct($image, $name, $jabatan)
    {
        $this->image = $image;
        $this->name = $name;
        $this->jabatan = $jabatan;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profile-card');
    }
}
