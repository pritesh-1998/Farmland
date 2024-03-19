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
                        <div class="container mx-auto sm:px-4 max-w-full mx-auto sm:px-4 px-4">
                            <h1 class="mt-4"><i class="fas fa-tree"></i> Farm</h1>
                            <div class="flex flex-wrap  pt-3">
                                <div class="xl:w-1/4 pr-4 pl-4 md:w-1/2 pr-4 pl-4">
                                    <div
                                        class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300 bg-gray-900 text-white mb-4">
                                        <div class="flex-auto p-6"><a class="text-xs text-white stretched-link"
                                                href="{{ route('farm.create') }}">
                                            </a>Add farm</div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300 mb-4">
                                <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">
                                    <i class="fas fa-table me-1"></i>
                                </div>
                                <div class="flex-auto p-6">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th><i class="fas fa-pen me-1"></i>Name</th>
                                                <th><i class="fas fa-bookmark me-1"></i>Description</th>
                                                <th><i class="fas fa-crop me-1"></i>size (Acres)</th>
                                                <th><i class="fas fa-location me-1"></i>location</th>
                                                <th><i class="fas fa-calendar-check me-1"></i>created on</th>
                                                <th colspan="3"><i class="fas fa-hammer me-1"></i>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>size</th>
                                                <th>created on</th>
                                                <th>location</th>
                                                <th colspan="3">Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($farms as $farm)
                                                <tr>
                                                    <td>{{ $farm->name }}</td>
                                                    <td>{{ $farm->description }}</td>
                                                    <td>{{ $farm->size }}</td>
                                                    <td>{{ $farm->location }}</td>
                                                    <td>{{ $farm->created_on }}</td>
                                                    <td><a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600 "
                                                            href="{{ route('farm.edit', $farm) }}"><i
                                                                class="fas fa-edit"></i>Edit</a>
                                                    <td><a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-orange-400 text-black hover:bg-orange-500 "
                                                            href="{{ route('farm.show', $farm) }}">View More<i
                                                                class="fas fa-arrow-right lg:px-2"></i></a>
                                                    </td>
                                                    <td>
                                                        <form method="post"
                                                            action="{{ route('farm.destroy', $farm) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-600 text-white hover:bg-red-700 delete-confirm ">
                                                                <i class="fas fa-trash"></i>delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
