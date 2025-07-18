@extends('dashboard')

@section('dashboard-content')
    <h1 class="text-2xl font-semibold mb-4">All Suppliers</h1>

    @if (session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.suppliers.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-700 transition">
        + Create Supplier
    </a>

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-100">
        <tr>
            <th class="p-4 text-left">Company</th>
            <th class="p-4 text-left">Contact</th>
            <th class="p-4 text-left">Email</th>
            <th class="p-4 text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($suppliers as $supplier)
            <tr class="border-t hover:bg-gray-50">
                <td class="p-4">{{ $supplier->company_name }}</td>
                <td class="p-4">{{ $supplier->contact_name }}</td>
                <td class="p-4">{{ $supplier->contact_email }}</td>
                <td class="p-4 flex justify-center space-x-2">
                    <a href="{{ route('admin.suppliers.show', $supplier) }}" class="text-gray-600 hover:text-black">View</a>
                    <a href="{{ route('admin.suppliers.edit', $supplier) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('admin.suppliers.destroy', $supplier) }}"
                          onsubmit="return confirm('Are you sure?')" class="inline-block">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
