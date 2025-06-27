@extends('dashboard')

@section('dashboard-content')
    <h1 class="text-2xl font-semibold mb-4">All Food Packages</h1>

    @if (session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    <a href="{{ route('employee.food_packages.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-700 transition">
        + Create Food Package
    </a>

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-100">
        <tr>
            <th class="p-4 text-left">Customer</th>
            <th class="p-4 text-left">Composed</th>
            <th class="p-4 text-left">Distributed</th>
            <th class="p-4 text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($packages as $package)
            <tr class="border-t hover:bg-gray-50">
                <td class="p-4">{{ $package->customer->person->name ?? 'Unknown' }}</td>
                <td class="p-4">{{ $package->composition_date }}</td>
                <td class="p-4">{{ $package->distribution_date ?? 'Pending' }}</td>
                <td class="p-4 flex justify-center space-x-2">
                    <a href="{{ route('employee.food_packages.show', $package) }}" class="text-gray-600 hover:text-black">View</a>
                    <a href="{{ route('employee.food_packages.edit', $package) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('employee.food_packages.destroy', $package) }}"
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
