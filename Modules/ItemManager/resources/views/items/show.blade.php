@extends('layouts.master')

@section('content')

<div class="card h-full">
    <div class="card-header flex justify-between items-center">
        <h4 class="card-title">Items</h4>
        <a class="btn bg-blue-500 text-white hover:bg-blue-600" href="{{ route('items.create')}}">
            Create
        </a>
    </div><!--end card-header-->
    <div class="card-body">
        <div class="relative overflow-x-auto sm:rounded">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-slate-700 dark:text-gray-300">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Color
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-slate-700 hover:bg-gray-50 dark:hover:bg-slate-900/20">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">
                            Sliver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 text-lg me-4"><i class="ti ti-pencil "></i></a>
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 text-lg text-red-600"><i class="ti ti-trash"></i></a>
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-slate-700 hover:bg-gray-50 dark:hover:bg-slate-900/20">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Microsoft Surface Pro
                        </th>
                        <td class="px-6 py-4">
                            White
                        </td>
                        <td class="px-6 py-4">
                            Laptop PC
                        </td>
                        <td class="px-6 py-4">
                            $1999
                        </td>
                        <td class="px-6 py-4 ">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 text-lg me-4"><i class="ti ti-pencil "></i></a>
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 text-lg text-red-600"><i class="ti ti-trash"></i></a>
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-slate-900/20">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Magic Mouse 2
                        </th>
                        <td class="px-6 py-4">
                            Black
                        </td>
                        <td class="px-6 py-4">
                            Accessories
                        </td>
                        <td class="px-6 py-4">
                            $99
                        </td>
                        <td class="px-6 py-4 ">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 text-lg me-4"><i class="ti ti-pencil "></i></a>
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 text-lg text-red-600"><i class="ti ti-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><!--end card-body-->
</div> <!--end card-->


@endsection