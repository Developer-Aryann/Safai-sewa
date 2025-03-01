@extends('layout.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}">
@endpush

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Services</h4>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#addcustomer" class="btn btn-primary">
                            <i class="fa fa-plus me-2"></i>Add Services</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th class="text-center">Rate</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($types as $key => $type)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <span class="m-3"> {{ $type->name }} </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="m-3"> ₹ {{ $type->price }} </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-{{ $type->status == 1 ? 'success' : 'danger' }}">{{ $type->status == 1 ? 'Active' : 'Inactive' }}</span>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addcustomer_{{ $type->id }}">Edit</button>
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletecustomer_{{ $type->id }}">Delete</button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="addcustomer_{{ $type->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Add Services </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('service.update') }}" method="post" class="need-validation">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $type->id }}">
                                                            <div class="row g-1 align-items-center">
                                                                <div class="form-group">
                                                                    <label><strong>Name </strong><small class="text-danger">*</small></label>
                                                                    <input type="text" class="form-control" placeholder="Dry Wash" name="name" required  value="{{ old('name', $type->name) }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label><strong>Rate </strong></label>
                                                                    <input type="text" class="form-control" placeholder="100" name="rate" value="{{ old('rate', $type->price) }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label><strong>Status </strong></label>
                                                                    <select class="form-select" name="status" required>
                                                                        <option value="1">Active</option>
                                                                        <option value="0">Inactive</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                        
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-sm  btn-primary">Save </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="deletecustomer_{{ $type->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Service</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Are You sure to delete?</div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <form action="{{ route('service.delete') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $type->id }}">
                                                            <button type="submit" class="btn btn-danger light">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th class="text-center">Rate</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Model Add customer --}}
        <div class="modal fade" id="addcustomer">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Services </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('service.create') }}" method="post" class="need-validation">
                            @csrf
                            <div class="row g-1 align-items-center">
                                <div class="form-group">
                                    <label><strong>Name </strong><small class="text-danger">*</small></label>
                                    <input type="text" class="form-control" placeholder="Dry Wash" name="name" required  value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label><strong>Rate </strong></label>
                                    <input type="text" class="form-control" placeholder="100" name="rate" value="{{ old('rate') }}">
                                </div>
                                <div class="form-group">
                                    <label><strong>Status </strong></label>
                                    <select class="form-select" name="status" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-sm  btn-primary">Save </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                createdRow: function(row, data, index) {
                    $(row).addClass('selected')
                },
                language: {
                    paginate: {
                        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                    }
                },
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });
        });
    </script>
@endpush
