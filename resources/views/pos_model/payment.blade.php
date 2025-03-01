<div class="modal fade" id="POS_payment_model">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Make Payment </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="posprintform" action="{{ route('pos.print') }}" method="post" class="need-validation">
                @csrf
                <div class="modal-body" id="payment_sum">
                    <div class="row g-2 align-items-center">

                        <div class="col-12">
                            <div class="row align-items-center">
                                <div class="col-md-6 mb-1">
                                    <label class="form-label">Delivery Date </label>
                                    <input type="date" class="form-control" name="deliverydate" id="deliverydate">

                                    <input type="date" class="form-control" name="deliverydate_hidden"
                                        id="deliverydate_hidden" hidden>
                                    <input type="hidden" id="POS_gross_order" value="" name="gross">
                                    <input type="hidden" id="POS_subtotal_order" value="" name="sub">
                                </div>
                                <div class="col-md-6 mb-1 ">
                                    <label class="form-label">Extra Discount </label>
                                    <input type="number" id="POS_extra_discount_order" class="form-control"
                                        placeholder="Enter Amount" name="extradiscount">
                                </div>
                            </div>

                            <div class="row text-center">
                                <div id="show_pos_barcode">

                                </div>
                            </div>

                            <small><span id="POS_worning" class="text-center text-danger "></span></small>
                            <hr>

                            <div class="row">
                                <div class="col text-sm ">Sub Total : </div>
                                <div class="col-auto text-sm payment_val paysymbol" id="payment_subtotal">$ 0.00
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-sm">Addon :</div>
                                <div class="col-auto text-sm payment_val paysymbol" id="payment_addons">$ 0.00
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-sm">Extra Discount :</div>
                                <div class="col-auto text-sm payment_val paysymbol extsymbol"
                                    id="payment_extradiscount">$ 0.00</div>
                            </div>

                            <div class="row">
                                <div class="col text-sm">Coupon Discount:</div>
                                <div class="col-auto text-sm payment_val paysymbol" id="payment_coupondiscount">$
                                    0.00</div>
                            </div>

                            <div class="row">
                                <div class="col text-sm">Tax <span id="payment_text_perdent"></span>:</div>
                                <div class="col-auto text-sm payment_val paysymbol" id="payment_text_amount"> 0.00
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col text-sm">Gross Total : </div>
                                <div class="col-auto text-sm paysymbol extsymbol" id="payment_grosstotal"> 00.00
                                </div>
                            </div>

                            <hr>

                            <div class="row align-items-center">
                                <div class="col-md-6 mb-1">
                                    <label class="form-label">Paid Amount </label>
                                    <input type="number" class="form-control" placeholder="Enter Amount"
                                        name="paid_amount" id="paid_amount" min="0" required>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label">Payment Type </label>
                                    <select class="default-select form-control wide" name="payment_type"
                                        id="POS_payment_type_list" required>
                                        <option value selected disabled>Choose Payment Type</option>
                                        @foreach ($data['payment_methods'] as $key)
                                            <option value="{{ $key }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <span id="POS_worning_paid" class="text-center text-danger "></span>
                            <hr>

                            <div class="row">
                                <div class="col text-sm">Balance :</div>
                                <div class="col-auto text-sm paysymbol extsymbol pamtsymbol" id="POS_total_balance">
                                    0.00</div>
                            </div>

                            <hr>

                            <div class="col-12">
                                <label class="form-label">Notes / Remarks </label>
                                <input type="text" class="form-control" placeholder="Enter Notes" name="note">
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel </button>
                <!-- <button class="btn btn-success" type="submit" value="submit" id="cart_submit_for_order" >Save  & Print </button> -->
                <button class="btn btn-success" type="submit" value="submit" id="printcheck">Save & Print
                </button>
            </div>
        </div>
    </div>
</div>
