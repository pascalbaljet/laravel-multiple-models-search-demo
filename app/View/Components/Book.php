<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Book extends Component
{
    public $book;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Model $data)
    {
        $this->book = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.book');
    }
}
