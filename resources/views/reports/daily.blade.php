@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Daily Report </h3>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="col-5">
                                <label class="form-label">Date </label>
                                <input type="date" class="form-control" name="date" id="daily_report_date"
                                    value="{{ date('Y-m-d') }}">
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead style="background-color: #D8D8D8; color: #1C1C1C;">
                                        <tr>
                                            <th>Particulars </th>
                                            <th>Value </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> Orders </td>
                                            <td style="color: #FFBF00; font-weight: 600;" id="daily_report_orders">
                                                {{ $response['orders'] }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> No. of Orders Delivered </td>
                                            <td style="color: #0000FF; font-weight: 600;" id="daily_report_ordersdelivery">
                                                {{ $response['orders_delivered'] }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Total Sales </td>₹
                                            <td style="color: #04B404; font-weight: 600;" class="symbol"
                                                id="daily_report_totalsale">
                                                {{ $response['total_sales'] }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Total Payment </td>
                                            <td style="color: #01A9DB; font-weight: 600;" class="symbol"
                                                id="daily_report_payment">₹
                                                {{ $response['total_payment'] }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Total Expence </td>
                                            <td style="color: #DF013A; font-weight: 600;" class="symbol"
                                                id="daily_report_expence">₹
                                                {{ $response['total_expense'] }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dateInput = document.getElementById('daily_report_date');

        dateInput.addEventListener('change', function () {
            const selectedDate = this.value; 
            fetchDailyReportData(selectedDate);
        });

        function fetchDailyReportData(date) {
            const apiUrl = `{{ route('reports.daily.api') }}?date=${date}`;

            fetch(apiUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('daily_report_orders').textContent = data.orders || 0;
                    document.getElementById('daily_report_ordersdelivery').textContent = data.orders_delivered || 0;
                    document.getElementById('daily_report_totalsale').textContent = data.total_sales || 0;
                    document.getElementById('daily_report_payment').textContent = data.total_payment || 0;
                    document.getElementById('daily_report_expence').textContent = data.total_expense || 0;
                })
                .catch(error => {
                    console.error('Error fetching daily report data:', error);
                });
        }

        const initialDate = dateInput.value;
        fetchDailyReportData(initialDate);
    });
</script>
@endpush