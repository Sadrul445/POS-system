@extends('layouts.dashboard.master')
@push('css')
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatable-extension.css')}}">
@endpush
@includeIf('layouts.dashboard.partials.css')
@section('title', 'List of Employee')
@section('content')
    @component('components.breadcrumb')
        @slot('bredcrumb_title')
            Home
        @endslot
        <li class="breadcrumb-item">Employee</li>
        <li class="breadcrumb-item">List of Employee</li>
    @endcomponent
    <div class="container">
        <div class="row">
            <div class="col-sm-3">        
            </div>
            <div class="col-sm-7">
                <div class="card shadow-sm" style="border-radius: 2%">
                    <div class="card-body">
                        <div class="table table-responsive">
                            <div>
                                @if (session()->has('create'))
                                    <div class="alert alert-success">
                                        {{ session('create') }}
                                    </div>
                                @endif
                                @if (session()->has('update'))
                                    <div class="alert alert-success">
                                        {{ session('update') }}
                                    </div>
                                @endif
                                @if (session()->has('delete'))
                                    <div class="alert alert-danger">
                                        {{ session('delete') }}
                                    </div>
                                @endif
                            </div>
                            <table class="text-center display" id="basic-1">
                                <thead style="font-size:12px;text-align:center">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>NID Number</th>
                                        <th>Designation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size:12px;text-align:center">
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>
                                                <img class="shadow" style="border-radius:100%" src="{{ asset('storage/' . $employee->image) }}" alt="Employee Image"
                                                    width="64px" height="70px">
                                            </td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->nid }}</td>
                                            <td>{{ $employee->designation }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div>
                                                        <a href="{{ route('employee.singleView', ['id' => $employee->id]) }}"
                                                            class="btn btn-outline-primary">View</a>
                                                    </div>
                                                    <div style="margin-left:5px">
                                                        <form
                                                            action="{{ route('employee.destroy', ['id' => $employee->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="my-2">
                                <nav aria-label="...">
                                    <ul class="pagination justify-content-center">
                                        {{-- Previous Page Link --}}
                                        @if ($employees->onFirstPage())
                                            <li class="page-item px-6 disabled">
                                                <span class="page-link" tabindex="-1" aria-disabled="true">Previous</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $employees->previousPageUrl() }}" tabindex="-1" aria-disabled="false">Previous</a>
                                            </li>
                                        @endif
                                        
                                        {{-- Pagination Links --}}
                                        @for ($i = 1; $i <= $employees->lastPage(); $i++)
                                            <li class="page-item {{ $employees->currentPage() === $i ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $employees->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        
                                        {{-- Next Page Link --}}
                                        @if ($employees->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $employees->nextPageUrl() }}">Next</a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <span class="page-link">Next</span>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
            </div>
        </div>
    </div>
    {{-- @push('scripts')
        <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    @endpush --}}
@endsection