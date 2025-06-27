@extends('dashboard')

@section('dashboard-content')
    <h1 class="text-2xl font-semibold mb-4">Create New Supplier</h1>

    <form method="POST" action="{{ route('admin.suppliers.store') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1">Company Name</label>
            <input type="text" name="company_name" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block mb-1">Address</label>
            <input type="text" name="address" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block mb-1">Contact Name</label>
            <input type="text" name="contact_name" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block mb-1">Contact Email</label>
            <input type="email" name="contact_email" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block mb-1">Phone</label>
            <input type="text" name="phone" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block mb-1">Next Delivery Date</label>
            <input type="datetime-local" name="next_delivery" class="w-full border rounded px-3 py-2">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Create Supplier</button>
    </form>
@endsection
