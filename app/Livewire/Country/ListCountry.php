<?php

namespace App\Livewire\Country;

use App\Models\Country;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ListCountry extends Component
{
    use WithPagination;

    public $search = '';
    public $sort = 'id';
    public $direction = 'asc';
    public $limit = 10;
    public $limits = [5, 10, 25, 50];

    // Слушаем события обновления
    protected $listeners = ['countryAdded' => '$refresh', 'countryDeleted' => '$refresh'];

    public function changeSort($field)
    {
        if ($this->sort === $field) {
            $this->direction = $this->direction === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sort = $field;
            $this->direction = 'asc';
        }
    }

    public function deleteCountry($id)
    {
        $country = Country::find($id);
        $country->delete();
        
        // Отправляем событие об удалении
        $this->dispatch('countryDeleted');
        
        session()->flash('message', 'Страна "' . $country->name . '" удалена!');
    }

    public function paginate()
    {
        $this->resetPage();
    }

    public function render()
    {
        $countries = Country::when($this->search, function ($query) {
            return $query->where('name', 'like', '%' . $this->search . '%');
        })
        ->orderBy($this->sort === 'ID' ? 'id' : 'name', $this->direction)
        ->paginate($this->limit);

        return view('livewire.country.list-country', compact('countries'));
    }
}