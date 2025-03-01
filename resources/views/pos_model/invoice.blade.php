<div class="modal fade bd-example-modal-sm" id="invoice">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="invoice_page" id="invoice_page">

                <div class="d-flex align-items-center" style="margin-left: 10px; margin-right: 10px;">

                    <div class="col-6 " id="invoice_header">
                        <h3 class="text-uppercase"><span id="shop_name">Laundry</span></h3>
                        <h6>Phone Number <span id="shop_no">+000123456789</span></h6>
                        <h6 class="mb-0">Email <span id="shop_email">demo@amtech.com</span></h6>
                    </div>

                    <div class="col-6 d-flex justify-content-end">
                        <div id="show_pos_barcode_print">

                        </div>
                    </div>

                </div>

                <div class="d-flex border-top border-bottom pt-2 pb-2" style="margin-left: 10px; margin-right: 10px;">
                    <div class="col-6 ">
                        <h5>Order ID<span id="invoice_order_id"></span></h5>
                        <h5 class="mb-0"> Order Status : Pending</h5>
                    </div>

                    <div class="col-6 text-end">
                        <h5>Order Date : <span id="invoice_order_date">2022-11-04</span></h5>
                        <h5 class="mb-0">Delivery Date<span id="invoice_delivery_date"></span></h5>
                    </div>
                </div>



                <hr class="m-0">

                <div class="table-responsive" style="margin-left: 10px; margin-right: 10px;">
                    <p class="mb-0">Service List </p>
                    <table id="default-datatable" class="display table">
                        <thead class="table_head">
                            <tr>
                                <th>#</th>
                                <th> Item </th>
                                <th> QTY </th>
                                <th> Price </th>
                            </tr>
                        </thead>
                        <tbody id="invoice_item" class="align-items-center">


                        </tbody>
                    </table>
                </div>

                <hr class="m-0">

                <div class="table-responsive m-3" id="POS_addon_invoice_item">
                    <p class="mb-0">Addons List </p>
                    <table id="default-datatable" class="display table mb-0">
                        <thead class="table_head">
                            <tr>
                                <th>#</th>
                                <th> Addons </th>
                                <th> Price </th>
                            </tr>
                        </thead>
                        <tbody id="addon_item" class="align-items-center">


                        </tbody>
                    </table>
                    <hr class="m-0">
                </div>

                <table class="table table-borderless px-4" style="margin-bottom: 0px;">
                    <tbody>
                        <tr>
                            <td class="py-0 ">Item Price :</td>
                            <td class="py-0 text-end invosymbol" id="invoice_price"></td>
                        </tr>
                        <tr>
                            <td class="py-0">Addons :</td>
                            <td class="py-0 text-end invosymbol" id="invoice_addon"></td>
                        </tr>
                        <tr>
                            <td class="py-0">Tax :</td>
                            <td class="py-0 text-end invosymbol" id="invoice_tax"></td>
                        </tr>
                        <tr>
                            <td class="py-0">Discount :</td>
                            <td class="py-0 text-end invosymbol" id="invoice_Discount"></td>
                        </tr>
                        <tr>
                            <td class="py-0">Coupon :</td>
                            <td class="py-0 text-end invosymbol" id="invoice_Coupon"></td>
                        </tr>
                        <tr>
                            <td class="py-0">Total :</td>
                            <td class="py-0 text-end invosymbol" id="invoice_gross"></td>
                        </tr>
                    </tbody>
                </table>

                <hr class="m-0">

                <div class="" style="margin-left: 10px; margin-right: 10px; margin-top: 8px;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Payment Method : <span id="invoice_paid_method"></span></h5>
                        <div>
                            <h5>Paid Amount : <span class="invosymbol" id="invoice_paid_amount"></span></h5>
                            <h5>Due Amount : <span class="invosymbol" id="invoice_due_amount"></span></h5>
                        </div>
                    </div>
                </div>

                <hr class="last_hr m-0">

                <p class="Invoice_To mb-0 px-4">Invoice To </p>
                <table class="table table-borderless px-4 customer_details mb-0">
                    <tbody>
                        <tr>
                            <td class="py-0 ">Name :</td>
                            <td class="py-0 text-end" id="invoice_Name_customer"></td>
                        </tr>
                        <tr>
                            <td class="py-0">Number :</td>
                            <td class="py-0 text-end" id="invoice_Number_customer"></td>
                        </tr>
                        <tr>
                            <td class="py-0">Email :</td>
                            <td class="py-0 text-end" id="invoice_Email_customer"></td>
                        </tr>
                        <tr>
                            <td class="py-0">Address :</td>
                            <td class="py-0 text-end" id="invoice_Address_customer"></td>
                        </tr>
                        <tr>
                            <td class="py-0">Tax ID :</td>
                            <td class="py-0 text-end" id="invoice_Tax_customer"></td>
                        </tr>
                    </tbody>
                </table>


                <hr class="m-0">

                <div class="d-flex justify-content-start px-4" id="order_note">


                </div>

                <hr class="mt-0">

                <div class="d-flex justify-content-center">
                    ******** Thank You ********
                </div>

                <hr class="m-0">
            </div>
            <footer class="m-3 d-flex justify-content-end">
                <button type="button" class="btn btn-primary mx-2" id="pri_invo"> Print Invoice </button>
                <button type="button" class="btn btn-danger mx-2" onclick="location.reload()">Go Back </button>
            </footer>
        </div>
    </div>
</div>
