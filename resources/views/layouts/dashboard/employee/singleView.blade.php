@extends('layouts.dashboard.master')
@push('css')
@endpush
@includeIf('layouts.dashboard.partials.css')
@section('title', 'List of Employee')
@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Employee</li>
        <li class="breadcrumb-item">View of Employee </li>
    @endcomponent
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <div class="card shadow-sm" style="border-radius: 2%;border:none;top:1%;">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <p>#{{ $employee->id }}</p>
                                <h6 class="ml-4">{{ $employee->name }}</h6>
                                @if ($employee->image)
                                    <img class="my-4 mx-4 shadow bg-body rounded"
                                        src="{{ asset('storage/' . $employee->image) }}" alt="Employee Image"
                                        width="80%">
                                @endif
                            </div>
                            <div class="col-sm-6 shadow-sm p-4"
                                style="background: #e2f0e0af;border-radius:1%;position: relative;">
                                <span style="position: absolute; top: 0; right: 0; margin:10px"><a href="{{ route('employee.edit',['id'=>$employee->id]) }}"
                                        class="btn btn-success">Edit</a></span>
                                <div class="mt-4 pt-2">
                                    <x-input-label class="form-label fw-bold" for="nid" :value="__('National Id Card (NID)')" />
                                    <p>{{ $employee->nid }}</p>
                                    <x-input-label class="form-label fw-bold" for="designation" :value="__('Designation')" />
                                    <p>{{ $employee->designation }}</p>
                                    <x-input-label class="form-label fw-bold" for="experience" :value="__('Experience (Yearly)')" />
                                    <p>{{ $employee->experience }}</p>
                                    <x-input-label class="form-label fw-bold" for="address" :value="__('Address')" />
                                    <p>{{ $employee->address }}</p>
                                    <x-input-label class="form-label fw-bold" for="phone" :value="__('Phone Number')" />
                                    <p>{{ $employee->phone }}</p>
                                    <x-input-label class="form-label fw-bold" for="city" :value="__('City')" />
                                    <p>{{ $employee->city }}</p>
                                    <x-input-label class="form-label fw-bold" for="salary" :value="__('Salary (BDT)')" />
                                    <p>{{ $employee->salary }}</p>
                                    <x-input-label class="form-label fw-bold" for="vacation" :value="__('Vacation (Days)')" />
                                    <p>{{ $employee->vacation }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">

            </div>
        </div>
    </div>
@endsection
