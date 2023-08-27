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
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
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
                            <table class="text-center display" id="data-source-1">
                                <thead style="font-size:12px;text-align:center">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>NID Number</th>
                                        <th>Designation</th>
                                        <th>Experience</th>
                                        <th>Address</th>
                                        <th>Salary</th>
                                        <th>Vacation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size:12px;text-align:center">
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/' . $employee->image) }}" alt="Employee Image"
                                                    width="70">
                                            </td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->nid }}</td>
                                            <td>{{ $employee->designation }}</td>
                                            <td>{{ $employee->experience }}</td>
                                            <td>
                                                <div class="collapse-content" id="collapseContent{{ $employee->id }}">
                                                {{ $employee->address }}
                                                </div>
                                            </td>
                                            <td>{{ $employee->salary }}</td>
                                            <td>{{ $employee->vacation }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div>
                                                        <a href="{{ route('employee.edit', ['id' => $employee->id]) }}"
                                                            class="btn btn-outline-primary">Edit</a>
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
                                                <span class="page-link" tabindex="-1" aria-disabled="true"><i class="icon-angle-double-left "></i>Previous</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $employees->previousPageUrl() }}" tabindex="-1" aria-disabled="false"><i class="icon-angle-double-left"></i>Previous</a>
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
                                                <a class="page-link" href="{{ $employees->nextPageUrl() }}">Next<i class="icon-angle-double-right"></i></a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <span class="page-link">Next<i class="icon-angle-double-right mt-4"></i></span>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    @endpush
@endsection