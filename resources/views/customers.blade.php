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
                        <h4 class="card-title">Customer List</h4>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#addcustomer" class="btn btn-primary">
                            <i class="fa fa-plus me-2"></i>Add Customer</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Addresss</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $key => $customer)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->email ? $customer->email : '---' }}</td>
                                            <td>{{ $customer->address ? $customer->address : '---' }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addcustomer_{{ $customer->id }}">Edit</button>
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal_{{ $customer->id }}">Delete</button>
                                            </td>
                                        </tr>
                                        {{-- Edit model --}}
                                        <div class="modal fade" id="addcustomer_{{ $customer->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Update Coustomer Detail </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('customer.update') }}" method="post" class="need-validation">
                                                            @csrf
                                                            <input type="hidden" name="_userid" value="{{ $customer->id }}">
                                                            <div class="row g-1 align-items-center">
                                                                <div class="form-group">
                                                                    <label><strong>Name </strong><small class="text-danger">*</small></label>
                                                                    <input type="text" class="form-control " name="name" required  value="{{ old('name', $customer->name) }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label><strong>Phone Number </strong></label>
                                                                    <input type="number" class="form-control" name="number" minlength="10" value="{{ old('number', $customer->number) }}"
                                                                        maxlength="10">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label><strong>Email </strong></label>
                                                                    <input type="email" class="form-control" name="email" value="{{ old('email', $customer->email) }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label><strong>Tax Number </strong></label>
                                                                    <input type="text" class="form-control" name="taxnumber" value="{{ old('taxnumber', $customer->taxnumber) }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label><strong>Address </strong></label>
                                                                    <input type="text" class="form-control" name="address" value="{{ old('address', $customer->address) }}">
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

                                        {{-- Delete Modal --}}
                                        <div class="modal fade" id="basicModal_{{ $customer->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete User</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Are You sure to delete?</div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <form action="{{ route('customer.delete') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="_userid" value="{{ $customer->id }}">
                                                            <button type="submit"
                                                                class="btn btn-danger light">Delete</button>
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
                                        <th>Contact</th>
                                        <th>Addresss</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Model Add customer --}}
        @include('pos_model.customers')

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
