<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UsersTable extends Component
{
    public $users;
    
    public function __construct($users)
    {
        $this->users = $users;
    }

  
    public function render()
    {
        $users = $this->users;
        return view('components.users-table', compact('users'));
    }
}
