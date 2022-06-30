<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
</head>
<style>
    #invoice-POS {
        box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        padding: 2mm;
        margin: 0 auto;
        width: 150mm;
        background: #fff;
    }

    ::selection {
        background: #f31544;
        color: #fff;
    }

    ::moz-selection {
        background: #f31544;
        color: #fff;
    }

    h1 {
        font-size: 1.5em;
        color: #222;
    }

    h2 {
        font-size: 0.9em;
    }

    h3 {
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
    }

    p {
        font-size: 0.7em;
        color: #666;
        line-height: 1.2em;
    }

    #top,
    #mid,
    #bot {
        /* Targets all id with 'col-' */
        border-bottom: 1px solid #eee;
    }

    #top {
        min-height: 100px;
    }

    #mid {
        min-height: 80px;
    }

    #bot {
        min-height: 50px;
    }

    #top .logo {
        /*float: left; */
        height: 60px;
        width: 60px;
        background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
        background-size: 60px 60px;
    }

    .clientlogo {
        float: left;
        height: 60px;
        width: 60px;
        background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
        background-size: 60px 60px;
        border-radius: 50px;
    }

    .info {
        display: block;
        /*float:left; */
        margin-left: 0;
    }

    .title {
        float: right;
    }

    .title p {
        text-align: right;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        /*padding: 5px 0 5px 15px; */
        /*border: 1px solid #EEE */
    }

    .tabletitle {
        /*padding: 5px; */
        font-size: 0.5em;
        background: #eee;
    }

    .service {
        border-bottom: 1px solid #eee;
    }

    .item {
        width: 24mm;
    }

    .itemtext {
        font-size: 0.5em;
    }

    #legalcopy {
        margin-top: 5mm;
    }
</style>

<body>
    <div id="invoice-POS">
        <center id="top">
            <div style="background: #acacac;">
                <?php $image_path = '/upload/admin_siteinfo/202206301105brand.png'; ?>
                <img src="{{ public_path(). $image_path }}" alt="logo">
            </div>
            <!-- <div class="logo"></div> -->
            <div class="info">
                <h2>Respond Fitness</h2>
            </div>
            <!--End Info-->
        </center>
        <!--End InvoiceTop-->

        <div id="mid">
            <div class="info">
                <h2>Contact Info</h2>
                <p>
                    Address : street city, state 0000</br>
                    Email : samgyup@fitness.com</br>
                    Phone : +63 9559 16 8806</br>
                </p>
            </div>
        </div>
        <!--End Invoice Mid-->

        <div id="bot">

            <div id="table">
                <table>
                    <tr class="tabletitle">
                        <td class="item">
                            <h2>First Name</h2>
                        </td>
                        <td class="item">
                            <h2>Last Name</h2>
                        </td>
                        <td class="item">
                            <h2>Email Address</h2>
                        </td>
                        <td class="Rate">
                            <h2>Appointment Date</h2>
                        </td>
                        <td class="Rate">
                            <h2>Start Date</h2>
                        </td>
                    </tr>

                    <tr class="service">
                        <td class="tableitem">
                            <p class="itemtext">{{ $details['user']['first_name'] }}</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext">{{ $details['user']['last_name'] }}</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext">{{ $details['user']['email'] }}</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext">{{ date('l - F / d / Y', strtotime($details->start_date)) }}</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext"> {{ date('h:i A', strtotime($details->start_date)) }}</p>
                        </td>
                    </tr>

                    <tr class="tabletitle">
                        <td></td>
                        <td class="Rate">
                            <h2>tax</h2>
                        </td>
                        <td class="payment">
                            <h2>₱0.00</h2>
                        </td>
                    </tr>


                    <tr class="tabletitle">
                        <td></td>
                        <td class="Rate">
                            <h2>Total</h2>
                        </td>
                        <td class="payment">
                            <h2>{{ $details->price }}</h2>
                        </td>
                    </tr>

                </table>
            </div>
            <!--End Table-->

            <div id="legalcopy">
                <p class="legal"><strong>Thank you for your business!</strong>  Payment is expected within 31 days; please process this invoice within that time. There will be a 5% interest charge per month on late invoices.
                </p>
            </div>

        </div>
        <!--End InvoiceBot-->
    </div>
    <!--End Invoice-->
</body>

</html>