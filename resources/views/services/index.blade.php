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
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img class=" img-fluid" width="60" height="60"
                                                    src="{{ $service->image }}" alt="image">
                                                <span class="m-3"> {{ $service->name }} </span>
                                            </td>
                                            <td class="text-center">
                                                @foreach ($service->relatedServices() as $addon)
                                                    <span class="badge badge-dark m-1">{{ $addon->name }}</span>
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="badge badge-{{ $service->status == 1 ? 'success' : 'danger' }}">{{ $service->status == 1 ? 'Active' : 'Inactive' }}</span>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-target="#editcustomer_{{ $service->id }}" data-bs-toggle="modal">Edit</button>
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editcustomer_{{ $service->id }}">Delete</button>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="editcustomer_{{ $service->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Update Coustomer Detail </h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('service.update') }}" method="post"
                                                            class="need-validation" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row g-1 align-items-center">
                                                                <div class="form-group">
                                                                    <label><strong> Service Name </strong></label>
                                                                    <input type="text" class="form-control "
                                                                        name="name" placeholder="Service Name" required
                                                                        value="{{ old('name', $service->name) }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label><strong>Service Images</strong><small>(optional)</small></label>
                                                                    <input type="file" class="form-control"
                                                                        name="image" accept="image/*" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label><strong>Services Include</strong></label>
                                                                    <select name="services[]" class="form-control"
                                                                        id="services_include" multiple required>
                                                                        <option value="" disabled selected>Select
                                                                            Services</option>
                                                                        @foreach ($types as $service)
                                                                            <option value="{{ $service->id }}">
                                                                                {{ $service->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label><strong>Status </strong></label>
                                                                    <select name="status" class="form-control" required>
                                                                        <option value="" disabled selected>Select
                                                                            Status</option>
                                                                        <option value="1" >Active</option>
                                                                        <option value="0">Inactive</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-sm  btn-primary">Save
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="basicModal_{{ $service->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Services</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Are You sure to delete?</div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <form action="{{ route('service.delete') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $service->id }}">
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
                                        <th class="text-center">Type</th>
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
                        <h5 class="modal-title">Add Service </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('service.create') }}" method="post" class="need-validation"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row g-1 align-items-center">
                                <div class="form-group">
                                    <label><strong> Service Name </strong></label>
                                    <input type="text" class="form-control " name="name"
                                        placeholder="Service Name" required value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label><strong>Service Images</strong></label>
                                    <input type="file" class="form-control" name="image" accept="image/*" required>
                                </div>
                                <div class="form-group">
                                    <label><strong>Services Include</strong></label>
                                    <select name="services[]" class="form-control" id="services_include" multiple
                                        required>
                                        <option value="" disabled selected>Select Services</option>
                                        @foreach ($types as $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Status </strong></label>
                                    <select name="status" class="form-control" required>
                                        <option value="" disabled selected>Select Status</option>
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
