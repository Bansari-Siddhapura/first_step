@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Save Project</h4>
        </div><!--end card-header-->
        <div class="card-body">

            <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $project->id ?? '' }}">

                <div class="mb-6">
                    <label for="project_name" class="label">Project Name</label>
                    <input type="text" name="project_name"
                        class="inputbox @error('project_name') bg-red-50 border border-red-500 placeholder-red-700  @enderror"
                        value="{{old('project_name', $project->project_name ?? '')}}" placeholder="Project Name">
                    @error('project_name')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label for="client_id" class="label">Select Client</label>
                    <select name="client_id" class="inputbox">
                        <option value="" selected disabled>select client</option>
                        @foreach($clients as $client)
                        {{-- {{$client_select = $project->id ? $client->id == $project->client_id : false }} --}}
                            <option value="{{$client->id}}"  @if(isset($project->id) && $project->client_id == $client->id)
                                selected
                            @endif>{{$client->name}}</option>
                        @endforeach
                    </select>
                    @error('client_id')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn bg-blue-500 text-white hover:bg-blue-600">Submit</button>
            </form>
        </div><!--end card-body-->
    </div> <!--end card-->
@endsection
