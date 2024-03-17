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
                        <div class="container mx-auto px-4">
                            <h1 class="mt-4 text-2xl"><i class="fas fa-coins px-1"></i> Farm Leases</h1>
                            <ul class="flex items-center mt-4 border-b border-gray-200">
                                <li class="mr-6">
                                    <a class="text-gray-600 hover:text-gray-800" href="{{ route('lease.index') }}">
                                        <i class="fas fa-coins px-1"></i>Farm Leases
                                    </a>
                                </li>
                            </ul>
                            <div class="mt-4 flex flex-wrap">
                                <div class="w-full md:w-1/2 lg:w-1/4">
                                    <div class="card bg-gray-900 text-white mb-4">
                                        <div class="card-body">
                                            <a class="text-white" href="{{ route('lease.create') }}">Add Lease</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                </div>
                                <div class="card-body">
                                    <table class="w-full table-fixed" id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th class="w-1/6"><i class="fas fa-pen me-1"></i>farm</th>
                                                <th class="w-1/6"><i class="fas fa-calendar-check me-1"></i>date from
                                                </th>
                                                <th class="w-1/6"><i class="fas fa-calendar-times me-1"></i>date to
                                                </th>
                                                <th class="w-1/6"><i class="fas fa-smile me-1"></i>farmer name</th>
                                                <th class="w-1/6"><i class="fas fa-phone me-1"></i>farmer phone</th>
                                                <th class="w-1/6"><i class="fas fa-coins me-1"></i>price</th>
                                                <th class="w-1/6" colspan="3"><i
                                                        class="fas fa-hammer me-1"></i>Actions</th>
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
                                            @foreach ($farm_leases as $farm_lease)
                                                <tr>
                                                    <td>{{ $farm_lease->parent->name ?? '' }}</td>
                                                    <td>{{ $farm_lease->date_from }}</td>
                                                    <td>{{ $farm_lease->date_to }}</td>
                                                    <td>{{ $farm_lease->farmer_name }}</td>
                                                    <td>{{ $farm_lease->farmer_phone }}</td>
                                                    <td>{{ $farm_lease->price }}</td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('lease.edit', $farm_lease) }}"><i
                                                                class="fas fa-edit"></i>Edit</a>
                                                    </td>
                                                    <td>
                                                        <form method="post"
                                                            action="{{ route('lease.destroy', ['lease' => $farm_lease->id]) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                onclick="return confirm('Are you sure?')"
                                                                class="btn btn-danger"><i
                                                                    class="fas fa-trash"></i>delete</button>
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
