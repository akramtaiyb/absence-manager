<?php

namespace App\Livewire;

use Livewire\Component;

class Dropdown extends Component
{
    public bool $isOpen = false;
    public array $options = [
        [
            "name" => "Profil",
            "method" => "GET",
            "action" => "logout",
            "color" => "primary",
        ],
        [
            "name" => "Se déconnecter",
            "method" => "POST",
            "action" => "logout",
            "color" => "danger",
        ]
    ];

    public function toggleDropdown()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function awayToggleDropdown()
    {
        $this->isOpen = ($this->isOpen === true) ? !$this->isOpen : $this->isOpen;
    }

    public function render()
    {
        return view('livewire.dropdown');
    }
}
