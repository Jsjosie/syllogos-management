<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Μέλη Συλλόγου
        </h2>
    </x-slot>
     
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                @if (session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="w-full border-collapse border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2 text-left">Όνομα</th>
                            <th class="border p-2 text-left">Επώνυμο</th>
                            <th class="border p-2 text-left">Τηλέφωνο</th>
                            <th class="border p-2 text-left">Email</th>
                            <th class="border p-2 text-left">Κατάσταση</th>
                            <th class="border p-2 text-left">Ενέργειες</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($members as $member)
                            <tr>
                                <td class="border p-2">{{ $member->first_name }}</td>
                                <td class="border p-2">{{ $member->last_name }}</td>
                                <td class="border p-2">{{ $member->phone }}</td>
                                <td class="border p-2">{{ $member->email }}</td>
                                <td class="border p-2">{{ $member->status }}</td>
                                <td class="border p-2">
                                    <a href="{{ route('members.edit', $member) }}" class="text-blue-600 underline">
                                        Επεξεργασία
                                    </a>

                                    <form method="POST" action="{{ route('members.destroy', $member) }}" class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Σίγουρα θέλεις να διαγράψεις αυτό το μέλος;')"
                                                class="text-red-600 underline ml-3">
                                            Διαγραφή
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="border p-4 text-center text-gray-500">
                                    Δεν υπάρχουν μέλη ακόμα.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>        