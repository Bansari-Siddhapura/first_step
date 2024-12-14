@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Save Items</h4>
    </div><!--end card-header-->
    <div class="card-body">

        <form action="{{ route('items.store')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $editable->id ?? ''}}">
            <div class="grid xl:grid-cols-2 xl:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                    <label for="item_id" class="label">Item Id</label>
                    <input type="text" name="item_id" class="form-control @error('item_id') bg-red-50 border border-red-500 placeholder-red-700  @enderror"
                        value="{{ old('item_id',$editable->item_id ?? '')}}" placeholder="Item Id">
                    @error('item_id')
                    <div class="text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <label for="version" class="label">Version</label>
                    <input type="text" name="version" class="form-control @error('version') bg-red-50 border border-red-500 placeholder-red-700  @enderror"
                        value="{{ old('version',$editable->version ?? '')}}" placeholder="Version">
                    @error('version')
                    <div class="text-red-600">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label for="item_name" class="label">Item Name</label>
                <input type="text" name="item_name" class="form-control @error('item_name') bg-red-50 border border-red-500 placeholder-red-700  @enderror"
                    value="{{ old('item_name',$editable->item_name ?? '')}}" placeholder="Item Name">
                @error('item_name')
                <div class="text-red-600">{{$message}}</div>
                @enderror
            </div>
            <div class="grid xl:grid-cols-2 xl:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                    <label for="category" class="label">Category</label>
                    <input type="text" name="category" class="form-control @error('category') bg-red-50 border border-red-500 placeholder-red-700  @enderror"
                        value="{{ old('category',$editable->category ?? '')}}" placeholder="Category">
                    @error('category')
                    <div class="text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="relative mb-6 w-full group">
                    <label for="color" class="label">Color</label>
                    <input name="color" class="form-control @error('color') bg-red-50 border border-red-500 placeholder-red-700  @enderror"
                        value="{{ old('color' , $editable->color ?? '')}}" data-huebee />
                    @error('color')
                    <div class="text-red-600">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label for="image_thumbnail_link" class="label">Image Thumbnail Link</label>
                <input type="text" name="image_thumbnail_link" class="form-control @error('image_thumbnail_link') bg-red-50 border border-red-500 placeholder-red-700  @enderror"
                    value="{{ old('image_thumbnail_link',$editable->image_thumbnail_link ?? '') }}" placeholder="Image Thumbnail Link">
                @error('image_thumbnail_link')
                <div class="text-red-600">{{$message}}</div>
                @enderror
            </div>
            <div class="grid xl:grid-cols-2 xl:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                    <label class="custom-label block dark:text-slate-300">
                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 rounded w-4 h-4  inline-block leading-4 text-center -mb-[3px]">
                            <input type="checkbox" name="license_update" class="hidden" value="1" {{old('license_update',$editable->license_update ?? '') ? 'checked' : ''}}>
                            <i class="fas fa-check hidden text-xs "></i>
                        </div>
                        Make license check compulsory for downloading updates?
                    </label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <label class="custom-label block dark:text-slate-300">
                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 rounded w-4 h-4  inline-block leading-4 text-center -mb-[3px]">
                            <input type="checkbox" name="serve_latest_updates" class="hidden" value="1" {{ old('serve_latest_updates',$editable->serve_latest_updates ?? '') ? 'checked' : ''}}>
                            <i class="fas fa-check hidden text-xs"></i>
                        </div>
                        Always serve the latest update file ?
                    </label>
                </div>
            </div>
            <button type="submit" class="btn bg-blue-500 text-white hover:bg-blue-600">Submit</button>
        </form>
    </div><!--end card-body-->
</div> <!--end card-->

@endsection