<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title') Print</title>
        <style>
            @page {
                size: A4;
                margin: 12mm;
            }

            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
            }

            .company-header {
                display: flex;
                align-items: center;
                border-bottom: 2px solid #000;
                padding-bottom: 10px;
                margin-bottom: 10px;
            }

            .header-left {
                width: 20%;
            }

            .header-left img {
                max-height: 60px;
            }

            .header-center {
                width: 60%;
                text-align: center;
            }

            .company-name {
                font-size: 20px;
                font-weight: bold;
            }

            .company-address {
                font-size: 12px;
            }

            .header-right {
                width: 20%;
                text-align: right;
                font-size: 11px;
            }

            .title {
                text-align: center;
                font-weight: bold;
                margin: 8px 0;
            }

            .header-table {
                width: 100%;
            }

            .header-table td {
                padding: 4px;
            }

            .table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
            }

            .table th, .table td {
                border: 1px solid #000;
                padding: 6px;
            }

            .table th {
                text-align: center;
            }

            .right {
                text-align: right;
            }

            .total-row {
                font-weight: bold;
                background: #f2f2f2;
            }

            .footer {
                width: 100%;
                font-size: 11px;
            }

            .page-break {
                page-break-after: always;
            }

            .a4-container {
                width: 210mm;
                min-height: 297mm;
                margin: 20px auto;
                padding: 12mm;
                background: #fff;
                box-shadow: 0 0 8px rgba(0,0,0,0.2);
                box-sizing: border-box;
            }

            /* Print mode */
            @media print {
                body {
                    margin: 0;
                    background: none;
                }

                .a4-container {
                    width: auto;
                    min-height: auto;
                    margin: 0;
                    box-shadow: none;
                    padding: 0;
                }
            }
        </style>
    </head>

    <body>

        <div class="a4-container">
            <!-- COMPANY HEADER -->
            <div class="company-header">
                <!-- LEFT: LOGO -->
                <div class="header-left">
                    <img src="{{ asset('logo.png') }}" alt="Logo">
                </div>

                <!-- CENTER: COMPANY INFO -->
                <div class="header-center">
                    <div class="company-name">Your Company Name</div>
                    <div class="company-address">
                        Address Line 1, Address Line 2<br>
                        GSTIN: 1234567890
                    </div>
                </div>

                <!-- RIGHT: OPTIONAL (QR / META) -->
                <div class="header-right">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=70x70&data={{ $inward->inward_no }}">
                </div>
            </div>

            <div class="title">Material Inward</div>

            <!-- DETAILS -->
            <table class="header-table">
                <tr>
                    <td>
                        Inward No: <strong>{{ $inward->inward_no }}</strong><br>
                        Date: <strong>{{ date('d-m-Y', strtotime($inward->in_date)) }}</strong><br>
                        Vendor: <strong>{{ $inward->vendor->name ?? '' }}</strong>
                    </td>
                    <td>
                        Warehouse: <strong>{{ $inward->warehouse->name ?? '' }}</strong><br>
                        Vendor Ref: <strong>{{ $inward->vendor_inward_no }}</strong>
                    </td>
                </tr>
            </table>

            <!-- ITEMS -->
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Material</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Rate</th>
                        <th>GST %</th>
                        <th>GST Amt</th>
                        <th>Amount</th>
                        <th>PO Ref</th>
                    </tr>
                </thead>

                <tbody>
                @php
                    $totalQty = 0;
                    $totalAmount = 0;
                    $totalGST = 0;
                @endphp

                @foreach($inward->materialInwardItems as $i => $item)
                @php
                    $gstRate = $item->gst ?? 0;
                    $gstAmount = ($item->amount * $gstRate) / 100;

                    $totalQty += $item->quantity;
                    $totalAmount += $item->amount;
                    $totalGST += $gstAmount;
                @endphp

                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td><strong>{{ $item->material_name }}</strong></td>
                        <td class="right">{{ number_format($item->quantity,2) }}</td>
                        <td><strong>{{ $item->unit->name ?? '' }}</strong></td>
                        <td class="right"><strong>{{ number_format($item->rate,2) }}</strong></td>
                        <td class="right"><strong>{{ $gstRate }}</strong></td>
                        <td class="right"><strong>{{ number_format($gstAmount,2) }}</strong></td>
                        <td class="right"><strong>{{ number_format($item->amount,2) }}</strong></td>
                        <td><strong>{{ $item->po_id }}</strong></td>
                    </tr>
                    <!-- PAGE BREAK AFTER 20 ROWS -->
                    @if(($i+1) % 20 == 0)
                </tbody>
            </table>

            <div class="page-break"></div>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Material</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Rate</th>
                        <th>GST %</th>
                        <th>GST Amt</th>
                        <th>Amount</th>
                        <th>PO Ref</th>
                    </tr>
                </thead>
                <tbody>
                    @endif

                    @endforeach
                    <!-- TOTAL -->
                    <tr class="total-row">
                        <td colspan="2" class="right">Total</td>
                        <td class="right">{{ number_format($totalQty,2) }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="right">{{ number_format($totalGST,2) }}</td>
                        <td class="right">{{ number_format($totalAmount,2) }}</td>
                        <td></td>
                    </tr>

                </tbody>
            </table>

            <!-- GRAND TOTAL -->
            <h3 class="right">
                Grand Total: {{ number_format($totalAmount + $totalGST,2) }}
            </h3>

            <p><strong>Remarks:</strong> {{ $inward->remarks }}</p>

            <!-- FOOTER -->
            <div class="footer">
                <table width="100%">
                    <tr>
                        <td>
                        Printed: {{ $inward->created_at->format('d-m-Y H:i') }}<br>
                        Created By: {{ $inward->createdByUser->name ?? '' ?? 'System' }}
                        </td>

                        <td style="text-align:right">
                        Supervisor Signature<br><br>
                        ______________________
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>
