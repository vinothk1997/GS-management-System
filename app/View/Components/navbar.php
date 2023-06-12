<?php

namespace App\View\Components;

use Illuminate\View\Component;
use DB;
use Session;


class navbar extends Component
{
    public  $user;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user=session()->get('user');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar');
    }
}
