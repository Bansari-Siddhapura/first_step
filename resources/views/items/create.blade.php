@extends('layouts.master')
@section('content')
<div class="container mx-auto px-2 min-h-[calc(100vh-138px)] mt-16">
    <div class="card h-full">
        <div class="card-header">
            <h4 class="card-title">Save Items</h4>
        </div><!--end card-header-->
        <div class="card-body">
            <form>
                <div class="grid xl:grid-cols-2 xl:gap-6">
                    <div class="relative z-0 mb-6 w-full group">
                        <label for="item_id" class="label">Item Id</label>
                        <input type="text" id="item_id" class="form-control" placeholder="Item Id">
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <label for="version" class="label">Version</label>
                        <input type="text" id="version" class="form-control" placeholder="Version">
                    </div>
                </div>
                <div class="mb-6">
                    <label for="item_name" class="label">Item Name</label>
                    <input type="text" id="item_name" class="form-control" placeholder="Item Name">
                </div>
                <div class="grid xl:grid-cols-2 xl:gap-6">
                    <div class="relative z-0 mb-6 w-full group">
                        <label for="category" class="label">Category</label>
                        <input type="text" id="category" class="form-control" placeholder="Category">
                    </div>
                    <div class="relative mb-6 w-full group">
                        <label for="color" class="label">Color</label>
                        <input class="form-control " value="#024" data-huebee />
                        <!-- <input type="color" class="form-control h-10"/> -->
                    </div>
                </div>
                <div class="mb-6">
                    <label for="image_thumbnail_link" class="label">Image Thumbnail Link</label>
                    <input type="text" id="image_thumbnail_link" class="form-control" placeholder="Image Thumbnail Link">
                </div>
                <div class="grid xl:grid-cols-2 xl:gap-6">
                    <div class="relative z-0 mb-6 w-full group">
                        <label class="custom-label block dark:text-slate-300">
                            <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 rounded w-4 h-4  inline-block leading-4 text-center -mb-[3px]">
                                <input type="checkbox" class="hidden">
                                <i class="fas fa-check hidden text-xs text-purple-500"></i>
                            </div>
                            Make license check compulsory for downloading updates?
                        </label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <label class="custom-label block dark:text-slate-300">
                            <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 rounded w-4 h-4  inline-block leading-4 text-center -mb-[3px]">
                                <input type="checkbox" class="hidden">
                                <i class="fas fa-check hidden text-xs text-purple-500"></i>
                            </div>
                            Always serve the latest update file ?
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn bg-blue-500 text-white hover:bg-blue-600">Submit</button>
            </form>
        </div><!--end card-body-->
    </div> <!--end card-->
</div>
@endsection