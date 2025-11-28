<div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto">
            <!-- Заголовок -->
            <div class="flex flex-col text-center w-full mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Добавить категорию</h1>
                <p class="text-gray-500 mt-2">Создайте новую категорию товаров</p>
            </div>

            <!-- Форма -->
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <form wire:submit='addCategory' class="flex flex-wrap -m-2">
                    <!-- Поле названия категории -->
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Название категории</label>
                            <input type="text" 
                                   id="name" 
                                   wire:model='name'
                                   placeholder="Введите название категории (например: Принтеры, Картриджи...)"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 placeholder-gray-400 shadow-sm">
                            @error('name')
                                <span class="text-red-500 text-sm mt-2 block flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Кнопка -->
                    <div class="p-2 w-full">
                        <button type="submit"
                                class="flex mx-auto text-white bg-gradient-to-r from-blue-600 to-blue-700 border-0 py-3 px-8 focus:outline-none hover:from-blue-700 hover:to-blue-800 rounded-lg text-lg font-medium transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Создать категорию
                        </button>
                    </div>
                </form>
            </div>

            <!-- Сообщение об успехе -->
            @if (session()->has('message'))
                <div class="mt-6 p-4 bg-green-50 border border-green-200 rounded-lg max-w-md mx-auto">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-green-700 font-medium">{{ session('message') }}</span>
                    </div>
                </div>
            @endif
        </div>
    </section>
</div>