<?php

namespace App\Livewire\Country;

use App\Models\Country;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddCountry extends Component
{
    public $name = '';

    public function addCountry()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:countries,name',
        ]);

        Country::create([
            'name' => $this->name,
        ]);

        $this->reset(['name']);
        
        // Отправляем событие об обновлении списка
        $this->dispatch('countryAdded');
        
        session()->flash('message', 'Страна успешно добавлена!');
    }

    public function render()
    {
        return view('livewire.country.add-country');
    }
}