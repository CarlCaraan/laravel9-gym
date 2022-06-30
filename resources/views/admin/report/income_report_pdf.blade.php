    @php
    $total_income = App\Models\Booking::whereBetween('start_date', [$start_date, $end_date])->sum('price');
    $total_customer = App\Models\Booking::whereBetween('start_date', [$start_date, $end_date])->count();
    $user_siteinfo = App\Models\UserSiteInfo::first();
    @endphp
    <!DOCTYPE html>
    <html>

    <head>
        <style>
            #customers {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #customers td,
            #customers th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #customers tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            #customers tr:hover {
                background-color: #ddd;
            }

            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #04AA6D;
                color: white;
            }
        </style>
    </head>

    <body>
        <table id="customers">
            <tr>
                <td>
                    <div style="background: #acacac;">
                        <?php $image_path = '/upload/admin_siteinfo/202206301105brand.png'; ?>
                        <img src="{{ public_path(). $image_path }}" alt="logo">
                    </div>
                </td>
                <td>
                    <h2>Respond Fitness</h2>
                    <p>Address: {!! $user_siteinfo->address !!}</p>
                    <p>Phone: {{ $user_siteinfo->mobile }}</p>
                    <p>Email: {{ $user_siteinfo->email }}</p>
                    <p><strong>Monthly and Yearly Income</strong></p>
                </td>
            </tr>
        </table>

        <table id="customers">
            <tr>
                <td colspan="2" style="text-align: center;">
                    <h4>Reporting Date: {{ date('d M Y', strtotime($sdate)) }} - {{ date('d M Y', strtotime($edate)) }}</h4>
                </td>
            </tr>
            <tr>
                <td>Total Appointments</td>
                <td>{{ $total_customer }}</td>
            </tr>
            <tr>
                <td>Total Income</td>
                <td>₱ {{ $total_income }}</td>
            </tr>
        </table>
        <br><br>
        <i style="font-size: 10px; float-right;">Print Data : {{ date("d M Y") }}</i>
        <hr style="border: dashed 2px; width:95%; color: #000000; margin-bottom: 50px">

    </body>

    </html>