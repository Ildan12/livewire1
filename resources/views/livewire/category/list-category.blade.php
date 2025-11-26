<div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 mx-auto">

            <div class="flex flex-col text-center w-full">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">List Category</h1>
            </div>
            <div class="flex justify-between w-full ">
                <select wire:change='paginate' wire:model='limit' class="border border-gray-300 p-2">
                    @foreach ($limits as $key => $item)
                        <option wire:key='{{ $key }}' value="{{ $item }}">{{ $item }}</option>
                    @endforeach

                </select>
                <input wire:model.live.debounce.300ms='search' type="text" placeholder="Search..." class="border border-gray-300 p-2">
            </div>
            <table class="w-full mt-4">
                <thead>
                    <tr class="grid grid-cols-[1fr_10fr_1fr] text-left bg-gray-200 px-2 py-3">
                        <th wire:click = 'changeSort("ID")' class="cursor-pointer">
                            <x-sort_category field='ID' :sort="$sort" :direction='$direction' />
                        </th>
                        <th wire:click = 'changeSort("Name")' class="cursor-pointer">
                            <x-sort_category field='Name' :sort="$sort" :direction='$direction' />
                        </th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr wire:key='{{ $category->id }}'
                            class="grid grid-cols-[1fr_10fr_1fr] text-left bg-gray-200 p-2 odd:bg-white even:bg-gray-200 hover:bg-gray-500 hover:text-white items-center">
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <button wire:click='deleteCategory({{ $category->id }})'
                                    class="text-white bg-red-500 border-0 py-1 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="py-2">
                {{ $categories->links() }}

            </div>

        </div>
    </section>
</div>
