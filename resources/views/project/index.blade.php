@extends('layout.master')

@push('plugin-styles')
<!-- Plugin css import here -->
@endpush

@section('content')
<div class="container py-6">
    <!-- Page Title Start -->
    <div class="flex items-center md:justify-between flex-wrap gap-2 ">
        <h4 class="text-default-900 text-lg font-medium mb-2">User Projects</h4>
    </div>
    <!-- Page Title End -->

    <!-- User Projects Table Start -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">User Name</th>
                    <th class="py-2 px-4 border-b">User Email</th>
                    <th class="py-2 px-4 border-b">User Phone</th>
                    <th class="py-2 px-4 border-b">Project Name</th>
                    <th class="py-2 px-4 border-b">Project Type</th>
                    <th class="py-2 px-4 border-b">Experience</th>
                    <th class="py-2 px-4 border-b">Description</th>
                    <th class="py-2 px-4 border-b">Attachments</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($userProjects as $userProject)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $userProject->user->name ?? '--' }}</td>
                        <td class="py-2 px-4 border-b">{{ $userProject->user->email ?? '--' }}</td>
                        <td class="py-2 px-4 border-b">{{ $userProject->user->phone_number ?? '--' }}</td>
                        <td class="py-2 px-4 border-b">{{ $userProject->project_name?? '--' }}</td>
                        <td class="py-2 px-4 border-b">{{ $userProject->projectType->title ?? '--'  }}</td>
                        <td class="py-2 px-4 border-b">{{ $userProject->experience->title  ?? '--'}}</td>
                        <td class="py-2 px-4 border-b">{{ $userProject->description  ?? '--'}}</td>
                        <td class="py-2 px-4 border-b">
                            @if($userProject->attachments->isNotEmpty())
                                <ul>
                                    @foreach($userProject->attachments as $attachment)
                                        <li>
                                            <a href="{{ asset($attachment->path) }}" target="_blank">{{ $attachment->filename }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                No attachments
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b">
                            {{-- <a href="{{ route('projects.show', $userProject->id) }}" class="btn btn-info">View</a> --}}
                            {{-- <a href="{{ route('projects.edit', $userProject->id) }}" class="btn btn-warning">Edit</a> --}}
                            <form action="{{ route('projects.destroy', $userProject->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">No projects found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- User Projects Table End -->

    <!-- Pagination Links Start -->
    <div class="mt-4">
        {{ $userProjects->links() }}
    </div>
    <!-- Pagination Links End -->
</div>
@endsection

@push('plugin-scripts')
<!-- Plugin js import here -->
@endpush

@push('custom-scripts')
<!-- Custom js here -->
@endpush
