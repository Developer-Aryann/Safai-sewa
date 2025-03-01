@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-header py-3">
                        <div class="d-none">
                            <input type="hiden" name="sym" value="₹">
                            <input type="hiden" name="pls" value="0">
                            <input type="hiden" name="thousands_separator" value="1">
                        </div>

                        <div>
                            <h3 class="text-uppercase mb-3">Safai Seva</h3>

                            <p class="mb-0">Phone No :- <span>+919955302489 </span></p>
                            <p class="mb-0">Email :- <span> demo@gmail.com </span></p>
                            <p class="mb-0 text-break w-75">Address :- <span> Knowlege Park, Greater Noida </span></p>
                            <p class="mb-0"> Tax :- <span> ----- </span></p>
                        </div>

                        <div class="mt-4">
                            <h5 class="text-uppercase fw-500">
                                <span> Order ID :- </span>
                                <span> #ORD2371 </span>
                            </h5>
                            <p class="text-sm mb-1">
                                <span> Order Date :- </span>
                                <span>2025-02-28</span>
                            </p>
                            <p class="text-sm mb-3">
                                <span> Delivery Date :- </span>
                                <span>2025-02-28</span>
                            </p>
                            <div class="d-flex align-items-center">
                                <div>Order Status :- </div>
                                <div class="btn-group m-2" role="group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle"
                                        data-bs-toggle="dropdown">Pending </button>
                                    <ul class="dropdown-menu">

                                        <li><a class="dropdown-item" href="javascript:void()"
                                                onclick="changeOrderStatus('1','2371')">Pending</a></li>

                                        <li><a class="dropdown-item" href="javascript:void()"
                                                onclick="changeOrderStatus('2','2371')">Processing</a></li>

                                        <li><a class="dropdown-item" href="javascript:void()"
                                                onclick="changeOrderStatus('3','2371')">Ready To deliver</a></li>

                                        <li><a class="dropdown-item" href="javascript:void()"
                                                onclick="changeOrderStatus('4','2371')">Deliver</a></li>

                                        <li><a class="dropdown-item" href="javascript:void()"
                                                onclick="changeOrderStatus('5','2371')">Returned</a></li>

                                        <li><a class="dropdown-item" href="javascript:void()"
                                                onclick="changeOrderStatus('6','2371')">Cancelled</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table_head">
                                    <tr>
                                        <th>#</th>
                                        <th>Service Name </th>
                                        <th>Color </th>
                                        <th>Rate </th>
                                        <th>Qty </th>
                                        <th>Total </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <th>1</th>
                                        <td>
                                            <div class="d-flex">
                                                <div class="mx-5">
                                                    <img class="rounded-circle" width="60" height="60"
                                                        src="{{ asset('assets/images/others/boots.png')}}" alt="image">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <span>Shoes</span>
                                                    <span>[Wash]</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td><input type="color" class="p-1 w-75" value="#000000" disabled=""></td>
                                        <td class="symbol">₹ 10.26</td>
                                        <td>1</td>
                                        <td class="symbol">₹ 10.26</td>
                                    </tr>

                                    <tr>
                                        <th>2</th>
                                        <td>
                                            <div class="d-flex">
                                                <div class="mx-5">
                                                    <img class="rounded-circle" width="60" height="60"
                                                        src="{{ asset('assets/images/others/shorts.png') }}" alt="image">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <span>Jeans</span>
                                                    <span>[dry clean]</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td><input type="color" class="p-1 w-75" value="#000000" disabled=""></td>
                                        <td class="symbol">₹ 50.23</td>
                                        <td>1</td>
                                        <td class="symbol">₹ 50.23</td>
                                    </tr>

                                    <tr>
                                        <th>3</th>
                                        <td>
                                            <div class="d-flex">
                                                <div class="mx-5">
                                                    <img class="rounded-circle" width="60" height="60"
                                                        src="{{ asset('assets/images/others/jacket.png') }}" alt="image">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <span>Blazer</span>
                                                    <span>[2 side]</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td><input type="color" class="p-1 w-75" value="#000000" disabled=""></td>
                                        <td class="symbol">₹ 67.82</td>
                                        <td>1</td>
                                        <td class="symbol">₹ 67.82</td>
                                    </tr>



                                </tbody>
                            </table>
                        </div>

                        <div class="card-header">

                            <div>

                            </div>

                            <div>
                                <h4> Payment Details :- </h4>
                                <p class="mb-0">
                                    <span>Sub Total :- </span>
                                    <span class="symbol">₹ 128.31</span>
                                </p>
                                <p class="mb-0">
                                    <span> Addon :- </span>
                                    <span class="symbol">₹ 0.00</span>
                                </p>
                                <p class="mb-0">
                                    <span> Discount :- </span>
                                    <span class="symbol">₹ 0.00</span>
                                </p>
                                <p class="mb-0">
                                    <span> Coupon Discount :- </span>
                                    <span class="symbol">₹ 0.00</span>
                                </p>
                                <p class="mb-2">
                                    <span> Tax (25 %) :- </span>
                                    <span class="symbol">₹ 32.08</span>
                                </p>
                                <p>
                                    <span><b> Gross Total :- </b></span>
                                    <span><b class="symbol">₹ 160.39</b></span>
                                </p>

                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="col">
                                <p>Notes :-
                                    <span></span>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body p-3">

                                <h4 class="card-title">Payments </h4>
                                <div id="DZ_W_TimeLine1" class="widget-timeline style-1 ps ps--active-y">
                                    <ul class="timeline">

                                        <li>
                                            <div class="timeline-badge primary"></div>
                                            <div class="mx-5">
                                                <h5><strong class="symbol">₹ 0</strong></h5>
                                                <span>
                                                    <h6> 2025-02-28</h6>
                                                </span>
                                                <strong>[Cash]</strong>
                                            </div>
                                        </li>
                                    </ul>

                                    <div class="row">
                                        <div class="col-12 ">
                                            <button data-bs-toggle="modal" data-bs-target="#addpaymentmodel"
                                                type="button" class="btn light btn-success mb-3 w-100">
                                                Add Payment
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <button type="button" class="btn btn-warning mb-1 w-100"
                                                data-bs-toggle="modal" data-bs-target="#invoice">Print Invoice </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- Modal add -->
     <div class="modal fade" id="addpaymentmodel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Payment </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form id="add_order_payment" method="post" class="need-validation">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-2 align-items-center">
                            <div class=" col-12">

                                <div class="row mb-50 align-items-center">
                                    <div class="col text-sm">Customer Name :</div>
                                    <div class="col-auto text-sm">Walk in customer</div>
                                </div>

                                <div class="row mb-50 align-items-center">
                                    <div class="col text-sm">Order ID : </div>
                                    <div class="col-auto text-sm">#ORD2371</div>
                                </div>

                                <div class="row mb-50 align-items-center">
                                    <div class="col text-sm">Order Date : </div>
                                    <div class="col-auto text-sm">2025-02-28</div>
                                </div>

                                <div class="row mb-50 align-items-center">
                                    <div class="col text-sm"> Delivery Date :</div>
                                    <div class="col-auto text-sm">2025-02-28</div>
                                </div>

                                <hr>

                                <div class="row mb-50 align-items-center">
                                    <div class="col text-sm"> Order Amount :</div>
                                    <div class="col-auto text-sm symbol"> 160.39</div>
                                </div>

                                <div class="row mb-50 align-items-center">
                                    <div class="col text-sm">Paid Amount :</div>
                                    <div class="col-auto text-sm symbol">0.00</div>
                                </div>

                                <hr>

                                <div class="row align-items-center">
                                    <div class="col text-sm">Balance :</div>
                                    <div class="col-auto text-sm symbol">160.39</div>
                                </div>

                                <hr>

                                <div class="row align-items-center">
                                    <div class="col-md-6 mb-1">
                                        <label class="form-label">Paid Amount </label>
                                        <input type="flot" class="form-control" placeholder="Enter Amount" name="paid" value="0">
                                        <input type="hidden"  name="orderid" value="2371">
                                        <input type="hidden"  name="balan" value="160.39">
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label class="form-label">Payment Type </label>
                                        <select class="default-select form-control wide" name="payment"
                                            id="payment">
                                            <option value selected disabled>Choose Payment Type</option>
                                            
                                                <option value="1">Cash</option>
                                            
                                                <option value="2">Online </option>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" value="submit"  class="btn btn-primary" id="add_order_payment_submit">Save </button>
                    </div>
                </form>




            </div>
        </div>
    </div>

    <!-- Modal invoice -->
    <div class="modal fade" id="invoice">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="invoice_page" id="invoice_page">
                    

                        <div class="text-center m-3">
                            <h3 class="text-uppercase">URBANDHOBI</h3>
                            <h6>Phone Number  : +919955302489</h6>
                            <h6>Email  : user@gmail.com </h6>
                        </div>

                        <hr class="mb-3">

                        <div class="d-flex m-3 justify-content-between align-items-center">
                        
                            <div>
                                <h5> Order ID  :#ORD2371</h5>
                                <h5> Order Status  : Pending</h5>
                            </div>
                            <div>
                                <h5>Order Date  : 2025-02-28</h5>
                                <h5>Delivery Date  : 2025-02-28</h5>
                            </div>
                        </div>

                        <hr class="mt-2">

                        <div class="table-responsive m-3">
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
                                    
                                        <tr>
                                            <td>1</td>
                                            <td>
                                            <h5 class="mb-0">Shoes</h5>
                                            <span class="mb-0 fs-6">[Wash] </span> <br>
                                            </td>
                                            <td> 1 </td>
                                            <td class="symbol">10.26 </td>
                                        </tr>
                                    
                                        <tr>
                                            <td>2</td>
                                            <td>
                                            <h5 class="mb-0">Jeans</h5>
                                            <span class="mb-0 fs-6">[dry clean] </span> <br>
                                            </td>
                                            <td> 1 </td>
                                            <td class="symbol">50.23 </td>
                                        </tr>
                                    
                                        <tr>
                                            <td>3</td>
                                            <td>
                                            <h5 class="mb-0">Blazer</h5>
                                            <span class="mb-0 fs-6">[2 side] </span> <br>
                                            </td>
                                            <td> 1 </td>
                                            <td class="symbol">67.82 </td>
                                        </tr>
                                    

                                </tbody>
                            </table>
                        </div>

                        <hr> 
                        
                   

                        <table class="table table-borderless px-4">
                            <tbody>
                                <tr>
                                    <td class="py-0 ">Item Price  :</td>
                                    <td class="py-0 text-end symbol" >128.31 </td>
                                </tr>
                                <tr>
                                    <td class="py-0">Addons  :</td>
                                    <td class="py-0 text-end symbol">0.00 </td>
                                </tr>
                                <tr>
                                    <td class="py-0">Tax  :</td>
                                    <td class="py-0 text-end symbol">32.08 </td>
                                </tr>
                                <tr>
                                    <td class="py-0">Discount  :</td>
                                    <td class="py-0 text-end symbol">0.00 </td>
                                </tr>
                                <tr>
                                    <td class="py-0">Coupon  :</td>
                                    <td class="py-0 text-end symbol">0.00 </td>
                                </tr>
                                <tr>
                                    <td class="py-0">Total  :</td>
                                    <td class="py-0 text-end symbol">160.39 </td>
                                </tr>
                            </tbody>
                        </table>

                        <hr>

                        <div class="m-3">
                            <div class="d-flex justify-content-between align-items-center">
                                    <h5>Paid Amount  : <span class="symbol">0.00</span></h5>
                                    <h5>Due Amount  : <span class="symbol">160.39</span></h5>
                            </div>
                            
                        </div>

                        

                        <hr>

                        <div class="d-flex justify-content-start px-4">
                            
                    
                        </div>

                        <hr>

                        <div class="d-flex justify-content-center">
                            ******** Thank You  ********
                        </div>

                        <hr>
                
                </div>
                <footer class="m-3 d-flex justify-content-end">
                    <button type="button" class="btn btn-primary mx-2" id="pri_invo" onclick="printDivContent('invoice')"> Print Invoice  </button>
                    <button type="button" class="btn btn-danger mx-2" onclick="location.reload()">Go Back </button>
                </footer>
            </div>

        </div>
    </div>
@endsection

@push('script')
<script>
    function printDivContent(divId) {
        // Get the content of the specific div
        const divContent = document.getElementById(divId).innerHTML;

        // Create a new window
        const printWindow = window.open('', '_blank');

        // Write the content to the new window
        printWindow.document.write(`
            <html>
                <head>
                    <title>Print Invoice</title>
                    <style>
                        /* Add any custom styles for printing here */
                        body {
                            font-family: Arial, sans-serif;
                            margin: 0;
                            padding: 20px;
                        }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-bottom: 20px;
                        }
                        th, td {
                            border: 1px solid #000;
                            padding: 8px;
                            text-align: left;
                        }
                        .symbol::before {
                            content: "₹"; /* Add currency symbol if needed */
                        }
                        hr {
                            border: 1px solid #000;
                        }
                    </style>
                </head>
                <body>
                    ${divContent}
                </body>
            </html>
        `);

        printWindow.document.close();
        printWindow.print();
        printWindow.close();
    }
</script>
@endpush