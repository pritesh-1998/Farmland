<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Schemes') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mx-auto bg-white rounded-md overflow-hidden shadow-md">
                    <div class="mx-auto bg-white rounded-md overflow-hidden shadow-md">
                        <form class="p-6" action="{{ route('addSchemes') }}" method="POST">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                                    <input type="text" id="name" name="name"
                                        class="form-input w-full rounded-md  @error('name') border-red-500 @enderror"
                                        placeholder="Enter name Name">
                                    @error('name')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label for="launched_date" class="block text-gray-700 font-bold mb-2">Launched
                                        Date</label>
                                    <input type="text" id="launched_date" name="launched_date"
                                        class="form-input w-full rounded-md @error('launched_date') border-red-500 @enderror"
                                        placeholder="Enter launched_date">
                                    @error('launched_date')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label for="yt" class="block text-gray-700 font-bold mb-2">Youtube
                                        Link</label>
                                    <input type="text" id="yt" name="yt"
                                        class="form-input w-full rounded-md  @error('yt') border-red-500 @enderror"
                                        placeholder="Enter youtube Link">
                                    @error('yt')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label for="website" class="block text-gray-700 font-bold mb-2">Website</label>
                                    <input type="text" id="website" name="website"
                                        class="form-input w-full rounded-md  @error('website') border-red-500 @enderror"
                                        placeholder="Enter website Name">
                                    @error('website')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label for="description"
                                        class="block text-gray-700 font-bold mb-2">Description</label>
                                    <textarea id="description" name="description" rows="3"
                                        class="form-textarea w-full rounded-md  @error('description') border-red-500 @enderror"
                                        placeholder="Enter Product Description"></textarea>
                                    @error('description')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label for="eligibility"
                                        class="block text-gray-700 font-bold mb-2">eligibility</label>
                                    <input type="text" id="eligibility" name="eligibility"
                                        class="form-input w-full rounded-md  @error('eligibility') border-red-500 @enderror"
                                        placeholder="Enter eligibility">
                                    @error('eligibility')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label for="state" class="block text-gray-700 font-bold mb-2">State</label>
                                    <input type="text" id="state" name="state"
                                        class="form-input w-full rounded-md  @error('state') border-red-500 @enderror"
                                        placeholder="Enter state">
                                    @error('state')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    style="background-color: darkblue !important;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
