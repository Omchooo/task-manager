@extends('layouts.app')

@section('content')
    <div class="w-full mb-2">
        <div class="my-1 mx-3">
            <a href={{ route('tasks.create') }}
                class="hover:shadow-form rounded-md bg-[#6A64F1] py-2 px-6 text-center text-base font-semibold text-white outline-none">
                Add Task
            </a>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                <div class="inline-block min-w-full">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="bg-white border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        #
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Name
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Priority
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">

                                    </th>
                                </tr>
                            </thead>
                            <tbody class="container">
                                @foreach ($tasks as $task)
                                    <tr class="bg-gray-100 border-b" draggable="true" data-task-id="{{ $task->id }}">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 drag-handle">
                                            {{ $task->id }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $task->name }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $task->priority }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('tasks.edit', compact('task')) }}"
                                                class="rounded-md bg-blue-500 px-2 text-center text-base font-semibold text-white outline-none">Edit</a>
                                            <form action="{{ route('tasks.destroy', compact('task')) }}" method="POST"
                                                class=" hover:cursor-pointer">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="rounded-md bg-red-600 px-2 text-center text-base font-semibold text-white outline-none">Delete</button>
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
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('tbody').sortable({
                handle: '.drag-handle',
                update: function(event, ui) {
                    var newOrder = [];
                    $('tbody tr').each(function(index, row) {
                        var taskId = $(row).data('task-id');
                        newOrder.push(taskId);
                    });
                    console.log(newOrder);

                    $.ajax({
                        method: 'POST',
                        url: '/tasks/reorder',
                        data: {
                            newOrder: newOrder
                        },
                        success: function(response) {
                            console.log(newOrder);
                        },
                        error: function(xhr, status, error) {
                            console.log(newOrder);
                        }
                    });
                }
            });
        });
    </script>
@endpush
