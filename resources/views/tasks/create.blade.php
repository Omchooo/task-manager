@extends('layouts.app')

@section('content')

<div class="flex items-center my-4">
    <div class="w-full max-w-[550px]">
        <form id="add-task-form" action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="">
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Add Task
                        </label>
                        <input type="text" name="name" id="name" placeholder="Task Name"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            required />
                    </div>
                </div>

                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="priority" class="mb-3 block text-base font-medium text-[#07074D]">
                            Set Priority
                        </label>
                        <input type="text" name="priority" id="priority" placeholder="Set Priority"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            required />
                    </div>
                </div>

                <div class=" mx-3">
                    <button
                        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                        Submit
                    </button>
                </div>
        </form>
    </div>
</div>

@endsection
