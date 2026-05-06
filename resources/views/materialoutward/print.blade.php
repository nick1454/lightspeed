<!DOCTYPE html>
<html>
    <head>
        <title>Material Inward Print</title>
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
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=70x70&data={{ $outward->outward_no }}">
                </div>
            </div>
            <div class="title">Material Outward</div>

            <div class="header">
                <div>
                    <strong>Outward No:</strong> {{ $outward->outward_no }}<br>
                    <strong>Date:</strong> {{ $outward->out_date }}<br>
                </div>

                <div>
                    <strong>Project:</strong> {{ $outward->project->name ?? '' }}<br>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Material</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Remarks</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $totalQty = 0;
                        $totalAmount = 0;
                        $totalGST = 0;
                    @endphp
                    @foreach($outward->materialOutwardItems as $i=>$item)
                    @php
                        $gstRate = $item->gst ?? 0;
                        $gstAmount = ($item->amount * $gstRate) / 100;

                        $totalQty += $item->quantity;
                        $totalAmount += $item->amount;
                        $totalGST += $gstAmount;
                    @endphp
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $item->material_name }}</td>
                        <td class="right">{{ $item->quantity }}</td>
                        <td>{{ $item->unit->name ?? '' }}</td>
                        <td>{{ $item->remarks }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- GRAND TOTAL -->
            <h3 class="right">
                Grand Total: {{ number_format($totalAmount + $totalGST,2) }}
            </h3>

            <p><strong>Remarks:</strong> {{ $outward->remarks }}</p>

            <!-- FOOTER -->
            <div class="footer">
                <table width="100%">
                    <tr>
                        <td>
                        Printed: {{ $outward->created_at->format('d-m-Y H:i') }}<br>
                        Created By: {{ $outward->createdByUser->name ?? '' ?? 'System' }}

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
