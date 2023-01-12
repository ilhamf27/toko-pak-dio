<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TabelLaporan extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $reports;
    public function __construct($reports)
    {
        $this->reports = $reports;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tabel-laporan');
    }
}
