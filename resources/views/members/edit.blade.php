<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Επεξεργασία Μέλους
        </h2>   
    </x-slot>
    <div class="py-12">
        <div class="max-w-3x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('members.update', $member) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block mb-1">Όνομα *</label>
                        <input type="text" name="first_name" value="{{ $member->first_name }}" class="w-full border rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Επώνυμο *</label>
                        <input type="text" name="last_name" value="{{ $member->last_name }}" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-4">
    <label class="block mb-1">Τμήματα</label>

    <div class="border rounded p-3 space-y-2">
        @foreach ($departments as $department)
            <label class="flex items-center gap-2">
                <input
                    type="checkbox"
                    name="department_ids[]"
                    value="{{ $department->id }}"
                    @checked($member->departments->contains($department->id))
                >

                                <span>{{ $department->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">Τηλέφωνο</label>
                        <input type="text" name="phone" value="{{ $member->phone }}" class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Email</label>
                        <input type="email" name="email" value="{{ $member->email }}" class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Ημερομηνία γέννησης</label>
                        <input type="date" name="birth_date" value="{{ $member->birth_date }}" class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Διεύθυνση</label>
                        <input type="text" name="address" value="{{ $member->address }}" class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Κατάσταση</label>
                        <select name="status" class="w-full border rounded p-2">
                            <option value="active" @selected($member->status === 'active')>Ενεργό</option>
                            <option value="inactive" @selected($member->status === 'inactive')>Ανενεργό</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Σημειώσεις</label>
                        <textarea name="notes" class="w-full border rounded p-2">{{ $member->notes }}</textarea>
                    </div>

                    <div class="flex items-center gap-3 mt-6">
                        <button type="submit" style="background-color: #2563eb; color: white; padding: 10px 16px; border-radius: 6px;">
                            Αποθήκευση αλλαγών
                        </button>

                        <a href="{{ route('members.index') }}" class="text-blue-600 underline">
                            Πίσω
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>    