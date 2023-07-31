<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DocumentsTable extends Component
{
    public $documents;

    public function __construct($documents)
    {
        $this->documents = $documents;
    }

   
    public function render()
    {
        $documents = $this->documents;
        return view('components.documents-table', compact('documents'));
    }
}
