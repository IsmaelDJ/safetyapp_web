<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RegisterForm extends Component
{
    public $role;
    public $isCarrier = false;

    public function updatedRole(){
        if($this->role == 'transporteur'){
            $this->isCarrier = true;
        }
        else {
            $this->isCarrier = false;
        }
    }

    public function render()
    {
        if($this->role == 'transporteur'){
            $this->isCarrier = true;
        }
        else {
            $this->isCarrier = false;
        }

        return view('livewire.register-form');
    }
}
