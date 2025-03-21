<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Print Invoice</title>
    <link href="https://fonts.googleapis.com/css?family=Calibri:400,700,400italic,700italic" />
    <style>
      @page {
        size: auto;
        margin: 0mm 0 0mm 0;
      }

      body {
        margin: 0px;
        font-family: Calibri;
      }

      @media screen {

        .header,
        .footer {
          display: none;
        }
      }
    </style>
    <style>
      .mb-0 {
        margin-bottom: 0;
      }

      .my-50 {
        margin-top: 50px;
        margin-bottom: 50px;
      }

      .my-0 {
        margin-top: 0;
        margin-bottom: 0;
      }

      .my-5 {
        margin-top: 5px;
        margin-bottom: 5px;
      }

      .mt-10 {
        margin-top: 10px;
      }

      .mb-15 {
        margin-bottom: 15px;
      }

      .mr-18 {
        margin-right: 18px;
      }

      .mr-25 {
        margin-right: 25px;
      }

      .mb-25 {
        margin-bottom: 25px;
      }

      .h4,
      .h5,
      .h6,
      h4,
      h5,
      h6 {
        margin-top: 10px;
        margin-bottom: 10px;
      }

      .login-wrapper {
        background-size: 100% 100%;
        height: 100vh;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      }

      .login-wrapper:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: block;
        background: rgba(0, 0, 0, 0.5);
      }

      .login_box {
        text-align: center;
        position: relative;
        max-width: 80mm;
        background: #343434;
        padding: 10px 10px;
        border-radius: 10px;
      }

      .login_box .form-control {
        height: 60px;
        margin-bottom: 25px;
        padding: 12px 25px;
      }

      .btn-login {
        color: #fff;
        background-color: #45c203;
        border-color: #45c203;
        width: 100%;
        line-height: 45px;
        font-size: 17px;
      }

      .btn-login:hover,
      .btn-login:focus {
        color: #fff;
        background-color: transparent;
        border-color: #fff;
      }

      .invoice-card {
        display: flex;
        flex-direction: column;
        width: 80mm;
        background-color: #fff;
        border-radius: 5px;
        margin: 15px auto;
      }

      .invoice-head,
      .invoice-card .invoice-title {
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .invoice-title {
        background-color: #000000 !important;
        color: #ffffff !important;
        padding: 10px;
        -webkit-print-color-adjust: exact;
      }

      .invoice-head {
        flex-direction: column;
        margin-bottom: 4px;
      }

      .invoice-card .invoice-title {
        margin: 15px 0;
      }

      .invoice-details {
        border-top: 0.5px dashed #747272;
        border-bottom: 0.5px dashed #747272;
      }

      .invoice-list {
        width: 100%;
        border-collapse: collapse;
        border-bottom: 1px dashed #858080;
      }

      .invoice-list .row-data {
        border-bottom: 1px dashed #858080;
      }

      .invoice-list .row-data:last-child {
        border-bottom: 0;
        margin-bottom: 0;
      }

      .invoice-list .heading {
        font-size: 16px;
        font-weight: 600;
        margin: 0;
      }

      .invoice-list .heading1 {
        font-size: 14px;
        font-weight: 500;
        margin: 0;
      }

      .invoice-list thead tr td {
        font-size: 15px;
        font-weight: 600;
        padding: 5px 0;
      }

      .invoice-list tbody tr td {
        line-height: 25px;
      }

      .row-data {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        width: 100%;
      }

      .middle-data {
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .item-info {
        max-width: 200px;
      }

      .item-title {
        font-size: 14px;
        margin: 0;
        line-height: 19px;
        font-weight: 500;
      }

      .item-size {
        line-height: 19px;
      }

      .item-size,
      .item-number {
        margin: 5px 0;
      }

      .invoice-footer {
        margin-top: 20px;
      }

      .gap_right {
        border-right: 1px solid #ddd;
        padding-right: 15px;
        margin-right: 15px;
      }

      .b_top {
        border-top: 1px solid #ddd;
        padding-top: 12px;
      }

      .food_item {
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        align-items: center;
        border: 1px solid #ddd;
        border-top: 5px solid #1db20b;
        padding: 15px;
        margin-bottom: 25px;
        transition-duration: 0.4s;
      }

      .bhojon_title {
        margin-top: 6px;
        margin-bottom: 6px;
        font-size: 14px;
      }

      .food_item .img_wrapper {
        padding: 15px 5px;
        background-color: #ececec;
        border-radius: 6px;
        position: relative;
        transition-duration: 0.4s;
      }

      .food_item .table_info {
        font-size: 11px;
        background: #1db20b;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 4px 8px;
        color: #fff;
        border-radius: 15px;
        text-align: center;
      }

      .food_item:focus,
      .food_item:hover {
        background-color: #383838;
      }

      .food_item:focus .bhojon_title,
      .food_item:hover .bhojon_title {
        color: #fff;
      }

      .food_item:hover .img_wrapper,
      .food_item:focus .img_wrapper {
        background-color: #383838;
      }

      .btn-4 {
        border-radius: 0;
        padding: 15px 22px;
        font-size: 16px;
        font-weight: 500;
        color: #fff;
        min-width: 130px;
      }

      .btn-4.btn-green {
        background-color: #1db20b;
      }

      .btn-4.btn-green:focus,
      .btn-4.btn-green:hover {
        background-color: #3aa02d;
        color: #fff;
      }

      .btn-4.btn-blue {
        background-color: #115fc9;
      }

      .btn-4.btn-blue:focus,
      .btn-4.btn-blue:hover {
        background-color: #305992;
        color: #fff;
      }

      .btn-4.btn-sky {
        background-color: #1ba392;
      }

      .btn-4.btn-sky:focus,
      .btn-4.btn-sky:hover {
        background-color: #0dceb6;
        color: #fff;
      }

      .btn-4.btn-paste {
        background-color: #0b6240;
      }

      .btn-4.btn-paste:hover,
      .btn-4.btn-paste:focus {
        background-color: #209c6c;
        color: #fff;
      }

      .btn-4.btn-red {
        background-color: #eb0202;
      }

      .btn-4.btn-red:focus,
      .btn-4.btn-red:hover {
        background-color: #ff3b3b;
        color: #fff;
      }

      .text-center {
        text-align: center;
      }

      .border-top {
        border-top: 2px dashed #858080;
        background: #ececec;
      }

      .text-bold {
        font-weight: bold !important;
      }
    </style>
  </head>
  <body>
    <div class="page-wrapper" style="padding: 5px">
      <div class="invoice-card">
        <div class="invoice-head">
          <img src="{{ auth()->user()->settings->brand_logo }}" style="height: 34px; max-width: 80%" alt="" />
          <h4>
            {{ auth()->user()->settings->brand_name }}
          </h4>
          <p class="my-0" style="display: flex; text-align: center;">
            {{-- {{ auth()->user()->address }} --}}
            Greater Noida (India)
          </p>
          <p class="my-0" style="padding-top: 15px;"> +91 {{ auth()->user()->phone }}
          </p>
          <b>
            {{ auth()->user()->brand_email }}
          </b>
        </div>
        <div class="invoice-details" style="border-top: none">
          <div class="invoice-list">
            <div class="invoice-title">
              <h4 class="heading">Order Invoice</h4>
              <h4 class="heading heading-child"></h4>
            </div>
            <div class="row-data" style="border: none; margin-bottom: 1px">
              <div class="item-info">
                <h5 class="item-title">
                  <b>Order No</b>
                </h5>
              </div>
              <h5 class="my-5">
                <b> #OID0013 </b>
              </h5>
            </div>
            <div class="row-data" style="border: none">
              <div class="item-info">
                <h5 class="item-title">
                  <b>Order Date</b>
                </h5>
              </div>
              <h5 class="my-5">
                <b>
                  {{ now()->format('d-m-Y') }}
                </b>
              </h5>
            </div>
            <div class="row-data" style="border: none">
              <div class="item-info">
                <h5 class="item-title">
                  <b>Delivery Date</b>
                </h5>
              </div>
              <h5 class="my-5">
                <b>
                  {{ now()->addDays(3)->format('d-m-Y') }}
                </b>
              </h5>
            </div>
            <div class="invoice-title" style="text-align: right">
              <h6 class="heading1">Service Name</h6>
              <h6 class="heading1 heading-child">Rate</h6>
              <h6 class="heading1 heading-child">QTY</h6>
              <h6 class="heading1 heading-child">Total</h6>
            </div>
            <div class="row-data" style="text-align: center; margin-top: 5px; padding-bottom: 8px; align-items: center;">
              <div class="item-info" style="width: 82px; text-align: initial">
                <h5 class="item-title">
                  <b> Jeans </b>
                </h5>
                <h5 class="item-title">
                  <b>[Wash + Iron]</b>
                </h5>
              </div>
              <h5 class="my-5">
                <b> 100 ₹ </b>
              </h5>
              <h5 class="my-5">
                <b> 1 </b>
              </h5>
              <h5 class="my-5">
                <b> 100 ₹ </b>
              </h5>
            </div>
          </div>
          <div class="invoice-footer mb-15">
            <div class="row-data">
              <div class="item-info">
                <h5 class="item-title">Invoice To:</h5>
              </div>
              <h5 class="my-5"> Mayank <br />
                <br />
                <br />
              </h5>
            </div>
            <div class="row-data">
              <div class="item-info">
                <h5 class="item-title">Sub Total:</h5>
              </div>
              <h5 class="my-5">
                <b> 100 ₹ </b>
              </h5>
            </div>
            <div class="row-data">
              <div class="item-info">
                <h5 class="item-title">Addon:</h5>
              </div>
              <h5 class="my-5">
                <b> 10 ₹ </b>
              </h5>
            </div>
            <div class="row-data">
              <div class="item-info">
                <h5 class="item-title">Discount:</h5>
              </div>
              <h5 class="my-5">
                <b> 0 ₹ </b>
              </h5>
            </div>
            <div class="row-data">
              <div class="item-info">
                <h5 class="item-title">Tax (<%= 10%):
								</h5>
							</div>
							<h5 class="my-5">
								<b>
                                10 ₹
                            </b>
							</h5>
						</div>
						<div class="row-data">
							<div class="item-info">
								<h5 class="item-title">Gross Total:</h5>
							</div>
							<h5 class="my-5">
								<b>
                                110 ₹
                            </b>
							</h5>
						</div>
						<div class="row-data">
							<div class="item-info">
								<h5 class="item-title">Paid Amount:</h5>
							</div>
							<h5 class="my-5">
								<b>
                            0 ₹
                            </b>
							</h5>
						</div>
						<hr />
					</div>
					<div class="invoice_address">
						<div class="text-center">
							<h3 class="mt-10"></h3>
							<p class="b_top">Powered By 
								<b>
                                Safai Sewa
                            </b>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
        window.onload = function() {
            window.print();
            setTimeout(function() {
                window.location.href = "{{ route('orders') }}";
            }, 800); // 1000ms = 1 second
        };
    </script>
	</body>
</html>