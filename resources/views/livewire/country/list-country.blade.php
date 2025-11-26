<div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto">
            <!-- Заголовок -->
            <div class="flex flex-col text-center w-full mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Список стран</h1>
                <p class="text-gray-500 mt-2">Управление странами-производителями</p>
            </div>

            <!-- Сообщения -->
            @if (session()->has('message'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('message') }}
                </div>
            @endif

            <!-- Панель управления -->
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6 p-4 bg-white rounded-lg shadow-sm border">
                <!-- Выбор количества -->
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600">Показывать по:</span>
                    <select wire:change='paginate' wire:model='limit' 
                            class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @foreach ($limits as $key => $item)
                            <option wire:key='{{ $key }}' value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Поиск -->
                <div class="relative flex-1 max-w-md">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input wire:model.live.debounce.300ms='search' 
                           type="text" 
                           placeholder="Поиск по названию страны..."
                           class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400">
                </div>
            </div>

            <!-- Таблица -->
            <div class="bg-white rounded-lg shadow-sm border overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr class="grid grid-cols-[80px_1fr_120px] text-left">
                            <th wire:click='changeSort("ID")' class="cursor-pointer px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider hover:bg-gray-100 transition-colors">
                                <div class="flex items-center">
                                    ID
                                    <x-sort_category field='ID' :sort="$sort" :direction='$direction' />
                                </div>
                            </th>
                            <th wire:click='changeSort("Name")' class="cursor-pointer px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider hover:bg-gray-100 transition-colors">
                                <div class="flex items-center">
                                    Название страны
                                    <x-sort_category field='Name' :sort="$sort" :direction='$direction' />
                                </div>
                            </th>
                            <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Действия
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($countries as $country)
                            <tr wire:key='{{ $country->id }}'
                                class="grid grid-cols-[80px_1fr_120px] hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-4 text-sm font-medium text-gray-900">{{ $country->id }}</td>
                                <td class="px-4 py-4 text-sm text-gray-900">{{ $country->name }}</td>
                                <td class="px-4 py-4 text-sm">
                                    <button wire:click='deleteCountry({{ $country->id }})'
                                            wire:confirm="Вы уверены, что хотите удалить страну '{{ $country->name }}'?"
                                            class="text-red-600 hover:text-red-800 transition-colors flex items-center space-x-1"
                                            title="Удалить страну">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        <span>Удалить</span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Пагинация -->
            <div class="mt-6">
                {{ $countries->links() }}
            </div>

            <!-- Сообщение об отсутствии данных -->
            @if($countries->isEmpty())
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Страны не найдены</h3>
                    <p class="mt-1 text-sm text-gray-500">Начните с добавления первой страны.</p>
                </div>
            @endif
        </div>
    </section>
</div>