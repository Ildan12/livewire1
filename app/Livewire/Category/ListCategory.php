<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ListCategory extends Component
{
    use WithPagination;

    public string $limit = '10';

    public array $limits = [10,25,50,100];

    public string $search = '';

    public string $sort = 'ID';

    public string $direction = 'desc';

    public array $sorts = ['ID','Name'];

    public function changeSort($sort)
    {
        if( $this->sort == $sort)
        {
            $this->direction = $this->direction === 'asc' ? 'desc' : 'asc';
            return;
        }
        $this->sort = $sort;

    }

    public function paginate()
    {
        $this->resetPage();
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();

        session()->flash('ok', 'Category deleted successfully');
    }

    #[On('addCategory')]
    public function render()
    {
        $categories = Category::where('name', 'like', '%'.$this->search.'%')
        ->orderBy($this->sort, $this->direction)
        ->paginate($this->limit);

        return view('livewire.category.list-category', compact('categories'));
    }
}
