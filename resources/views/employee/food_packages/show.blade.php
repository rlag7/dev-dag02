@extends('dashboard')

@section('dashboard-content')
    <h1 class="text-2xl font-semibold mb-4">Food Package Details</h1>

    <div class="space-y-2 bg-white p-6 rounded shadow">
        <div><strong>Customer:</strong> {{ $foodPackage->customer->person->name ?? '-' }}</div>
        <div><strong>Composition Date:</strong> {{ $foodPackage->composition_date }}</div>
        <div><strong>Distribution Date:</strong> {{ $foodPackage->distribution_date ?? 'Pending' }}</div>
    </div>

    <a href="{{ route('employee.food_packages.edit', $foodPackage) }}"
       class="mt-4 inline-block text-blue-600 hover:underline">Edit Package</a>
@endsection
