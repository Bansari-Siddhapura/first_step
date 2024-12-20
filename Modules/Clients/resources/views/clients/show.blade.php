@extends('layouts.master')

@section('content')
    <div class="card h-full">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">Items</h4>
            <a class="btn bg-blue-500 text-white hover:bg-blue-600" href="{{ route('clients.create') }}">
                Create
            </a>
        </div><!--end card-header-->
        <div class="card-body">
            <div class="relative overflow-x-auto sm:rounded">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-slate-700 dark:text-gray-300">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                City
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Projects
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-slate-700 hover:bg-gray-50 dark:hover:bg-slate-900/20">
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $client->id }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $client->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $client->city }}
                                </td>
                              
                                <td class="px-6 py-4">

                                    @foreach($client->projects as $projects)
                                            {{' | ' .$projects->project_name . ' | '}}
                                    @endforeach
                            
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('clients.create', ['id' => $client->id]) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 text-lg"><i
                                            class="ti ti-pencil "></i></a>
                                    <a href="{{ route('clients.destroy', ['id' => $client->id]) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 text-lg text-red-600"
                                        name="delete"><i class="ti ti-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- pagination -->
                {{-- <div class="my-3">
                    {{ $clients->links() }}
                </div> --}}
            </div>
        </div><!--end card-body-->
    </div> <!--end card-->
@endsection
