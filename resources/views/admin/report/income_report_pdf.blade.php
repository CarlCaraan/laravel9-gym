    @php
    $total_income = App\Models\Booking::whereBetween('start_date', [$start_date, $end_date])->where('status', 'Paid')->sum('price');
    $total_customer = App\Models\Booking::whereBetween('start_date', [$start_date, $end_date])->where('status', 'Paid')->count();
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
                background-color: #B88E65;
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
            <thead>
                <tr>
                    <th colspan="5" style="text-align: center;">
                        <h4>Report Date: From {{ date('d M Y', strtotime($sdate)) }} To {{ date('d M Y', strtotime($edate)) }}</h4>
                    </th>
                </tr>
                <tr>
                    <th>SL No</th>
                    <th>Customer Name</th>
                    <th>Appointment Date</th>
                    <th>No of Hours</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>

                @php
                $user_data = App\Models\Booking::whereBetween('start_date', [$start_date, $end_date])->where('status', 'Paid')->get();
                @endphp
                @foreach ($user_data as $key => $data)
                @php
                if ($data->price == 60) {
                $no_hrs = '4 hours';
                } else if ($data->price == 40) {
                $no_hrs = '3 hours';
                } else {
                $no_hrs = '2 hours';
                }
                @endphp

                <tr>
                    <td>{{ ($key+1) }}</td>
                    <td>{{ $data['user']['first_name'] . " " . $data['user']['last_name'] }}</td>
                    <td>{{ date('l - F / d / Y', strtotime($data->start_date)) }}</td>
                    <td>{{ $no_hrs }}</td>
                    <td>₱{{ $data->price }}</td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>Total Appointments</strong>:<br> {{ $total_customer }}</td>
                    <td><strong>Total Income</strong>:<br> ₱ {{ $total_income }}</td>
                </tr>
            </tbody>

        </table>
        <br><br>
        <i style="font-size: 10px; float-right;">Print Data : {{ date("d M Y") }}</i>
        <hr style="border: dashed 2px; width:95%; color: #000000; margin-bottom: 50px">

    </body>

    </html>