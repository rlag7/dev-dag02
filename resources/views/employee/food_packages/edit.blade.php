@extends('dashboard')

@section('dashboard-content')
    <h1 class="text-2xl font-semibold mb-4">Edit Food Package</h1>

    <form method="POST" action="{{ route('employee.food_packages.update', $foodPackage) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1">Select Customer</label>
            <select name="customer_id" class="w-full border rounded px-3 py-2" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}"
                        {{ $foodPackage->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->person->name }} (ID {{ $customer->id }})
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Composition Date</label>
            <input type="date" name="composition_date" value="{{ $foodPackage->composition_date }}"
                   class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block mb-1">Distribution Date</label>
            <input type="date" name="distribution_date"
                   value="{{ $foodPackage->distribution_date }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Update Package</button>
    </form>
@endsection
