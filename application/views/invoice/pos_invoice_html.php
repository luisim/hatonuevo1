<?php
$CI = & get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
?>
<!--its for pos style css start--> 
<style type="text/css">
    BODY, TD
    {
        background-color: #ffffff;
        color: #000000;
        font-family: "Times New Roman", Times, serif;
        font-size: 10pt;
    }

</style>
<!--its for pos style css close--> 
<!-- Printable area start -->
<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        // document.body.style.marginTop="-45px";
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
<!-- Printable area end -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('invoice_details') ?></h1>
            <small><?php echo display('invoice_details') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('invoice') ?></a></li>
                <li class="active"><?php echo display('invoice_details') ?></li>
            </ol>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Alert Message -->
        <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            ?>
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('message');
        }
        $error_message = $this->session->userdata('error_message');
        if (isset($error_message)) {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error_message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('error_message');
        }
        ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd">
                    <div id="printableArea">
                        <div class="panel-body">
                            <div bgcolor='#e4e4e4' text='#ff6633' link='#666666' vlink='#666666' alink='#ff6633' style='margin:0;font-family:Arial,Helvetica,sans-serif;border-bottom:1'>
                                <table border="0" width="40%">
                                    <tr>
                                        <td>

                                            <table border="0" width="100%">
                                                {company_info}
                                                <tr>
                                                    <td align="center" style="border-bottom:2px #333 solid;">
                                                        <span style="font-size: 17pt; font-weight:bold;">
                                                            {company_name}
                                                        </span><br>
                                                        {address}<br>
                                                        {mobile}
                                                    </td>
                                                </tr>
                                                {/company_info}
                                                <tr>
                                                    <td align="center"><b>{customer_name}</b><br>
                                                        <?php if ($customer_address) { ?>
                                                            {customer_address}<br>
                                                        <?php } ?>
                                                        <?php if ($customer_mobile) { ?>
                                                            {customer_mobile}
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center"><nobr>
                                                    <date>
                                                        Date: <?php
                                                        echo date('d-M-Y');
                                                        ?> 
                                                    </date>
                                                </nobr></td>
                                    </tr>
                                    <tr>
                                        <td><strong><?php echo display('invoice_no'); ?> : {invoice_no}</strong></td>
                                    </tr>
                                </table>

                                <table width="100%">
                                    <tr>
                                        <td><?php echo display('sl'); ?></th>
                                        <td><?php echo display('product_name'); ?></td>
                                        <td align="right"><?php echo display('quantity'); ?></td>
                                        <td align="right"><?php echo display('discount'); ?></td>
                                        <td align="right"><?php echo display('rate'); ?></td>
                                        <td align="right"><?php echo display('ammount'); ?></td>
                                    </tr>
                                    {invoice_all_data}
                                    <tr>
                                        <td align="left"><nobr>{sl}</nobr></td>
                                    <td align="left"><nobr>{product_name}- ( {product_model} )</nobr></td>
                                    <td align="right"><nobr>{quantity}</nobr></td>
                                    <td align="right">
                                    <nobr>
                                        <?php echo (($position == 0) ? "$currency {discount_per}" : "{discount_per} $currency") ?>
                                    </nobr>
                                    </td>
                                    <td align="right">
                                    <nobr>
                                        <?php echo (($position == 0) ? "$currency {rate}" : "{rate} $currency") ?>
                                    </nobr>
                                    </td>
                                    <td align="right">
                                    <nobr>
                                        <?php echo (($position == 0) ? "$currency {total_price}" : "{total_price} $currency") ?>
                                    </nobr>
                                    </td>
                                    </tr>
                                    {/invoice_all_data}
                                    <tr>
                                        <td colspan="6" style="border-top:#333 1px solid;"><nobr></nobr></td>
                                    </tr>
<!--                                    <tr>
                                        <td align="left"><nobr></nobr></td>
                                    <td align="right" colspan="4"><nobr>Sub Total</nobr></td>
                                    <td align="right"><nobr>944.00</nobr></td>
                                    </tr>-->
                                    <tr>
                                        <td colspan="6" style="border-top:#333 1px solid;"><nobr></nobr></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><nobr></nobr></td>
                                    <td align="right" colspan="4"><nobr><?php echo display('tax') ?></nobr></td>
                                    <td align="right">
                                    <nobr>
                                        <?php echo (($position == 0) ? "$currency {total_tax}" : "{total_tax} $currency") ?>
                                    </nobr>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td align="left"><nobr></nobr></td>
                                    <td align="right" colspan="4"><nobr><?php echo display('invoice_discount'); ?></nobr></td>
                                    <td align="right"><nobr>
                                        <?php echo (($position == 0) ? "$currency {invoice_discount}" : "{invoice_discount} $currency") ?>
                                    </nobr></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><nobr></nobr></td>
                                    <td align="right" colspan="4"><nobr><?php echo display('total_discount') ?></nobr></td>
                                    <td align="right">
                                    <nobr>
                                        <?php echo (($position == 0) ? "$currency {total_discount}" : "{total_discount} $currency") ?>
                                    </nobr></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" style="border-top:#333 1px solid;"><nobr></nobr></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><nobr></nobr></td>
                                    <td align="right" colspan="4"><nobr><strong><?php echo display('grand_total') ?></strong></nobr></td>
                                    <td align="right"><nobr>
                                        <strong>
                                            <?php echo (($position == 0) ? "$currency {total_amount}" : "{total_amount} $currency") ?>
                                        </strong></nobr></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" style="border-top:#333 1px solid;"><nobr></nobr></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><nobr></nobr></td>
                                    <td align="right" colspan="4"><nobr>
                                        <?php echo display('paid_ammount') ?>
                                    </nobr></td>
                                    <td align="right"><nobr>
                                        <?php echo (($position == 0) ? "$currency {paid_amount}" : "{paid_amount} $currency") ?>
                                    </nobr></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><nobr></nobr></td>
                                    <td align="right" colspan="4"><nobr><?php echo display('due') ?></nobr></td>
                                    <td align="right"><nobr>
                                        <?php echo (($position == 0) ? "$currency {due_amount}" : "{due_amount} $currency") ?>
                                    </nobr></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" style="border-top:#333 1px solid;"><nobr></nobr></td>
                                    </tr>
                                </table>
                                <table width="100%">
                                    <tr>
                                        <!--<td>Receipt  No:1032</td>-->
                                        <td align="right">User: Arafat</td>
                                    </tr>
                                </table>
                                </td>
                                </tr>
                                <tr>
                                </tr>
                                </table>
<!--                                <table background='' bgcolor='#e4e4e4' width='100%' style='padding:20px 0 20px 0' cellspacing='0' border='0' align='center' cellpadding='0'>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table width='620' border='0' align='center' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF' style='border-radius: 5px;'>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <table width='620' border='0' cellspacing='0' cellpadding='0' style='border-bottom:solid 1px #e5e5e5'>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td align='left' valign='top' style='padding:0px 5px 0px 5px'>
                                                                                <table height='146' width='100%' border='0' cellpadding='3' cellspacing='3' style='border-right:solid 1px #e5e5e5'>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td valign='top' style='color:#404041;font-size:12px;padding:0px 5px 0px 5px'>
                                                                                                {company_info}
                                                                                                <address style="margin-top:10px">
                                                                                                    <strong>{company_name}</strong><br>
                                                                                                    {address}<br>
                                                                                                    <abbr><?php echo display('mobile') ?>:</abbr> {mobile}<br>
                                                                                                    <abbr><?php echo display('email') ?>:</abbr> 
                                                                                                    {email}<br>
                                                                                                    <abbr><?php echo display('website') ?>:</abbr> 
                                                                                                    {website}
                                                                                                </address>
                                                                                                {/company_info}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td align='left' valign='top' style='padding:0px 5px 0px 5px'>
                                                                                <table height='146' width='100%' border='0' cellpadding='3' cellspacing='3' >
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td height='16' valign='top' style='color:#404041;font-size:13px;padding:15px 5px 0px 5px'>
                                                                                                <address>  
                                                                                                    <strong>{customer_name} </strong><br>
                                                                                                    <abbr><?php echo display('address') ?>:</abbr>
                                                                                                    <?php if ($customer_address) { ?>
                                                                                                        {customer_address}
                                                                                                    <?php } ?>
                                                                                                    <br>
                                                                                                    <abbr><?php echo display('mobile') ?>:</abbr>
                                                                                                    <?php if ($customer_mobile) { ?>
                                                                                                        {customer_mobile}
                                                                                                    <?php }if ($customer_email) {
                                                                                                        ?>
                                                                                                        <br>
                                                                                                        <abbr><?php echo display('email') ?>:</abbr> 
                                                                                                        {customer_email}
                                                                                                    <?php } ?>
                                                                                                </address>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td align='left' valign='top' style='padding:0px 5px 0px 0px'>
                                                                                <table height='140' width='100%' border='0' cellpadding='3' cellspacing='3'>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td height='10px' valign='top' style='color:#404041;font-size:13px;padding:5px 5px 0px 20px'>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td valign='top' >
                                                                                                <strong><?php echo display('invoice_no') ?>:</strong>
                                                                                                {invoice_no}
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td valign='top'>
                                                                                                <strong><?php echo display('billing_date') ?>:</strong>
                                                                                                {final_date}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td valign='top' style='color:#404041;line-height:16px;padding:25px 20px 0px 20px'>
                                                                <p>
                                                                <section style='position: relative;clear: both;margin: 5px 0;height: 1px;border-top: 1px solid #cbcbcb;margin-bottom: 25px;margin-top: 10px;text-align: center;'>
                                                                    <h3 align='center' style='margin-top: -12px;background-color: #FFF;clear: both;width: 180px;margin-right: auto;margin-left: auto;padding-left: 15px;padding-right: 15px; font-family: arial,sans-serif;'>
                                                                        <span>INVOICE</span>
                                                                    </h3>
                                                                </section>
                                                                </p>			
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style='color:#404041;font-size:12px;line-height:16px;padding:10px 16px 20px 18px'>
                                                                <table width='100%' border='0' cellpadding='0' cellspacing='0' style='border-radius:5px;border:solid 1px #e5e5e5'>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <table width='570' border='0' cellspacing='0' cellpadding='0'>
                                                                                    <tbody>
                                                                                        <tr>

                                                                                            <td width='85' align='center' style='color:#404041;font-size:12px;line-height:16px;border-bottom:solid 1px #e5e5e5'>
                                                                                                <strong><?php echo display('sl') ?></strong>
                                                                                            </td>

                                                                                            <td width='85' align='right' style='color:#404041;font-size:12px;line-height:16px;border-bottom:solid 1px #e5e5e5'>
                                                                                                <strong><?php echo display('product_name') ?></strong>
                                                                                            </td>
                                                                                            <td width='60' align='right' style='color:#404041;font-size:12px;line-height:16px;padding:5px 10px 3px 5px;border-bottom:solid 1px #e5e5e5'>
                                                                                                <strong><?php echo display('quantity') ?></strong>
                                                                                            </td>
                                                                                            <td width='60' align='right' style='color:#404041;font-size:12px;line-height:16px;padding:5px 10px 3px 5px;border-bottom:solid 1px #e5e5e5'>
                                                                                                <strong><?php echo display('discount') ?></strong>
                                                                                            </td>	
                                                                                            <td width='60' align='right' style='color:#404041;font-size:12px;line-height:16px;padding:5px 10px 3px 5px;border-bottom:solid 1px #e5e5e5'>
                                                                                                <strong><?php echo display('rate') ?></strong>
                                                                                            </td>
                                                                                            <td width='60' align='right' style='color:#404041;font-size:12px;line-height:16px;padding:5px 10px 3px 5px;border-bottom:solid 1px #e5e5e5'>
                                                                                                <strong><?php echo display('ammount') ?></strong>
                                                                                            </td>
                                                                                        </tr>
                                                                                        {invoice_all_data}
                                                                                        <tr>
                                                                                            <td width='60' align='center' valign='top' style='color:#404041;font-size:12px;line-height:16px;border-bottom:dashed 1px #e5e5e5'>
                                                                                                {sl}
                                                                                            </td>
                                                                                            <td width='60' align='right' valign='top' style='color:#404041;font-size:12px;line-height:16px;border-bottom:dashed 1px #e5e5e5'>
                                                                                                {product_name} - ({product_model})
                                                                                            </td>
                                                                                            <td width='60' align='right' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;border-bottom:dashed 1px #e5e5e5'>
                                                                                                {quantity}
                                                                                            </td>
                                                                                            <td width='60' align='right' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;border-bottom:dashed 1px #e5e5e5'>
                                                                                                <?php echo (($position == 0) ? "$currency {discount_per}" : "{discount_per} $currency") ?>
                                                                                            </td>
                                                                                            <td width='60' align='right' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;border-bottom:dashed 1px #e5e5e5'>
                                                                                                <?php echo (($position == 0) ? "$currency {rate}" : "{rate} $currency") ?>
                                                                                            </td>
                                                                                            <td width='60' align='right' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;border-bottom:dashed 1px #e5e5e5'>
                                                                                                <?php echo (($position == 0) ? "$currency {total_price}" : "{total_price} $currency") ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        {/invoice_all_data}
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>

                                                        <tr align='left' >
                                                            <td style='color:#404041;font-size:12px;line-height:16px;padding:10px 16px 20px 18px'>
                                                                <table width='0' border='0' align='left' cellpadding='0' cellspacing='0'>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td >
                                                                                <p><strong>{invoice_details}</strong></p>
                                                                            </td>
                                                                        </tr>	
                                                                    </tbody>
                                                                </table>

                                                                <table width='0' border='0' align='right' cellpadding='0' cellspacing='0'>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td width='0' align='left' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:15px 0px 3px 0px'>
                                                                                <strong><?php echo display('total_discount') ?></strong> 
                                                                            </td>
                                                                            <td width='0' align='right' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:15px 5px 3px 5px'>
                                                                                <?php echo (($position == 0) ? "$currency {total_discount}" : "{total_discount} $currency") ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width='0' align='left' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:15px 0px 3px 0px'>
                                                                                <strong><?php echo display('tax') ?>:</strong> 
                                                                            </td>
                                                                            <td width='0' align='right' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:15px 5px 3px 5px'>
                                                                                <?php echo (($position == 0) ? "$currency {total_tax}" : "{total_tax} $currency") ?>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td align='left' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 0px 3px 0px'>
                                                                                <strong><?php echo display('grand_total') ?>:</strong>
                                                                            </td>
                                                                            <td width='62' align='right' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px'>
                                                                                <?php echo (($position == 0) ? "$currency {total_amount}" : "{total_amount} $currency") ?>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td align='left' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 0px 3px 0px;border-bottom:solid 1px #999999'>
                                                                                <strong><?php echo display('paid_ammount') ?> :</strong>
                                                                            </td>
                                                                            <td width='62' align='right' valign='top' style='color:#404041;font-size:12px;line-height:16px;padding:5px 5px 3px 5px;border-bottom:solid 1px #999999'>
                                                                                <?php echo (($position == 0) ? "$currency {paid_amount}" : "{paid_amount} $currency") ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align='left' valign='bottom' style='color:#404041;font-size:13px;line-height:16px;padding:5px 0px 3px 0px'>
                                                                                <strong><?php echo display('due') ?> :</strong>
                                                                            </td>
                                                                            <td width='62' align='right' valign='bottom' style='color:#339933;font-size:13px;line-height:16px;padding:5px 5px 3px 5px'>
                                                                                <strong><?php echo (($position == 0) ? "$currency {due_amount}" : "{due_amount} $currency") ?></strong>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>


                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>-->

                            </div>


                        </div>
                    </div>

                    <div class="panel-footer text-left">
                        <a  class="btn btn-danger" href="<?php echo base_url('Cinvoice'); ?>"><?php echo display('cancel') ?></a>
                        <a  class="btn btn-info" href="#" onclick="printDiv('printableArea')"><span class="fa fa-print"></span></a>

                    </div>
                </div>
            </div>
        </div>
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->