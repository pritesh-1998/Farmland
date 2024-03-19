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
                        <div id="layoutAuthentication">
                            <div id="layoutAuthentication_content">
                                <div class="container mx-auto sm:px-4">
                                    <div class="flex flex-wrap  justify-center">
                                        <div class="lg:w-3/5 pr-4 pl-4">
                                            <div
                                                class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300 shadow-lg border-0 rounded-lg mt-5">
                                                <div
                                                    class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">
                                                    <h3 class="text-center font-weight-light my-4">Create a Farm</h3>
                                                </div>
                                                <div class="flex-auto p-6">
                                                    <form method="post" action="{{ route('farm.store') }}">
                                                        @csrf
                                                        <div class="flex flex-wrap  mb-3">
                                                            <div class="md:w-1/2 pr-4 pl-4">
                                                                <div class="form-floating mb-3 md:mb-0">
                                                                    <input required
                                                                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                                                        id="inputFirstName" type="text"
                                                                        placeholder="Enter your farm name"
                                                                        name="name" />
                                                                    <label for="inputFirstName">Farm name</label>
                                                                </div>
                                                            </div>
                                                            <div class="md:w-1/2 pr-4 pl-4">
                                                                <div class="form-floating mb-3 md:mb-0">
                                                                    <input required
                                                                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                                                        id="inputdate" type="date"
                                                                        placeholder="Enter the date"
                                                                        name="created_on" />
                                                                    <label for="inputdate">created</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex flex-wrap  mb-3">
                                                            <div class="md:w-1/2 pr-4 pl-4">
                                                                <div class="form-floating mb-3 md:mb-0">
                                                                    <input required
                                                                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                                                        id="inputFirstName" type="number"
                                                                        placeholder="Enter your farm size"
                                                                        name="size" />
                                                                    <label for="inputFirstName">Farm size (Acres)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="md:w-1/2 pr-4 pl-4">
                                                                <div class="form-floating mb-3 md:mb-0">
                                                                    <input required
                                                                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                                                        id="inputDuration" type="string"
                                                                        placeholder="State the duration"
                                                                        name="location" />
                                                                    <label for="inputDuration">location</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input required
                                                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                                                id="inputDescription" type="text"
                                                                placeholder="write a brief something about the crop"
                                                                name="description" />
                                                            <label for="inputDescription">Description</label>
                                                        </div>
                                                        <div class="mt-4 mb-0">
                                                            <div class="d-grid"><button type="submit"
                                                                    class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600 block w-full"
                                                                    href="{{ route('farm.store') }}">Create
                                                                    farm</button></div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div
                                                    class="py-3 px-6 bg-gray-200 border-t-1 border-gray-300 text-center py-3">
                                                    <div class="text-xs"><a href="{{ route('farm.index') }}">Want to see
                                                            your farms?</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </main>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</x-app-layout>
