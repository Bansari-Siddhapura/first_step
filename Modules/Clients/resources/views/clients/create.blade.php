@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Save Client</h4>
        </div><!--end card-header-->
        <div class="card-body">

            <form action="{{ route('clients.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $client->id ?? '' }}">
 
                <div class="mb-6">
                    <label for="name" class="label">Name</label>
                    <input type="text" name="name"
                        class="inputbox @error('name') bg-red-50 border border-red-500 placeholder-red-700  @enderror"
                        value="{{ old('name', $client->name?? '') }}" placeholder="Client Name">
                    @error('name')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-6">
                    <label for="city" class="label">City</label>
                    <input type="text" name="city"
                        class="inputbox @error('city') bg-red-50 border border-red-500 placeholder-red-700  @enderror"
                        value="{{ old('city', $client->city ?? '') }}"
                        placeholder="Client City">
                    @error('city')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
            
                <button type="submit" class="btn bg-blue-500 text-white hover:bg-blue-600">Submit</button>
            </form>
        </div><!--end card-body-->
    </div> <!--end card-->
@endsection
