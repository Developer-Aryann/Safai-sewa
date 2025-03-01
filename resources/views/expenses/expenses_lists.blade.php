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
                        <h4 class="card-title">Expenses List</h4>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_expenses">Add
                            Expenses</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Towards</th>
                                        <th>Tax Included</th>
                                        <th>Payment Mode</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expenses as $expense)
                                        <tr>
                                            <td>{{ $expense->date }}</td>
                                            <td>₹{{ $expense->amount }}</td>
                                            <td>{{ $expense->category->name }}</td>
                                            <td>
                                                <span
                                                    class="badge badge-{{ $expense->tax_included ? 'success' : 'danger' }}">{{ $expense->tax_included ? 'Yes' : 'No' }}</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge badge-{{ $expense->payment_mode == 1 ? 'info' : 'warning' }}">{{ $expense->payment_mode == 1 ? 'Cash' : 'Online' }}</span>
                                            </td>
                                            <td>
                                                {{-- <button class="btn btn-primary"><i class="fa fa-eye"></i></button> --}}
                                                <button class="btn btn-danger" data-bs-target="#basicModal_{{ $expense->id }}" data-bs-toggle="modal"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>

                                        {{-- Delete Modal --}}
                                        <div class="modal fade" id="basicModal_{{ $expense->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Coupon</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Are You sure to delete?</div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <form action="{{ route('expenses.delete') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $expense->id }}">
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
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Towards</th>
                                        <th>Tax Included</th>
                                        <th>Payment Mode</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Expenses Modal -->
    <div class="modal fade" id="add_expenses">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Expenses</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('expenses.create') }}" method="post" class="need-validation">
                        @csrf
                        <div class="row g-1 align-items-center">
                            <div class="form-group">
                                <label><strong>Buy Date </strong></label>
                                <input type="date" class="form-control" name="date" required
                                    value="{{ now()->format('Y-m-d') }}">
                            </div>
                            <div class="form-group">
                                <label><strong>Expenses Amount </strong></label>
                                <input type="number" class="form-control" name="amount" min="10"
                                    value="{{ old('amount') }}" placeholder="10">
                            </div>
                            <div class="form-group">
                                <label><strong>Expenses Towards </strong></label>
                                <select name="towards" id="" class="form-control">
                                    <option value="0" disabled selected>Select</option>
                                    @foreach ($cateogries as $key => $cateogry)
                                        <option value="{{ $cateogry->id }}">{{ $cateogry->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label><strong>Payment Mode </strong></label>
                                <select name="payment_mode" id="payment_mode" class="form-control">
                                    <option value="cash">Cash</option>
                                    <option value="online">Online</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label><strong>Tax Included </strong></label>
                                <select name="tax_included" id="tax_included" class="form-control">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm  btn-primary">Save </button>
                        </div>
                    </form>
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
