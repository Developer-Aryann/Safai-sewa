@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Coupon List</h4>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#POS_coupon_model" class="btn btn-success">
                        <i class="fa fa-plus me-2"></i>Create Coupon</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Code</th>
                                    <th>Min. Purchase</th>
                                    <th>Discount</th>
                                    <th>Status</th>
                                    <th>Time Period</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $key => $coupon)
                                    <tr>
                                        <th>{{ $key + 1 }}</th>
                                        <td>{{ $coupon->name }}</td>
                                        <td>{{ $coupon->code }}</td>
                                        <td>{{ $coupon->min_order }}</td>
                                        <td>{{ $coupon->discount }}</td>
                                        <td>
                                            <span
                                                class="badge badge-{{ $coupon->status == \app\Models\Coupon::STATUS_INACTIVE ? 'danger' : 'primary' }}">{{ $coupon->status == \app\Models\Coupon::STATUS_INACTIVE ? 'Inactive' : 'Active' }}</span>
                                        </td>
                                        <td>{{ $coupon->start_date->format('d-m-Y') }} - {{ $coupon->end_date->format('d-m-Y') }}</td>
                                        <td class="color-primary">
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#basicModal_{{ $coupon->id }}"><i
                                                    class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>

                                    {{-- Delete Modal --}}
                                    <div class="modal fade" id="basicModal_{{ $coupon->id }}">
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
                                                    <form action="{{ route('coupon.delete') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $coupon->id }}">
                                                        <button type="submit" class="btn btn-danger light">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="POS_coupon_model">
        <div class="modal-dialog" role="document">
            <form action="{{ route('coupon.create') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Coupon</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4" id="coupon_search">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Title" name="coupon_title">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter Coupon Code"
                                    name="coupon_code" id="coupon_code_input">
                                <button class="btn btn-primary" id="generate_coupon_code" type="button">Generate</button>
                            </div>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="Min Order Amount"
                                    name="min_order_amount">
                                <input type="number" class="form-control" placeholder="Max Order Amount"
                                    name="max_order_amount">
                            </div>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="Discount" name="discount_amount">
                                <select name="discount_type" class="form-control">
                                    <option value="" disabled selected>Select Discount Type</option>
                                    <option value="percentage" disabled>Percentage</option>
                                    <option value="fixed">Fixed</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <select name="user_limit" class="form-control">
                                    <option value="" disabled selected>Limit for same user</option>
                                    <option value="multiple">Multiple</option>
                                    <option value="one_time">One Time</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" placeholder="Start Date" name="start_date"
                                    id="start_date">
                                <input type="date" class="form-control" placeholder="End Date" name="end_date"
                                    id="end_date" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Generate Coupon Code
            document.getElementById("generate_coupon_code").addEventListener("click", function() {
                const couponCode = generateCouponCode();
                document.getElementById("coupon_code_input").value = couponCode;
            });

            // Disable End Date until Start Date is selected
            document.getElementById("start_date").addEventListener("change", function() {
                const startDate = this.value;
                const endDateInput = document.getElementById("end_date");

                if (startDate) {
                    endDateInput.disabled = false;
                    endDateInput.min = startDate; // Set min date to start date
                } else {
                    endDateInput.disabled = true;
                    endDateInput.value = ""; // Clear end date if start date is cleared
                }
            });

            // Form Validation
            document.querySelector("form").addEventListener("submit", function(event) {
                const startDate = document.getElementById("start_date").value;
                const endDate = document.getElementById("end_date").value;

                if (!startDate || !endDate) {
                    alert("Please select both Start Date and End Date.");
                    event.preventDefault(); // Prevent form submission
                }

                if (new Date(endDate) < new Date(startDate)) {
                    alert("End Date cannot be before Start Date.");
                    event.preventDefault(); // Prevent form submission
                }
            });
        });

        // Function to generate a realistic coupon code
        function generateCouponCode() {
            const characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            let couponCode = "";
            for (let i = 0; i < 8; i++) {
                couponCode += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            return couponCode;
        }
    </script>
@endpush
