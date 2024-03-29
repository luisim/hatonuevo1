<!-- Person ledger start -->
<script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
	document.body.style.marginTop="0px";
    window.print();
    document.body.innerHTML = originalContents;
}
</script>


<!-- Person Start -->
<div class="content-wrapper">
	<section class="content-header">
	    <div class="header-icon">
	        <i class="pe-7s-note2"></i>
	    </div>
	    <div class="header-title">
	        <h1><?php echo display('cashflow') ?></h1>
	        <small><?php echo display('cashflow') ?></small>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
	            <li><a href="#"><?php echo display('cashflow') ?></a></li>
	            <li class="active"><?php echo display('cashflow') ?></li>
	        </ol>
	    </div>
	</section>

	<section class="content">

		<div class="row">
            <div class="col-sm-12">
                <div class="column">
                
                  <a href="<?php echo base_url('Cpayment/summaryy')?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('daily_summary')?> </a>

                  <a href="<?php echo base_url('Cpayment/custom_report')?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('custom_report')?> </a>

                  <a href="<?php echo base_url('Cpayment/closing_report')?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('closing_report')?> </a>

                </div>
            </div>
        </div>

		<div class="row">
			<div class="col-sm-12">
		        <div class="panel panel-default">
		            <div class="panel-body"> 
		            	<?php echo form_open('Cpayment/search_datewise',array('class' => 'form-inline', ))?>
		            		<?php $today = date('d-m-Y'); ?>
							<label class="select"><?php echo display('search_by_date') ?>: <?php echo display('from') ?></label>
							<input type="text" name="from_date"  value="<?php echo $today; ?>" class="datepicker form-control"/>
							<label class="select"><?php echo display('to') ?></label>
							<input type="text" name="to_date" value="<?php echo $today; ?>" class="datepicker form-control"/>
	                       
							<button type="submit" class="btn btn-primary"><i class="fa fa-search-plus" aria-hidden="true"></i> <?php echo display('search') ?></button>
							<a  class="btn btn-warning" href="#" onclick="printDiv('printableArea')"><?php echo display('print') ?></a>
						<?php echo form_close()?>            
		            </div>
		        </div>
		    </div>
	    </div>
		
		<div class="row">
		    <div class="col-sm-12">
		        <div class="panel panel-bd lobidrag">
		            <div class="panel-heading">
		                <div class="panel-title">
		                    <h4><?php echo display('cashflow') ?></h4>
		                </div>
		            </div>
		            <div class="panel-body">

						<div id="printableArea" style="margin-left:2px;">
							<div class="text-center">
								{company_info}
								<h3> {company_name} </h3>
								<h4 >{address} </h4>
								{/company_info}
								<h4> <?php echo display('print_date') ?>: <?php echo date("d/m/Y h:i:s"); ?> </h4>
							</div>

			                <div class="table-responsive" style="margin-top: 10px;">
			                    <table class="table table-bordered table-striped table-hover">
			                        <thead>
										<tr>
											<th><?php echo display('sl') ?></th>
											<th class="text-center"><?php echo display('name')?></th>
											<th class="text-center"><?php echo display('account_name')?></th>
											<th class="text-center"><?php echo display('receipt_amount')?></th>
											<th class="text-center"><?php echo display('paid_amount')?></th>
										</tr>
									</thead>
									<?php
										if ($ledger) {
									?>
									<?php foreach ($ledger as $row){?>
									<tbody>
										<tr>
											<td><?php echo $row['sl']; ?></td>
											<td  align="left">
												
							                  <?php echo $row['person_name'];
							                  echo $row['customer_name']; 
							                  echo $row['supplier_name'];
							                  if($row['person_name']==''AND $row['customer_name']==''AND $row['supplier_name']==''){
							                  	echo $row['relation_id'];
							                  }
							                  
							                  ?>
							                </td>

											<td align="left">
				                                <?php  $tran_cat=$row['transection_category'];
				                                if($tran_cat==1){
				                                	echo "supplier";
				                                }elseif($tran_cat==2) {
				                                	echo "customer";
				                                }elseif ($tran_cat==3) {
				                                	echo "Office";
				                                }else{
				                                	echo "Loan";
				                                } 
				                                ?>
											</td>

											<td style="text-align: right;">
											<?php
                                     			$debt=$row['debit'];

											 	$sign=(($position==0)?"$currency":$debt);
												if($debt==0){
													echo '';
												}else{
													echo (($position==0)?"$currency ".number_format($debt, 2, '.', ','):number_format($debt, 2, '.', ',')." $currency");
												}
											?>
											</td>

											<td align="right">
											<?php 
												$sign=(($position==0)?"$currency":$row['credit']);
												$credit=$row['credit'];

												if($credit==0){
													echo '';
												}else{
													echo (($position==0)?"$currency ".number_format($credit, 2, '.', ','):number_format($credit, 2, '.', ',')." $currency");
												}
											?>
											</td>

									</tbody>
									<?php } ?>
									<?php
										}
									?>
									<tfoot>
										<tr  align="right">
											<td colspan="3"  align="right"><b>Total:</b></td>
											<td><b><?php echo (($position==0)?"$currency {subtotalDebit}":"{subtotalDebit} $currency") ?></b></td>

											<td><b><?php echo (($position==0)?"$currency {subtotalCredit}":"{subtotalCredit} $currency") ?></b></td>
										</tr>
									</tfoot>
			                    </table>
			                </div>
			            </div>
		                <div class="text-right"><?php echo $links?></div>
		            </div>
		        </div>
		    </div>
		</div>
	</section>
</div>
<!-- Person ledger End -->

<!-- modal popup script -->
<script type="text/javascript">
   
function report_popup(transection_category)
{
    $.ajax({
            type: "POST",
            url: "<?php echo site_url('Cpayment/today_details');?>",
            data: "transection_category="+transection_category,
            success: function (response) {
            $(".displaycontent").html(response);
              
            }
        });
	}
</script>

<div class="modal fade displaycontent" id="myModal">
<script type="text/javascript">
	function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}

function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  // add a zero in front of numbers<10
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
  t = setTimeout(function() {
    startTime()
  }, 500);
}
startTime();
</script>