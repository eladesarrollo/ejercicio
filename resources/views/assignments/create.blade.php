@include('layout/header')

<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('assignments.store') }}" method="POST" autocomplete="off">
                    @method('POST')
                    @include('assignments._form')
                </form>
            </div>
        </div>
    </div>
</div>