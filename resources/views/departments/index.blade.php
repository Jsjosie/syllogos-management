<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Τμήματα Συλλόγου
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('success'))
                        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold">Λίστα Τμημάτων</h3>

                        <a href="{{ route('departments.create') }}"
                           class="px-4 py-2 bg-blue-600 text-white rounded">
                            + Νέο Τμήμα
                        </a>
                    </div>

                    <table class="w-full border-collapse border">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-2 text-left">Όνομα</th>
                                <th class="border p-2 text-left">Περιγραφή</th>
                                <th class="border p-2 text-left">Ενέργειες</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($departments as $department)
                                <tr>
                                    <td class="border p-2">{{ $department->name }}</td>
                                    <td class="border p-2">{{ $department->description }}</td>
                                    <td class="border p-2">
                                        <a href="{{ route('departments.edit', $department) }}" class="text-blue-600 underline">
                                            Επεξεργασία
                                        </a>

                                        <form method="POST" action="{{ route('departments.destroy', $department) }}" class="inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    onclick="return confirm('Σίγουρα θέλεις να διαγράψεις αυτό το τμήμα;')"
                                                    class="text-red-600 underline ml-3">
                                                Διαγραφή
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="border p-4 text-center text-gray-500">
                                        Δεν υπάρχουν τμήματα ακόμα.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $departments->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>