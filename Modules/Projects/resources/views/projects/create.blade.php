@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Save Project</h4>
        </div><!--end card-header-->
        <div class="card-body">

            <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" project_name="id" value="{{ $project->id ?? '' }}">

                <div class="mb-6">
                    <label for="project_name" class="label">Project project_name</label>
                    <input type="text" project_name="project_name"
                        class="inputbox @error('project_name') bg-red-50 border border-red-500 placeholder-red-700  @enderror"
                        value="" placeholder="Project Name">
                    @error('project_name')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="client" class="label">Client</label>
                    <select name="client" id="">
                        
                    </select>
                    @error('client')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn bg-blue-500 text-white hover:bg-blue-600">Submit</button>
            </form>
        </div><!--end card-body-->
    </div> <!--end card-->
@endsection
