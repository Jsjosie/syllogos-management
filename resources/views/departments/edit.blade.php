<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Επεξεργασία Τμήματος
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('departments.update', $department) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block mb-1">Όνομα τμήματος *</label>
                            <input
                                type="text"
                                name="name"
                                value="{{ $department->name }}"
                                class="w-full border rounded p-2"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1">Περιγραφή</label>
                            <textarea
                                name="description"
                                class="w-full border rounded p-2"
                                rows="4"
                            >{{ $department->description }}</textarea>
                        </div>

                        <div class="flex items-center gap-3 mt-6">
                            <button type="submit"
                                    style="background-color: #2563eb; color: white; padding: 10px 16px; border-radius: 6px;">
                                Αποθήκευση αλλαγών
                            </button>

                            <a href="{{ route('departments.index') }}" class="text-blue-600 underline">
                                Πίσω
                            </a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>