<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Νέο Μέλος
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('members.store') }}">
    @csrf

    <div class="mb-4">
        <label class="block mb-1">Όνομα *</label>
        <input type="text" name="first_name" class="w-full border rounded p-2" required>
    </div>

    <div class="mb-4">
        <label class="block mb-1">Επώνυμο *</label>
        <input type="text" name="last_name" class="w-full border rounded p-2" required>
    </div>

    <div class="mb-4">
        <label class="block mb-1">Τηλέφωνο</label>
        <input type="text" name="phone" class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1">Email</label>
        <input type="email" name="email" class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1">Ημερομηνία γέννησης</label>
        <input type="date" name="birth_date" class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1">Διεύθυνση</label>
        <input type="text" name="address" class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1">Κατάσταση</label>
        <select name="status" class="w-full border rounded p-2">
            <option value="active">Ενεργό</option>
            <option value="inactive">Ανενεργό</option>
        </select>
    </div>

    <div class="mb-4">
        <label class="block mb-1">Σημειώσεις</label>
        <textarea name="notes" class="w-full border rounded p-2"></textarea>
    </div>

    <div class="flex items-center gap-3 mt-6">
    <button type="submit" style="background-color: #2563eb; color: white; padding: 10px 16px; border-radius: 6px;">
        Αποθήκευση
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