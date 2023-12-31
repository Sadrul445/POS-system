@extends('layouts.dashboard.master')
@push('css')
@endpush
@includeIf('layouts.dashboard.partials.css')
@section('title', 'Create Employee')
@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Employee</li>
        <li class="breadcrumb-item">Create</li>
    @endcomponent
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card shadow-sm" style="border-radius: 2%">
                    <div class="card-body">
                        <form action="{{ route('employee.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="d-flex row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="image" :value="__('Image')" />
                                    <x-text-input class="form-control" id="image" type="file"
                                        name="image" />
                                </div>
                                <div class="col">
                                    <x-input-label class="form-label" for="name" :value="__('Name')" />
                                    <x-text-input class="form-control" id="name" type="text"
                                        placeholder="Enter your name here..." name="name" />
                                </div>
                            </div>
                            <div class="d-flex row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="nid" :value="__('National Id Card (NID)')" />
                                    <x-text-input class="form-control" id="nid" type="number"
                                        placeholder="Enter your nid here..." name="nid" />
                                </div>
                                <div class="col">
                                    <x-input-label class="form-label" for="designation" :value="__('Designation')" />
                                    <x-text-input class="form-control" id="designation" type="text"
                                        placeholder="Enter your designation here..." name="designation" />
                                </div>
                            </div>
                            <div class="d-flex row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="experience" :value="__('Experience (Yearly)')" />
                                    <x-text-input class="form-control" id="experience" type="number"
                                        placeholder="Enter your experience here..." name="experience" />
                                </div>
                                <div class="col">
                                    <x-input-label class="form-label" for="address" :value="__('Address')" />
                                    <textarea class="form-control" id="address" placeholder="Enter your address here..." name="address"></textarea>
                                </div>
                            </div>
                            <div class="d-flex row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="phone" :value="__('Phone Number')" />
                                    <x-text-input class="form-control" id="phone" type="tel"
                                        placeholder="Enter your phone number here..." name="phone" />
                                </div>
                                <div class="col">
                                    <x-input-label class="form-label" for="city" :value="__('City')" />
                                    <x-text-input class="form-control" id="city" type="text"
                                        placeholder="Enter your city here..." name="city"/>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <x-input-label class="form-label" for="salary" :value="__('Salary (BDT)')" />
                                    <x-text-input class="form-control" id="salary" type="number"
                                        placeholder="Enter your salary here..." name="salary" />
                                </div>
                                <div class="col">
                                    <x-input-label class="form-label" for="vacation" :value="__('Vacation (Days)')" />
                                    <x-text-input class="form-control" id="vacation" type="number"
                                        placeholder="Enter your vacation here..." name="vacation" />
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <x-primary-button href="#" class="btn btn-primary">Save</x-primary-button>
                                    <x-secondary-button href="#" class="btn btn-secondary">Cancel
                                    </x-secondary-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection
@push('scripts')
    {{-- <script>
        //FroalaEditor
        var editor = new FroalaEditor('#about', {
            pluginsEnable: ['insertUnorderedList', 'fullscreen', 'bold', 'italic', 'underline', 'strikeThrough',
                'subscript', 'superscript', 'fontFamily', 'fontSize', 'color', 'align', 'outdent', 'indent',
                'quote', 'insertLink',
                'insertImage', 'insertTable', 'insertHR', 'undo', 'redo'
            ],
            height: '100px',
        });
    </script> --}}
@endpush
