<div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 mx-auto">

            <div class="flex flex-col text-center w-full ">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Add Category</h1>
            </div>


            <form wire:submit='addCategory'
                class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end">
                <div class="relative flex-grow w-full grid grid-cols-[3fr_1fr] grid-rows-3 gap-x-2">
                    <label for="name" class="leading-7 text-sm text-gray-600 self-end">Name Category</label>
                    <input type="text" id="name" wire:model='name'
                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out col-start-1 col-end-2 row-start-2 row-end-3">
                    @error('name')
                        <span class="leading-7 text-sm text-red-600 col-start-1 col-end-2">{{ $message }}</span>
                    @enderror

                    <button type="submit"
                        class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg col-start-2 col-end-3 row-start-2 row-end-3">Save</button>
                </div>


            </form>
        </div>
    </section>
</div>
