@extends('layout.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row ">
            <!-- left side service list part -->
            <div class="d-none">
                <input type="hiden" name="sym" value="$">
                <input type="hiden" name="pls" value="0">
                <input type="hiden" name="thousands_separator" value="1">
            </div>

            <div class="col-xl-7 ">
                <div class="card ">
                    <div class="card-body px-4 py-2 ">
                        <div class="my-3">
                            <input type="text" class="form-control" id="service_pos_search" placeholder="Search..">
                        </div>
                        <div class="row img_pos " id="pos_service">

                            @foreach ($data['services'] as $service)
                                <div class="col-md-2 col-4 p-2 services">
                                    <div class="card pos_border">
                                        <div class="card-body p-2 ">
                                            <div class="new-arrival-product text-center">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#service_type_{{ $service['id'] }}" id="POS_service"
                                                    data-id="{{ $service['id'] }}">
                                                    <div class="new-arrivals-img-contnent mb-2 p-0">
                                                        <img class="img-fluid" width="50px" height="50px"
                                                            src="{{ $service['image'] }}" alt="">
                                                    </div>
                                                    <h6>{{ $service['name'] }}</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Model Service type --}}
                                @include('pos_model.service_type')
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            <!-- right side pos part -->

            <div class="col-xl-5">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class=" p-3">
                                <div class="row">

                                    <div class="col-md-8 mb-2 mt-2 ">

                                        <select id="single_select_customer" name="customer" class="form-control w-100">

                                            <option value="" selected disabled>Select Customer </option>
                                            <option value="0">Walk In Customer</option>

                                            @foreach ($data['customers'] as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col-md-4 my-2 ">
                                        <button type="button" class="btn btn-sm btn-primary mb-0 w-100 "
                                            data-bs-toggle="modal" data-bs-target="#addcustomer">
                                            <i class="fa fa-plus me-2"></i> Add
                                        </button>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" id="pos_order_id" class="form-control w-100"
                                            value="#ORD{{ rand(100000, 999999) }}" readonly>
                                    </div>

                                    <div class="col-md-6">




                                        <input type="date" class="form-control w-100" id="POS_order_date"
                                            value="2025-02-27" min="new_fullDate">
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-2">
                                <div class="table-responsive">
                                    <div class="table_pos">
                                        <table class="table table-bordered verticle-middle table-responsive text-center">
                                            <thead class="table_head">
                                                <tr>
                                                    <th class="col-3">Service</th>
                                                    <th class="col-3">Color</th>
                                                    <th class="col-2">Rate</th>
                                                    <th class="col-3">Qty</th>
                                                    <th class="col-1"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="POS_service_added_list">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-5 d-block ">

                                        <button type="submit" class="btn btn-primary btn-xs px-2 mt-2 w-100"
                                            data-bs-toggle="modal" data-bs-target="#addons">Addons</button>
                                        <button type="submit" data-bs-toggle="modal" data-bs-target="#POS_coupon_model"
                                            class="btn btn-primary btn-xs px-2 mt-2 w-100">Coupon</button>
                                        <button type="submit" class="btn btn-success btn-xs mt-2 w-100 px-1"
                                            data-bs-toggle="modal" data-bs-target="#POS_payment_model"
                                            id="POS_payment_model_btn">Payment <i class="fas fa-arrow-right mx-2"></i></button>
                                        <button type="button" class="btn btn-danger btn-xs me-2 mt-2  w-100"
                                            id="POS_clear">ClearAll </button>

                                    </div>
                                    <div class="col-7 d-block px-4">
                                        <div class="d-flex justify-content-end">
                                            <p class="mb-0 mx-2 "><small> Sub Total : </small></p>
                                            <p class="fs-16 text-black font-w600 mb-0 symbol possymbol"
                                                id="POS_sub_total">
                                                00.00</p>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <p class="mb-0 mx-2 "><small> Addon Total : </small></p>
                                            <p class="fs-16 text-black font-w600 mb-0 symbol possymbol"
                                                id="POS_addon_total"> 00</p>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <p class="mb-0 mx-2 "><small> Coupon Discount : </small></p>
                                            <p class="fs-16 text-black font-w600 mb-0 symbol possymbol"
                                                id="POS_coupon_total"> 0.00</p>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <p class="mb-0 mx-2 " id="POS_tax_percent"><small> Tax (25 %) : </small></p>
                                            <p class="fs-16 text-black font-w600 mb-0 symbol possymbol"
                                                id="POS_tax_total">
                                                00</p>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <p class="mb-0 mx-2 "><small>Gross Total : </small></p>
                                            <p class="fs-16 text-black font-w600 mb-0 symbol possymbol"
                                                id="POS_gross_total"> 00.00</p>
                                        </div>

                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Model Add customer --}}
        @include('pos_model.customers')

        {{-- Model Payments --}}
        @include('pos_model.payment')

        {{-- Model Addons --}}
        @include('pos_model.addons')

        {{-- Model Coupon --}}
        @include('pos_model.coupon')

        {{-- Model Invoice --}}
        @include('pos_model.invoice')

    </div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @include('pos_model.script_helper')
@endpush
