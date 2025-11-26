<div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto">
            <!-- Заголовок -->
            <div class="flex flex-col text-center w-full mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Добавить страну</h1>
                <p class="text-gray-500 mt-2">Добавьте новую страну-производителя</p>
            </div>

            <!-- Сообщения -->
            @if (session()->has('message'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('message') }}
                </div>
            @endif

            <!-- Форма -->
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <form wire:submit='addCountry' class="flex flex-wrap -m-2">
                    <!-- Поле названия страны -->
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Название страны</label>
                            <input type="text" 
                                   id="name" 
                                   wire:model='name'
                                   placeholder="Введите название страны (например: Россия, Китай, Германия...)"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 placeholder-gray-400">
                            @error('name')
                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Кнопка -->
                    <div class="p-2 w-full">
                        <button type="submit"
                                class="flex mx-auto text-white bg-blue-600 border-0 py-3 px-8 focus:outline-none hover:bg-blue-700 rounded-lg text-lg font-medium transition-colors duration-200 shadow-md hover:shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Добавить страну
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>