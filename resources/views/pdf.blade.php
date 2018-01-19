<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--
Dynamically Auto Generated Page - Do Not Edit
================================================================
Software Name: iBilling - CRM, Accounting and Invoicing Software
Version: 3.3.0
Author: Sadia Sharmin
Website: http://www.ibilling.io/
Contact: sadiasharmin3139@gmail.com
Purchase: http://codecanyon.net/item/ibilling-accounting-and-billing-software/11021678?ref=SadiaSharmin
License: You must have a valid license purchased only from envato(the above link) in order to legally use this Software.
========================================================================================================================
-->


<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>

    <title>Phuleshwor Medical Pasal</title>
    <link rel="manifest" href="http://demo.ibilling.io/ibilling/sysfrm/uploads/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="http://demo.ibilling.io/ibilling/sysfrm/uploads/icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <style>

        * {
            margin: 0;
            padding: 0;
        }

        body {
            font: 14px/1.4 Helvetica, Arial, sans-serif;
        }

        #page-wrap {
            width: 800px;
            margin: 0 auto;
        }

        textarea {
            border: 0;
            font: 14px Helvetica, Arial, sans-serif;
            overflow: hidden;
            resize: none;
        }

        table {
            border-collapse: collapse;
        }

        table td, table th {
            border: 1px solid black;
            padding: 5px;
        }

        #header {
            height: 15px;
            width: 100%;
            margin: 20px 0;
            background: #222;
            text-align: center;
            color: white;
            font: bold 15px Helvetica, Sans-Serif;
            text-decoration: uppercase;
            letter-spacing: 20px;
            padding: 8px 0px;
        }

        #address {
            width: 250px;
            height: 150px;
            float: left;
        }

        #customer {
            overflow: hidden;
        }

        #logo {
            text-align: right;
            float: right;
            position: relative;
            margin-top: 25px;
            border: 1px solid #fff;
            max-width: 540px;
            overflow: hidden;
        }

        #customer-title {
            font-size: 20px;
            font-weight: bold;
            float: left;
        }

        #meta {
            margin-top: 1px;
            width: 100%;
            float: right;
        }

        #meta td {
            text-align: right;
        }

        #meta td.meta-head {
            text-align: left;
            background: #eee;
        }

        #meta td textarea {
            width: 100%;
            height: 20px;
            text-align: right;
        }

        #items {
            clear: both;
            width: 100%;
            margin: 30px 0 0 0;
            border: 1px solid black;
        }

        #items th {
            background: #eee;
        }

        #items textarea {
            width: 80px;
            height: 50px;
        }

        #items tr.item-row td {
            vertical-align: top;
        }

        #items td.description {
            width: 300px;
        }

        #items td.item-name {
            width: 175px;
        }

        #items td.description textarea, #items td.item-name textarea {
            width: 100%;
        }

        #items td.total-line {
            border-right: 0;
            text-align: right;
        }

        #items td.total-value {
            border-left: 0;
            padding: 10px;
        }

        #items td.total-value textarea {
            height: 20px;
            background: none;
        }

        #items td.balance {
            background: #eee;
        }

        #items td.blank {
            border: 0;
        }

        #terms {
            text-align: center;
            margin: 20px 0 0 0;
        }

        #terms h5 {
            text-transform: uppercase;
            font: 13px Helvetica, Sans-Serif;
            letter-spacing: 10px;
            border-bottom: 1px solid black;
            padding: 0 0 8px 0;
            margin: 0 0 8px 0;
        }

        #terms textarea {
            width: 100%;
            text-align: center;
        }

        .delete-wpr {
            position: relative;
        }

        .delete {
            display: block;
            color: #000;
            text-decoration: none;
            position: absolute;
            background: #EEEEEE;
            font-weight: bold;
            padding: 0px 3px;
            border: 1px solid;
            top: -6px;
            left: -22px;
            font-family: Verdana;
            font-size: 12px;
        }
    </style>

</head>

<body>



<div id="page-wrap">

    <br/><br/>
    <button style="padding: 5px" onclick="printDiv('print-content')">Print this page</button>

    <div id="print-content">
        <table width="100%">
           <!--  <tr>
                <td style="border: 0;  text-align: right" width="62%">
                    <div id="logo">
                        @if(!empty($option->logo))
                            <img id="image" src="{{ asset('uploads/content/thumb/' . $option->logo) }}" alt="logo"/>
                        @else
                            <img id="image" src="{{ asset('assets/img/photo-not-found.jpg') }}" height="100px" width="200px" alt="logo"/>
                        @endif <br>
                        {!! !empty($option->company_name) ? $option->company_name ."<br /> Kathmandu, Nepal" : 'Company Name Not Defined' !!}
                        {!! !empty($option->email) ? '<br /> Email: ' .$option->email . '<br />' : '' !!}
                        {!! !empty($option->contact_number) ? 'Phone: ' .$option->contact_number : '' !!}
                    </div>
                </td>
            </tr>
 -->


            <tr>
               <td style="border: 0;" width="62%">
                   Some content

               </td>
            </tr>
        </table>

        <hr>
        <br>

        <div style="clear:both"></div>

        @yield('main-content')

        <br/>
        <br/>
        <br/>

        <span class="span3 pull-right">
            ...............................................<br />
            Signature
        </span>

    </div>

</div>

<script>
    function printDiv(divName) {
         var printContents = document.getElementById(divName).innerHTML;
         var originalContents = document.body.innerHTML;

         document.body.innerHTML = printContents;

        window.print();

         document.body.innerHTML = originalContents;
    }

</script>

</body>

</html>