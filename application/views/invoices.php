<?php
$sess = $this->session->userdata('order')[0];
$invoice_no = $sess->id;
$purchDate = $sess->u_order_date;
$purchDate = date('F d, Y', strtotime($purchDate));
// $purchDate = implode("/",$purchDate);

// $purchDate = date_format( $purchDate,'F d,d');
$items = $this->session->userdata('order_item');
// print_r($items);
// exit;

$totalAmount = 0;

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    
    <style>
    .invoice-box {
        max-width: 700px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.heading-item td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                       <tr>
                            <td class="title">
                                <img src="<?php echo base_url(); ?>assets/user/images/logo.jpg" style="width:100%; max-width:250px;">
                            </td>
                            <td></td>
                            <td></td>
                            <td align="right" style="width: 30%;">
                                Invoice #: <?php echo $invoice_no; ?><br>
                                Purchase: <?php echo $purchDate; ?><br>
                            </td>
                        </tr>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                        <tr>
                            <td>
                                <?php echo $sess->delivery_address; ?>
                            </td>
                            <td></td>
                            <td></td>
                            <td align="right" style="width: 30%;">
                                Paragon Corp.<br>
                                John Doe<br>
                                paragon@gmail.com
                            </td>
                        </tr>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                <td></td>
                <td></td>
                <td align="right" style="width: 30%;">
                    Check #
                </td>
            </tr>
            
            <tr class="details" >
                <td>
                    Cash
                </td>
                <td></td>
                <td></td>
                <td align="right" style="width: 30%;">
                    1000
                </td>
            </tr>
            <tr class="heading-item">
                <td style="width:30%">
                    Item
                </td>
                <td style="text-align:center;">
                    Qty
                </td>
                <td style="text-align:center;">
                    Price
                </td>
                <td align="right" style="width: 30%;">
                    Total
                </td>
            </tr>
            <?php foreach ($items as $item) { ?>
            <tr class="item">
                <td>
                    <?php echo $item->item_name; ?>
                </td>
                <td style="text-align:center;">
                    <?php echo $item->item_qty; ?>
                </td>
                <td style="text-align:center;" style="width:100px;">
                    <span style="font-family: DejaVu Sans; sans-serif;">&#8377; </span><?php echo $item->item_price; ?>
                </td>
                <td align="right" style="width: 30%;">
                    <span style="font-family: DejaVu Sans; sans-serif;">&#8377; </span><?php 
                        $Total = $item->item_price*$item->item_qty;
                        $totalAmount += $Total;
                        echo $Total; ?>
                </td>
            </tr>
            <?php } ?>
            <!-- <tr class="item">
                <td>
                    Hosting (3 months)
                </td>
                <td></td>
                <td>
                    $75.00
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                    Domain name (1 year)
                </td>
                <td></td>
                <td >
                    $10.00
                </td>
            </tr> -->
            
            <tr class="total">
                <td></td>
                <td style="border-top: 0px solid #eee !important;"></td>
                <td></td>
                <td style="border-top: 2px solid #eee !important; text-align:right;width: 30%;">
                   Total: <span style="font-family: DejaVu Sans; sans-serif;">&#8377; </span><?php 
                   echo $totalAmount;
                   ?>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
<?php //exit; ?>