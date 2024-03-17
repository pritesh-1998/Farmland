<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mx-auto bg-white rounded-md overflow-hidden shadow-md">
                    <div class="mx-auto bg-white rounded-md overflow-hidden shadow-md">
                        <form class="p-6" action="{{ route('createstock') }}" method="POST">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label for="product" class="block text-gray-700 font-bold mb-2">Product</label>
                                    <input type="text" id="product" name="product"
                                        class="form-input w-full rounded-md  @error('product') border-red-500 @enderror"
                                        placeholder="Enter Product Name">
                                    @error('product')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label for="price" class="block text-gray-700 font-bold mb-2">Price</label>
                                    <input type="number" id="price" name="price"
                                        class="form-input w-full rounded-md @error('price') border-red-500 @enderror"
                                        placeholder="Enter Price">
                                    @error('price')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label for="farmerid" class="block text-gray-700 font-bold mb-2">Farmer ID</label>
                                    <select id="farmerid" name="farmerid"
                                        class="form-select w-full rounded-md  @error('farmerid') border-red-500 @enderror">
                                        <option value="">Select Farmer ID</option>
                                        @foreach ($allFarmers as $crop)
                                            <option value={{ $crop->id }}>
                                                {{ $crop->SupplierName . ' - ' . $crop->id }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('farmerid')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label for="Location" class="block text-gray-700 font-bold mb-2">Location</label>
                                    <input type="text" id="Location" name="location"
                                        class="form-input w-full rounded-md  @error('location') border-red-500 @enderror"
                                        placeholder="Enter Location Name">
                                    @error('location')
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
                                    <label for="quantity" class="block text-gray-700 font-bold mb-2">Quantity</label>
                                    <input type="number" id="quantity" name="quantity"
                                        class="form-input w-full rounded-md  @error('quantity') border-red-500 @enderror"
                                        placeholder="Enter Quantity">
                                    @error('quantity')
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
