@extends('dashboard')

@section('dashboard-content')
    <h1 class="text-2xl font-semibold mb-4">Edit Supplier</h1>

    <form method="POST" action="{{ route('admin.suppliers.update', $supplier) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1">Company Name</label>
            <input type="text" name="company_name" class="w-full border rounded px-3 py-2"
                   value="{{ $supplier->company_name }}" required>
        </div>

        <div>
            <label class="block mb-1">Address</label>
            <input type="text" name="address" class="w-full border rounded px-3 py-2"
                   value="{{ $supplier->address }}">
        </div>

        <div>
            <label class="block mb-1">Contact Name</label>
            <input type="text" name="contact_name" class="w-full border rounded px-3 py-2"
                   value="{{ $supplier->contact_name }}" required>
        </div>

        <div>
            <label class="block mb-1">Contact Email</label>
            <input type="email" name="contact_email" class="w-full border rounded px-3 py-2"
                   value="{{ $supplier->contact_email }}" required>
        </div>

        <div>
            <label class="block mb-1">Phone</label>
            <input type="text" name="phone" class="w-full border rounded px-3 py-2"
                   value="{{ $supplier->phone }}">
        </div>

        <div>
            <label class="block mb-1">Next Delivery</label>
            <input type="datetime-local" name="next_delivery" class="w-full border rounded px-3 py-2"
                   value="{{ $supplier->next_delivery ? \Carbon\Carbon::parse($supplier->next_delivery)->format('Y-m-d\TH:i') : '' }}">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Update Supplier</button>
    </form>
@endsection
