@extends('layouts.dashboard.master')
@push('css')
@endpush
@includeIf('layouts.dashboard.partials.css')
@section('title', 'Update Employee')

@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Settings</li>
        <li class="breadcrumb-item">Employee</li>
        <li class="breadcrumb-item">Update</li>
    @endcomponent
    <div class="container w-50">
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow-sm" style="border-radius: 2%">
                    <div class="card-body">
                        <h5 class="mb-4">Update Employee</h5>
                        <form action="{{ route('employee.update', ['id' => $employee->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="image" :value="__('Image')" />
                                    <x-text-input class="form-control" id="image" type="file" name="image" />
                                    @if ($employee->image)
                                        <img class="mt-4 shadow bg-body rounded"
                                            src="{{ asset('storage/' . $employee->image) }}" alt="Employee Image"
                                            width="30%">
                                    @endif
                                </div>
                                <div class="col">
                                    <x-input-label class="form-label" for="name" :value="__('Name')" />
                                    <x-text-input class="form-control" id="name" type="text"
                                        value="{{ $employee->name }}" name="name" />
                                </div>
                            </div>
                            <div class="d-flex row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="nid" :value="__('National Id Card (NID)')" />
                                    <x-text-input class="form-control" id="nid" type="number"
                                        value="{{ $employee->nid }}" name="nid" />
                                </div>
                                <div class="col">
                                    <x-input-label class="form-label" for="designation" :value="__('Designation')" />
                                    <x-text-input class="form-control" id="designation" type="text"
                                        value="{{ $employee->designation }}" name="designation" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="experience" :value="__('Experience (Yearly)')" />
                                    <x-text-input class="form-control" id="experience" type="number"
                                        value="{{ $employee->experience }}" name="experience" />
                                </div>
                                <div class="col">
                                    <x-input-label class="form-label" for="address" :value="__('Address')" />
                                    <textarea class="form-control" id="address" name="address">{{ $employee->address }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="phone" :value="__('Phone Number')" />
                                    <x-text-input class="form-control" id="phone" type="tel"
                                        value="{{ $employee->phone }}" name="phone" />
                                </div>
                                <div class="col">
                                    <x-input-label class="form-label" for="city" :value="__('City')" />
                                    <x-text-input class="form-control" id="city" type="text"
                                        value="{{ $employee->city }}" name="city" />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="salary" :value="__('Salary (BDT)')" />
                                    <x-text-input class="form-control" id="salary" type="number"
                                        value="{{ $employee->salary }}" name="salary" />
                                </div>
                                <div class="col">
                                    <x-input-label class="form-label" for="vacation" :value="__('Vacation (Days)')" />
                                    <x-text-input class="form-control" id="vacation" type="number"
                                        value="{{ $employee->vacation }}" name="vacation" />
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @push('scripts')
    <script>
        //FroalaEditor
        var editor = new FroalaEditor('#about', {
            pluginsEnable: ['insertUnorderedList', 'fullscreen', 'bold', 'italic', 'underline', 'strikeThrough',
                'subscript', 'superscript', 'fontFamily', 'fontSize', 'color', 'align', 'outdent', 'indent',
                'quote', 'insertLink',
                'insertImage', 'insertTable', 'insertHR', 'undo', 'redo'
            ],
            height: '100px',
        });
    </script>
@endpush --}}
