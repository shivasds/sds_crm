<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('inc/admin_header'); 
    if(!$this->session->userdata('permissions') && $this->session->userdata('permissions')=='' ) {
    ?>

    <style type="text/css">
    .alrtMsg{padding-top: 50px;}
    .alrtMsg i {
        font-size: 60px;
        color: #f1c836;
    }
    </style>
    <div class="container"> 
        <div class="row"> 
            <div class="text-center alrtMsg">
                <i class="fa fa-exclamation-triangle"></i>
                <h3>You Do Not have permission as of now. Please contact your Administration and Request for Permission.</h3>
            </div>
        </div>
    </div>
    <?php
}


    ?>
<body>
	 <div class="se-pre-con"></div>
   <div class="page-container" style="height: 1000px;">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<div class="header-section">
						<!--menu-right-->
						<div class="top_menu">
						        <!--<div class="main-search">
											<form>
											   <input type="text" value="Search" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Search';}" class="text"/>
												<input type="submit" value="">
											</form>
									<div class="close"><img src="<?php echo base_url()?>assets/images/cross.png" /></div>
								</div>
									<div class="srch"><button></button></div>
									<script type="text/javascript">
										 $('.main-search').hide();
										$('button').click(function (){
											$('.main-search').show();
											$('.main-search text').focus();
										}
										);
										$('.close').click(function(){
											$('.main-search').hide();
										});
									</script>
							<!--/profile_details-->
								<div class="profile_details_left">
									<?php $this->load->view('notification');?>
							</div>
							<div class="clearfix"></div>	
							<!--//profile_details-->
						</div>
						<!--//menu-right-->
					<div class="clearfix"></div>
				</div>
					<!-- //header-ends -->
						<div class="outter-wp">
								<!--custom-widgets-->
												
<style>
	@media screen and (min-width: 768px) {
		modal_
		.modal-dialog  {
			width:900px;
		}
	}
	.form-group input[type="checkbox"] {
		display: none;
	}
	.form-group input[type="checkbox"] + .btn-group > label span {
		width: 20px;
	}
	.form-group input[type="checkbox"] + .btn-group > label span:first-child {
		display: none;
	}
	.form-group input[type="checkbox"] + .btn-group > label span:last-child {
		display: inline-block;   
	}
	.form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
		display: inline-block;
	}
	.form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
		display: none;   
	}
	tr.highlight_past td.due_date{
		background-color: #cc6666 !important;
	}
	tr.highlight_now td.due_date{
		background-color: #e4b13e !important;
	}
	tr.highlight_future td.due_date{
		background-color: #65dc68 !important;
	}
	#history_table td {
		border: 1px solid #aaa;
		padding: 5px
	}
</style>
<script>

</script>
<div class="container" style="  margin-left: 0px;">
	<div class="page-header">
		<h1 style=" margin-left: 20px;"><?php echo $heading; ?></h1>
	</div>
	<form method="POST" action ="search_callback" >
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="row">
			<div class="col-xs-11 col-sm-4 col-md-4 form-group" id="filtersize">
				<label for="emp_code">Search type:</label>
				<select  class="form-control"  id="search_type" name="type" required="required" >
					<option value="name" <?php if($this->session->userdata("type")=="name") echo 'selected' ?>>Name</option>
					<option value="contact" <?php if(($this->session->userdata("type"))=="contact") echo 'selected' ?>>Contact No</option>
					<option value="email" <?php if(($this->session->userdata("type"))=="email") echo 'selected' ?>>Email Id</option>
					<option value="project" <?php if(($this->session->userdata("type"))=="project") echo 'selected' ?>>Project</option>
				</select>
				<label></label>
			</div>
			<div class="col-xs-11 col-sm-4 col-md-4 form-group">
				<label for="email">Enter Search key:</label>
				<input type="text" class="form-control" id="search_term" name="query" placeholder="Search key" value="<?php //echo $this->session->userdata("query"); ?>" required>
			</div>
			<div class="col-xs-11 col-sm-4 col-md-4 form-group">
				<button type="submit" id="search" style="margin-top:25px;" class="btn btn-success btn-block">Search</button>
			</div>
		</div>
	</div>
	</form>
</div>
<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
 ?>
<div class="container">
<table id="example" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%"  >
	<thead>
		<tr>
			<th>No</th>
			<th>Contact Name</th> 
			<th>Contact No</th>
			<th>Email</th>
			<th>Project</th>
			<th>Lead Source</th>
			<th>Lead Id</th> 
			<th>Advisor</th> 
			<th>Sub-Source</th>
			<th>Due date</th>
			<th>Status</th>
			<th>Date Added</th>
			<th>Last Update</th>
			<th>Action</th>
		</tr>
	</thead> 
	<tbody id="main_body">
		<?php $i= 1;
		if ($result) {
		if(count($result)>0){
		foreach ($result as $data) {
			$duedate = explode(" ", $data->due_date);
        	$duedate = $duedate[0]; ?>
			<tr id="row<?php echo $i ?>" <?php if(strtotime($duedate)<strtotime('today')){?> class="highlight_past" <?php }elseif(strtotime($duedate) == strtotime('today')) {?> class="highlight_now" <?php }elseif(strtotime($duedate)>strtotime('today')){ ?> class="highlight_future" <?php } ?>>
				<td><?php echo $i; ?></td>
				<td><?php echo $data->name; ?></td>
				<td><?php echo $data->contact_no1 ?></td>
				<td><?php echo $data->email1; ?></td>
				<td><?php echo $data->project_name; ?></td>
				<td><?php echo $data->lead_source_name; ?></td>
				<td><?php echo $data->leadid; ?></td>
				<td><?php echo $data->user_name; ?></td>
				<td><?php echo $data->broker_name; ?></td>
				<td class="due_date"><?php echo $data->due_date; ?></td>
				<td><?php echo $data->status_name; ?></td>
				<td><?php echo $data->date_added; ?></td>
				<td><?php echo $data->last_update; ?></td>
				<td>
					<table>
						<tr>
							<td>
								<a onclick="edit('<?php echo $data->id; ?>')" data-toggle="modal" data-target="#modal_edit">
									<i class="fa fa-home fa-2x"  title="Detail" style="color:#ff1122; font-size:21px;padding-right:7px;" aria-hidden="true"></i>
								</a>
							</td>
							<td>
								<i class="fa fa-keyboard-o fa-2x" onclick="abc()" title="Notes" style="color:#ff1122; font-size:21px;padding-right:7px;" aria-hidden="true"></i>
							</td>
							<td>
								<a onclick="soft_delete('<?php echo $data->id; ?>','<?php echo $i; ?>')" data-toggle="modal">
									<i title="Delete" class="fa fa-trash-o fa-2x" style="color:#ff1122; font-size:21px;padding-right:7px; color:#225511;"  aria-hidden="true"></i>
								</a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		<?php $i++; } } }
		  else
                {
                    echo "<tr><td colspan=13 align=center>No Data Found</td></tr>";
                }?>
	</tbody>
</table>
</div>
<div class="modal fade" id="modal_edit"  role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Call back details</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-3 form-group">
						<input type="hidden" id="mhid">
						<label for="emp_code">Dept:</label>
						<select  class="form-control"  id="m_dept" name="m_dept" required >
							<option value="">Select</option>
							<?php $all_department=$this->common_model->all_active_departments();
							foreach($all_department as $department){ ?>
								<option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
							<?php }?>               
						</select>
					</div>
					<div class="col-md-3 form-group">
						<label for="name">Name:</label>
						<input type="text" class="form-control" id="m_name1" name="m_name1" placeholder="Name" required="required">
					</div>
					<div class="col-md-3 form-group">
						<label for="contact_no1">Contact No:</label>
						<input type="text" class="form-control" id="m_contact_no1" name="m_contact_no1" placeholder="Contact No">
					</div>
					<div class="col-md-3 form-group">
						<label for="name">Contact No 2:</label>
						<input type="text" class="form-control" id="m_contact_no2" name="m_contact_no2" placeholder="Contact No">
					</div>
					<div class="col-md-3 form-group">
						<label for="assign">Call back type:</label>
						<select  class="form-control"  id="m_callback_type" name="m_callback_type" required="required" >
							<option value="">Select </option>
							<?php $all_callback_types=$this->common_model->all_active_callback_types();
							foreach($all_callback_types as $callback_type){ ?>
								<option value="<?php echo $callback_type->id; ?>"><?php echo $callback_type->name; ?></option>
							<?php }?>                 
						</select> 
					</div>
					<div class="col-md-3 form-group">
						<label for="email">Email:</label>
						<input type="email" class="form-control" id="m_email1" name="m_email1" placeholder="Email">
					</div>   
					<div class="col-md-3 form-group">
						<label for="email">Email2:</label>
						<input type="email" class="form-control" id="m_email2" name="m_email2" placeholder="email">
					</div>
					<div class="col-md-3 form-group">
						<label for="emp_code">Project:</label>
						<select  class="form-control"  id="m_project" name="m_project" required="required" >
							<option value="">Select</option>
							<?php $projects= $this->common_model->all_active_projects(); 
							foreach( $projects as $project){ ?>
								<option value="<?php echo $project->id ?>"><?php echo $project->name ?></option>
							<?php }?>               
						</select>
					</div>
					<div class="col-md-3 form-group">
						<label for="assign">Lead Source:</label>
						<select  class="form-control"  id="m_lead_source" name="m_lead_source" required="required" >
							<option value="">Select</option>
							<?php $lead_source= $this->common_model->all_active_lead_sources(); 
							foreach( $lead_source as $source){ ?>
								<option value="<?php echo $source->id ?>"><?php echo $source->name ?></option>
							<?php } ?>             
						</select>
					</div>
					<div class="col-md-3 form-group">
						<label for="leadId">Lead Id:</label>
						<input type="text" class="form-control" id="m_leadId" name="m_leadId" placeholder="Lead Id">
					</div>
					<div class="col-md-3 form-group">
						<label for="assign">Status:</label>
						<select  class="form-control"  id="m_status" onchange="status(this.value)" name="m_status" required="required" >
							<option value="">Select</option>
							<?php $statuses= $this->common_model->all_active_statuses(); 
							foreach( $statuses as $status){ ?>
								<option value="<?php echo $status->id; ?>"><?php echo $status->name ?></option>
							<?php } ?>           
						</select>
					</div>
					<div class="col-md-3 form-group">
						<label for="assign">Assign To:</label>
						<select  class="form-control"  id="m_user_name" name="m_user_name" required="required" >
							<option value="">Select</option>
							<?php $all_user= $this->user_model->all_users("type in (1,2,3,4)"); 
							foreach( $all_user as $user){ 
								switch ($user->type) {
									case '1':
										$role = "User";
										break;

									case '2':
										$role = "Manager";
										break;

									case '3':
										$role = "VP";
										break;
									
									case '4':
										$role = "Director";
										break;
								}
								?>
								<option value="<?php echo $user->id ?>"><?php echo $user->first_name." ".$user->last_name." ($role)"; ?></option>
							<?php } ?>              
						</select>
					</div>
					<div id="abc" hidden class="row">
						<div class="col-sm-6 form-group">
							<label for="client_name">Client name:</label>
							<input type="text" class="form-control" id="c_client_name" name="client_name" placeholder="Client name">
						</div>
						<div class="col-sm-6 form-group">
							<label for="email">Client Email Id:</label>
							<input type="email" class="form-control" id="c_client_email" name="client_email" placeholder="Client Email Id">
						</div>
						<div class="col-sm-6 form-group">
							<label for="email">Site visit date:</label>
							<input type="date" class="form-control" id="c_client_visit" name="email2" placeholder="Site visit date" onchange="update_client_note();">
						</div>
						<div class="col-sm-6 form-group">
							<label for="email">Site Assign by:</label>
							<input type="text" class="form-control" onblur="le()" id="c_assign_by" name="assign_by" placeholder="Site Assign by" onchange="update_client_note();">
						</div>
						<div class="col-sm-6 form-group">
							<label for="email">Relation ship Manager:</label>
							<input type="text" class="form-control" id="c_relationShipManager" name="c_relationShipManager" placeholder="Relation ship Manager" onchange="update_client_note();">
						</div>
						<div class="col-sm-6 form-group">
							<label for="email">Subject:</label>
							<input type="text" class="form-control" id="c_subject" name="email2" value="Thank you For the Site Visit" placeholder="Subject">
						</div>
						<div class="col-sm-12 form-group">
							<label for="comment">Mail Box:</label>
							<textarea class="form-control" name="notesClient" id="c_notesClient" rows="18" id="comment">

							Greetings From Seconds Digital.

							With reference to your site visit on  assisted by Mr. abhishek from Seconds Digital, we thank you for giving us an opportunity to serve you in searching your dream home.  At FBP it is our endeavour to help you with all the possible Property options which will suit your requirement. Mr.  from FBP will be at your service. He/she will be there to assist you in searching your dream home.
							
							1. Home search - Assisting and helping you find your dream home suiting your requirements by giving you info on market trends, legalities, site visit assistance etc.

							2. Home loan Assistance - We will take away your pain of running around the banks to get your loan approved by giving doorstep service of bankers of your choice at your place.

							3. Property Purchase Assistance - Ensuring that your home buying becomes a pleasant experience our Relationship Manager will be there throughout the process Of documentation.

							4. Post sales Service – This is what differentiates us from others. We will be there for all possible help and guidance till you move into your home.

							5. Interior Services - We are tied With best interior designers in the city who give the best designs and execute them at a competitive price.

							6. Rental Services - Need to rent your house Or searching for good house on rent do not worry try Seconds Digital rental services. Our professional and need based approach will ensure that you get right home/tenant without much hassles.

							For any escalations/ complaints please write to admin@leads.com

							Regards

							Team Seconds Digital Services Pvt Ltd


							</textarea>
						</div>
						<div class="col-sm-12 form-group" >
							<div class="alert alert-success" id="mail_success" style="display:none">
								<strong>Success!</strong> Email sent successfully.
							</div>
							<button type="button" style="float: right;" class="btn btn-success" onclick="sendMail()" >Send</button>
						</div>
					</div>
				</div>

				<div id="dead" class="row" hidden>
					<div class="col-sm-12 form-group">
						<label for="comment">Reason of dead:</label>
						<textarea class="form-control" name="notes" id="notes" rows="3" id="reasonOfDead"></textarea>
					</div>
				</div>

				<div id="close" class="row" hidden>
					<div class="col-sm-6 form-group">
						<label for="email">Advisor one:</label>
						<select  class="form-control"  id="c_seniorAdvisor" name="c_seniorAdvisor" required="required" >
                            <option value="">Select</option>
                            <?php $all_user= $this->user_model->all_users("type in (1,2)"); 
                            foreach( $all_user as $user){ 
                                switch ($user->type) {
                                    case '1':
                                        $role = "User";
                                        break;

                                    case '2':
                                        $role = "Manager";
                                        break;

                                }
                                ?>
                                <option value="<?php echo $user->id ?>"><?php echo $user->first_name." ".$user->last_name." ($role)"; ?></option>
                            <?php } ?>               
                        </select>
					</div>
					<div class="col-sm-6 form-group">
						<label for="email">Advisor two:</label>
            			<select  class="form-control"  id="c_secondAdvisor" name="c_secondAdvisor" required="required" >
                            <option value="">Select</option>
                            <?php $all_user= $this->user_model->all_users("type in (1,2)"); 
                            foreach( $all_user as $user){ 
                                switch ($user->type) {
                                    case '1':
                                        $role = "User";
                                        break;

                                    case '2':
                                        $role = "Manager";
                                        break;

                                }
                                ?>
                                <option value="<?php echo $user->id ?>"><?php echo $user->first_name." ".$user->last_name." ($role)"; ?></option>
                            <?php } ?>               
                        </select>
					</div>
					<div class="col-sm-6 form-group">
						<label for="email">Booking Name:</label>
						<input type="text" class="form-control" id="c_bkngName" name="email2" placeholder="Booking Name">
					</div>
					<div class="col-sm-6 form-group">
						<label for="email">Booking Month:</label>
						<input type="text" class="form-control" id="c_bkngMnth" name="email2" placeholder="Booking Date">
					</div>
					<div class="col-sm-6 form-group">
						<label for="email">Date of closure:</label>
						<input type="date" class="form-control" id="c_dateofClosure" name="email2" placeholder="Date of closure">
					</div>
					<div class="col-sm-6 form-group">
						<label for="email">Customer name:</label>
						<input type="text" class="form-control" id="c_customerName" name="email2" placeholder="Customer Name">
					</div>
					<div class="col-sm-6 form-group">
                        <label for="email">Sub Source:</label>
                        <select  class="form-control"  id="c_subSource" name="c_subSource" disabled>
                            <option value="">Select</option>
                            <?php $brokers= $this->common_model->all_active_brokers(); 
                            foreach( $brokers as $broker){ ?>
                                <option value="<?php echo $broker->id; ?>"><?php echo $broker->name ?></option>
                            <?php } ?>               
                        </select>
                    </div>
					<div class="col-sm-6 form-group">
						<label for="email">Project:</label>
						<select  class="form-control"  id="c_projectName" name="m_project" required="required" >
							<option value="">Select</option>
							<?php $projects= $this->common_model->all_active_projects(); 
		                    foreach( $projects as $project){ ?>
		                        <option value="<?php echo $project->id ?>"><?php echo $project->name ?></option>
		                    <?php }?>               
						</select>
					</div>
					<div class="col-sm-6 form-group">
						<label for="email">Sqft Sold:</label>
						<input type="text" class="form-control" onblur="calculateTotalCost()" id="c_sqftSold" name="email2" placeholder="Sqft Sold">
					</div>
					<div class="col-sm-6 form-group">
						<label for="email">PLC Charges:</label>
						<input type="text" class="form-control"  onblur="calculateTotalCost()" id="c_plcCharge" name="email2" placeholder="PLC charges">
					</div>
					<div class="col-sm-6 form-group">
						<label for="email">Floor Rise:</label>
						<input type="text" class="form-control"  onblur="calculateTotalCost()" id="c_floorRise" name="email2" placeholder="Floor Rise">
					</div>
					<div class="col-sm-6 form-group">
						<label for="email">Basic Cost:</label>
						<input type="text" class="form-control"  onblur="calculateTotalCost()" id="c_basicCost" name="email2" placeholder="Basic Cost">
					</div>
					<div class="col-sm-6 form-group">
						<label for="email">Other Cost:</label>
						<input type="text" class="form-control"  onblur="calculateTotalCost()" id="c_otherCost" name="email2" placeholder="Other Cost">
					</div>
					<div class="col-sm-6 form-group">
						<label for="email">Car Park:</label>
						<input type="text" class="form-control"  onblur="calculateTotalCost()" id="c_carPark" name="email2" placeholder="Car Park">
					</div>
					<div class="col-sm-6 form-group">
						<label for="email">Total Cost:</label>
						<input type="text" class="form-control"   id="c_totalCost" name="email2" placeholder="Total Cost">
					</div>

					<div class="col-sm-6 form-group">
						<label for="email">Commission(%):</label>
						<input type="text" class="form-control" onblur="calculateGrossRevenue()"  id="c_comission" name="email2" placeholder="Commission">
					</div>

					<div class="col-sm-6 form-group">
						<label for="email">Gross Revenue:</label>
						<input type="text" class="form-control" id="c_grossRevenue" name="email2" placeholder="Gros Revenue">
					</div>
					<div class="col-sm-6 form-group">
						<label for="email">Cashback:</label>
						<input type="text" class="form-control" onblur="calculateNetRevenue()"  id="c_cashBack" name="email2" placeholder="Cash Back">
					</div>
					<div class="col-sm-6 form-group">
						<label for="email">Sub broker amount:</label>
						<input type="text" class="form-control" onblur="calculateNetRevenue()"  id="c_subBrokerAmo" name="email2" placeholder="Sub Broker amount">
					</div>
					<div class="col-sm-6 form-group">
						<label for="email">Net Revenue:</label>
						<input type="text" class="form-control" id="c_netRevenue" name="email2" placeholder="Net Revenue">
					</div>
					<div class="col-sm-6 form-group">
						<label for="email">Share of advisor 1:</label>
						<input type="text" class="form-control" onblur="calculateAdvisorShare(2)" id="c_shareAdvisor1" name="email2" placeholder="Share of advisor 1">
					</div>
					<div class="col-sm-6 form-group">
						<label for="email">Share of advisor 2:</label>
						<input type="text" class="form-control" onblur="calculateAdvisorShare(1)" id="c_shareAdvisor2" name="email2" placeholder="Share of advisor 2">
					</div>

					<div class="col-sm-6 form-group">
						<label for="email">Estimated month of invoice:</label>
						<input type="text" class="form-control" id="c_estMonthofInvoice" name="email2" placeholder="Estimated month of invoice">
					</div>

					<div class="col-sm-6 form-group">
						<label for="email">Agreement Status:</label>
						<input type="text" class="form-control" id="c_agrmntStatus" name="email2" placeholder="Agreement Status">
					</div>

					<div class="col-sm-6 form-group">
						<label for="email">Project Type:</label>
						<input type="text" class="form-control" id="c_projectType" name="email2" placeholder="Project Type">
					</div>
				</div>

				<div class="row">

					<div class="col-sm-6 form-group">
						<label for="comment">Preview Callbacks:</label>
						<textarea class="form-control" name="notes" id="previous_callback1" rows="3" id="comment" readonly></textarea>
					</div>
					<div class="col-sm-6 form-group">
						<label for="comment">Current Callbacks:</label>
						<textarea class="form-control" name="notes" rows="3" id="current_callback1" name="current_callback1" onblur="curr(this.value)"></textarea>
					</div>
					<div class="col-md-6 form-group">
						<input type="checkbox" name="fancy-checkbox-success" onclick="reassignDate()"  id="fancy-checkbox-success" autocomplete="off" />
						<div class="btn-group">
							<label for="fancy-checkbox-success" class="btn btn-success">
								<span class="glyphicon glyphicon-ok"></span>
								<span> </span>
							</label>
							<label for="fancy-checkbox-success" class="btn btn-default active">
							ReAssign To Another Date 
							</label>
						</div>
						<div id="reDate" hidden >
							<div class="row">
								<div class="col-sm-12 form-group" >
									<label for="leadId">Date:</label>
									<input type="date" class="form-control" id="reassign_date" name="email2" placeholder="Date">
								</div>
								<div class="col-sm-12 form-group" >
									<label for="leadId">Time:</label>
									<input type="time" id="reassign_time" name="daterange" value=""/>
								</div>
							<div>
						</div>
					</div>
					<div class="col-md-6 form-group">
						<input type="checkbox" name="fancy-checkbox-info" onclick="clientEmail()"  id="fancy-checkbox-info" autocomplete="off" />
						
						<div class="btn-group">
							<label for="fancy-checkbox-info" class="btn btn-info">
								<span class="glyphicon glyphicon-ok"></span>
								<span> </span>
							</label>
							<label for="fancy-checkbox-info" class="btn btn-default active">
							Client Registration Email
							</label>
						</div>

						<div id="clientEmail" hidden>
							<div class="col-sm-12 form-group">
								<label for="email_id">Email Id:</label>
								<input type="email" class="form-control" id="client_email_id" name="email_id" placeholder="Email Id">
							</div>
							<div class="col-sm-12 form-group">
								<label for="subject">Subject:</label>
								<input type="text" class="form-control" id="client_email_subject" name="subject" value="Client Registration" placeholder="Subject">
							</div>
							<div class="col-sm-12 form-group">
								<label for="comment">Email Body:</label>
								<textarea class="form-control" name="notes" id="client_email_body" rows="15" id="comment">
		
								Dear sir / madam,

								Greetings From Seconds Digital...

								Kindly register the below client For __________________ project On behalf Of Seconds Digital 

								Property & acknowledge.

								Client Name : ________________

								Contact No. : ________________

								E-mail ID   : ________________

								Thanks & Regards
								Team Seconds Digital
									
			
								</textarea>
							</div>
							<div class="col-sm-12 form-group">
								<div class="alert alert-success" id="regmail_success" style="display:none">
									<strong>Success!</strong> Email sent successfully.
								</div>
								<button type="button" onclick="sendRegMail()" class="btn btn-success">Send</button>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" onclick="update_callback_details()" id="save"  disabled>Save</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function() {
	     $('#example').DataTable({
              "paging":   false,
              "info": false
 
        });
	    if (!Modernizr.inputtypes.date) {
	        // If not native HTML5 support, fallback to jQuery datePicker
	        $('input[type=date]').datepicker({
	            // Consistent format with the HTML5 picker
	                dateFormat : 'dd/mm/yy'
	            }
	        );
	    }
	    if (!Modernizr.inputtypes.time) {
	        // If not native HTML5 support, fallback to jQuery timepicker
	        $('input[type=time]').timepicker({ 'timeFormat': 'H:i' });
	    }
	    $('#c_bkngMnth, #c_estMonthofInvoice').MonthPicker({
            Button: false
        });
	});
	
	function abc(){
		alert("hello");
	}

	function edit(v){
		$(".se-pre-con").show();
		$.ajax({
			type:"POST",
			url: "<?php echo base_url()?>admin/get_callback_details",
			data:{id:v},
			success:function(data){
				$('#mhid').val(v);
				$('#m_dept').val(data.dept);
				$('#m_name1').val(data.name);
				$('#m_contact_no1').val(data.contact_no1);
				$('#m_contact_no2').val(data.contact_no2);
				$('#m_callback_type').val(data.callback_type);
				$('#m_email1').val(data.email1);
				$('#m_email2').val(data.email2);
				$('#m_project').val(data.project);
				$('#m_lead_source').val(data.lead_source);
				$('#m_leadId').val(data.leadid);
				$('#m_status').val(data.manage_status);
				$('#m_user_name').val(data.user_name);
				$('#previous_callback1').val(data.previous_callback);
	
				$('#c_subSource').val(data.sub_broker);
				$('#client_name').val(data.name);
				if(data.email1){
					$('#client_email').val(data.email1);
				}else{
					$('#client_email').val(data.email2);
				}
				$(".se-pre-con").hide("slow");
			}
		});
	}

	function soft_delete(id,i){
		$(".se-pre-con").show();
		$.ajax({
			type:"POST",
			url: "<?php echo base_url()?>admin/delete_callback",
			data:{id:id},
			success:function(data){
				if(data.status){
					alert("Success");
					$('#row'+i).remove();
				}
				$(".se-pre-con").hide("slow");
			}
		});
	}

	function curr(v){
		if(v.length){
			$('#save').prop('disabled', false);
		}else{
			$('#save').prop('disabled', true);
		}
	}

	var notesClient = "Greetings From Seconds Digital.\n\nWith reference to your site visit on {site_visit_date} assisted by Mr. {site_assigned_by} from Seconds Digital, we thank you for giving us an opportunity to serve you in searching your dream home.  At FBP it is our endeavour to help you with all the possible Property options which will suit your requirement. Mr. {relationship_manager} from FBP will be at your service. He/she will be there to assist you in searching your dream home.\n\n1. Home search - Assisting and helping you find your dream home suiting your requirements by giving you info on market trends, legalities, site visit assistance etc.\n\n2. Home loan Assistance - We will take away your pain of running around the banks to get your loan approved by giving doorstep service of bankers of your choice at your place.\n\n3. Property Purchase Assistance - Ensuring that your home buying becomes a pleasant experience our Relationship Manager will be there throughout the process Of documentation.\n\n4. Post sales Service – This is what differentiates us from others. We will be there for all possible help and guidance till you move into your home.\n\n5. Interior Services - We are tied With best interior designers in the city who give the best designs and execute them at a competitive price.\n\n6. Rental Services - Need to rent your house Or searching for good house on rent do not worry try Seconds Digital rental services. Our professional and need based approach will ensure that you get right home/tenant without much hassles.\n\nFor any escalations/ complaints please write to admin@leads.com\n\nRegards\n\nTeam Seconds Digital Services Pvt Ltd";

	function update_client_note(){
		var site_visit_date = $("#c_client_visit").val();
		var site_assigned_by = $("#c_assign_by").val();
		var relationship_manager = $("#c_relationShipManager").val();
		var newNote = notesClient.replace("{site_visit_date}",site_visit_date).replace("{site_assigned_by}",site_assigned_by).replace("{relationship_manager}",relationship_manager);
		$("#c_notesClient").html(newNote);
	}

	function update_callback_details(){

		if($("#m_status").val()=="Close"){
			if($("#c_seniorAdvisor").val()==""){
				$("#c_seniorAdvisor").focus();
				return false;
			}
			if($("#c_secondAdvisor").val()==""){
				$("#c_secondAdvisor").focus();
				return false;
			}
			if($("#c_bkngName").val()==""){
				$("#c_bkngName").focus();
				return false;
			}
			if($("#c_bkngMnth").val()==""){
				$("#c_bkngMnth").focus();
				return false;
			}
			if($("#c_dateofClosure").val()==""){
				$("#c_dateofClosure").focus();
				return false;
			}
			if($("#c_customerName").val()==""){
				$("#c_customerName").focus();
				return false;
			}
			if($("#c_subSource").val()==""){
				$("#c_subSource").focus();
				return false;
			}
			if($("#c_projectName").val()==""){
				$("#c_projectName").focus();
				return false;
			}
			if($("#c_sqftSold").val()==""){
				$("#c_sqftSold").focus();
				return false;
			}
			if($("#c_plcCharge").val()==""){
				$("#c_plcCharge").focus();
				return false;
			}
			if($("#c_floorRise").val()==""){
				$("#c_floorRise").focus();
				return false;
			}
			if($("#c_basicCost").val()==""){
				$("#c_basicCost").focus();
				return false;
			}
			if($("#c_otherCost").val()==""){
				$("#c_otherCost").focus();
				return false;
			}
			if($("#c_carPark").val()==""){
				$("#c_carPark").focus();
				return false;
			}
			if($("#c_totalCost").val()==""){
				$("#c_totalCost").focus();
				return false;
			}
			if($("#c_comission").val()==""){
				$("#c_comission").focus();
				return false;
			}
			if($("#c_grossRevenue").val()==""){
				$("#c_grossRevenue").focus();
				return false;
			}
			if($("#c_cashBack").val()==""){
				$("#c_cashBack").focus();
				return false;
			}
			if($("#c_subBrokerAmo").val()==""){
				$("#c_subBrokerAmo").focus();
				return false;
			}
			if($("#c_netRevenue").val()==""){
				$("#c_netRevenue").focus();
				return false;
			}
			if($("#c_shareAdvisor1").val()==""){
				$("#c_shareAdvisor1").focus();
				return false;
			}
			if($("#c_shareAdvisor2").val()==""){
				$("#c_shareAdvisor2").focus();
				return false;
			}
			if($("#c_estMonthofInvoice").val()==""){
				$("#c_estMonthofInvoice").focus();
				return false;
			}
			if($("#c_agrmntStatus").val()==""){
				$("#c_agrmntStatus").focus();
				return false;
			}
			if($("#c_projectType").val()==""){
				$("#c_projectType").focus();
				return false;
			}

		}
		$(".se-pre-con").show();
		var data = {
			'callback_id':$('#mhid').val(),
			'status_id':$('#m_status').val(),
			'advisor1_id':$('#c_seniorAdvisor').val(),
			'advisor2_id':$('#c_secondAdvisor').val(),
			'booking':$("#c_bkngName").val(),
			'booking_month':$("#c_bkngMnth").val(),
			'closure_date':$("#c_dateofClosure").val(),
			'customer':$('#c_customerName').val(),
			'sub_source_id':$("#c_subSource").val(),
			'close_project_id':$("#c_projectName").val(),
			'sqft_sold':$("#c_sqftSold").val(),
			'plc_charge':$("#c_plcCharge").val(),
			'floor_rise':$("#c_floorRise").val(),
			'basic_cost':$("#c_basicCost").val(),
			'other_cost':$("#c_otherCost").val(),
			'car_park':$('#c_carPark').val(),
			'total_cost':$('#c_totalCost').val(),
			'commission':$('#c_comission').val(),
			'gross_revenue':$('#c_grossRevenue').val(),
			'cash_back':$('#c_cashBack').val(),
			'sub_broker_amo':$('#c_subBrokerAmo').val(),
			'net_revenue':$('#c_netRevenue').val(),
			'share_of_advisor1':$('#c_shareAdvisor1').val(),
			'share_of_advisor2':$('#c_shareAdvisor2').val(),
			'est_month_of_invoice':$('#c_estMonthofInvoice').val(),
			'agreement_status':$('#c_agrmntStatus').val(),
			'project_type':$('#c_projectType').val(),

			'reason_for_dead':$('#reasonOfDead').val(),
			
			'current_callback':$('#current_callback1').val(),

			'name':$('#m_name1').val(),
			'due_date':$('#reassign_date').val()+' '+$('#reassign_time').val(),
			'dept_id':$("#m_dept").val(),
			'contact_no1':$("#m_contact_no1").val(),
			'contact_no2':$("#m_contact_no2").val(),
			'callback_type_id':$("#m_callback_type").val(),
			'email1':$("#m_email1").val(),
			'email2':$("#m_email2").val(),
			'project_id':$("#m_project").val(),
			'lead_source_id':$("#m_lead_source").val(),
			'leadid':$("#m_leadId").val(),
			'user_id':$("#m_user_name").val()
		};

		$.ajax({
			type:"POST",
			url: "<?php echo base_url()?>admin/update_callback_details",
			data:data,
			success:function(data){
				location.reload();
			}
		});
  	}

	function status(v){
		if('6'==v){
			$('#close').hide();
			$('#dead').hide();
			$('#abc').show();
		} else if('5'==v){
			$('#abc').hide();
			$('#dead').hide();
			$('#close').show();
		} else if('4'==v){
			$('#abc').hide();
			$('#close').hide();
			$('#dead').show();
		} else{
			$('#close').hide();
			$('#abc').hide();
			$('#dead').hide();
		}
	}

	function reassignDate(){
		$('#reDate').toggle();
	}

	function clientEmail(){
		$('#clientEmail').toggle();
	}
	
	function le(){
		var b =$('#assign_by').val();
		var a=$('#notesClient').text();
		var n = a.indexOf("On");
		n=n+3;
		var output = [a.slice(0, n), b, a.slice(n)].join('');
		$('#notesClient').text(output );
	}

	function calculateTotalCost(){
		var sold=$('#c_sqftSold').val();
		var plc=$('#c_plcCharge').val();
		var basic=$('#c_basicCost').val();
		var other=$('#c_otherCost').val();
		var car=$('#c_carPark').val();
		var flood=$('#c_floorRise').val();

		if(!sold) sold=0;
		if(!plc) plc=0;
		if(!basic) basic=0;
		if(!other) other=0;
		if(!car) car=0;
		if(!flood) flood=0;

		sold=parseFloat(sold);
		plc=parseFloat(plc);
		basic=parseFloat(basic);
		other=parseFloat(other);
		car=parseFloat(car);
		flood=parseFloat(flood);
		var total=(basic*sold)+plc+flood+other+car;
		$('#c_totalCost').val(total);
	}

	function calculateGrossRevenue(){
		var total_cost=$('#c_totalCost').val();
		var c_comission=$('#c_comission').val();
		c_comission=parseFloat(c_comission);
		total_cost=parseFloat(total_cost);

		if(!c_comission){c_comission=0;}
		if(!total_cost){total_cost=0;}

		var c_grossRevenue=(total_cost * c_comission)/100;
		$('#c_grossRevenue').val(c_grossRevenue);
	}

	function calculateNetRevenue(){
		var cashback=$('#c_cashBack').val();
		var subbroker=$('#c_subBrokerAmo').val();
		var c_grossRevenue=$('#c_grossRevenue').val();
		if(!cashback){cashback=0;}
		if(!subbroker){subbroker=0;}

		c_grossRevenue=parseFloat(c_grossRevenue);
		subbroker=parseFloat(subbroker);
		var revenue=c_grossRevenue - cashback - subbroker;
		$('#c_netRevenue').val(revenue);
	}

	function calculateAdvisorShare(id){
		if(id==1){
			var c_shareAdvisor2=$('#c_shareAdvisor2').val();
			$('#c_shareAdvisor1').val(100-c_shareAdvisor2);
		}
		else if(id==2){
			var c_shareAdvisor1=$('#c_shareAdvisor1').val();
			$('#c_shareAdvisor2').val(100-c_shareAdvisor1);
		}
	}

	function sendMail(){
		if($("#c_client_name").val() == ""){
			alert("Please enter client name");
			$("#c_client_name").focus();
			return false;
		}
		if($("#c_client_email").val() == ""){
			alert("Please enter client email");
			$("#c_client_email").focus();
			return false;
		}
		if($("#c_client_visit").val() == ""){
			alert("Please enter Site visit date");
			$("#c_client_visit").focus();
			return false;
		}
		if($("#c_assign_by").val() == ""){
			alert("Please enter Site assign by");
			$("#c_assign_by").focus();
			return false;
		}
		if($("#c_subject").val() == ""){
			alert("Subject cannot be empty");
			$("#c_subject").focus();
			return false;
		}
		if($("#c_relationShipManager").val() == ""){
			alert("Please enter Relation ship manager name");
			$("#c_relationShipManager").focus();
			return false;
		}
		if($("#c_notesClient").val() == ""){
			alert("Mail message cannot be empty");
			$("#c_notesClient").focus();
			return false;
		}
		$(".se-pre-con").show();
		$.ajax({
			type:"POST",
			url: "<?php echo base_url()?>admin/send_mail/site-visit",
			data:{
				client_name:$("#c_client_name").val(),
				client_email:$("#c_client_email").val(),
				client_visit:$("#c_client_visit").val(),
				assign_by:$("#c_assign_by").val(),
				subject:$("#c_subject").val(),
				relationship_manager:$("#c_relationShipManager").val(),
				message:$("#c_notesClient").val(),
				callback_id:$("#mhid").val()
			},
			success:function(data) {
				if(data.success){
					$("#mail_success").show();
				}
				$(".se-pre-con").hide("slow");
			}
		});
	}

	function sendRegMail(){
		if($("#client_email_id").val() == ""){
			alert("Please enter client email");
			$("#client_email_id").focus();
			return false;
		}
		if($("#client_email_subject").val() == ""){
			alert("Please enter email subject");
			$("#client_email_subject").focus();
			return false;
		}
		if($("#client_email_body").val() == ""){
			alert("Please enter email body");
			$("#client_email_body").focus();
			return false;
		}
		$(".se-pre-con").show();
		$.ajax({
			type:"POST",
			url: "<?php echo base_url()?>admin/send_mail/client-reg",
			data:{
				client_email:$("#client_email_id").val(),
				message:$("#client_email_body").val(),
				subject:$("#client_email_subject").val(),
				callback_id:$("#mhid").val()
			},
			success:function(data) {
				console.log(data.success);
				if(data.success){
					$("#regmail_success").show();
				}
				$(".se-pre-con").hide("slow");
			}
		});
	}
</script>
<?php } ?>
									</div>
<!--/tabs-->
										 <div class="tab-main">
											 <!--/tabs-inner-->
												
												</div>
											  <!--//tabs-inner-->

									 <!--footer section start-->
										<footer>
										   <p>&copy <?= date('Y')?> Seconds Digital . All Rights Reserved | Design by <a href="https://secondsdigital.com/" target="_blank">Seconds Digital Solutions.</a></p>
										</footer>
									<!--footer section end-->
								</div>
							</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo">
					<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>  <span id="logo"> <h1>FBP</h1></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				  </a> 
				</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
							<div class="down">	
									  <?php $this->load->view('profile_pic');?>
									  <span class=" name-caret"><?php echo $this->session->userdata('user_name'); ?></span>
									   <p><?php echo $this->session->userdata('user_type'); ?></p>
									
									<ul>
									<li><a class="tooltips" href="<?= base_url('dashboard/profile'); ?>"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
										<li><a class="tooltips" style=" color: #00C6D7 !important; " href="#"><span>Team Size</span><?php if($this->session->userdata("manager_team_size")) echo $this->session->userdata("manager_team_size")?$this->session->userdata("manager_team_size"):''?></a></li>
										<li><a class="tooltips" href="<?php echo base_url()?>login/logout"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
										</ul>
									</div>
							   <!--//down-->
                           <?php $this->load->view('inc/header_nav'); ?>
                           <div style="height: 100%"></div>
							  </div>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/vroom.css">
<script type="text/javascript" src="<?php echo base_url()?>assets/js/vroom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/TweenLite.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/CSSPlugin.min.js"></script>

<!--<script src="<?php echo base_url()?>assets/js/scripts.js"></script>-->

<!-- Bootstrap Core JavaScript -->
   
   <script>
    $(document).ready(function() {
         $('#example').DataTable({
              "paging":   false,
              "info": false
 
        });
        if (!Modernizr.inputtypes.date) {
            // If not native HTML5 support, fallback to jQuery datePicker
            $('input[type=date]').datepicker({
                // Consistent format with the HTML5 picker
                    dateFormat : 'dd/mm/yy'
                }
            );
        }
        if (!Modernizr.inputtypes.time) {
            // If not native HTML5 support, fallback to jQuery timepicker
            $('input[type=time]').timepicker({ 'timeFormat': 'H:i' });
        }
        $('#revenueMonth').MonthPicker({
            Button: false
        });
        get_revenues();

        $('.view_callbacks').click(function(){
            var type = $(this).data('type');
            var data = {};
            switch (type)
            {
                case "user_total":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.due_date = "<?php echo date('Y-m-d'); ?>";
                    data.access = 'read_write'; 
                    break;

                case "user_overdue":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.due_date_to = "<?php echo date('Y-m-d H:i:s'); ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "user_active": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "user_close": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.status = "close";
                    break;

                case "user_important":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.access = 'read_write'; 
                    data.important = 1;
                    break;

                case "manager_active": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "manager_close":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.status = "close";
                    break;
            }
            
            view_callbacks(data,'post');

        });

        $("#refresh").click(function(){
            $(".se-pre-con").show();
            $.get("<?php echo base_url(); ?>dashboard/get_live_feed_back", function(response){
                $("#live_feed_back_body").html(response);
                $(".se-pre-con").hide("slow");
            });
        });

        $("#overdue_lead_count").click(function(){
            var form = document.createElement('form');
            form.method = "POST";
            form.action = "<?php echo base_url()."dashboard/generate_report" ?>";
            
            var input = document.createElement('input');
            input.type = "text";
            input.name = "toDate";
            input.value = $(this).data('datetime');
            form.appendChild(input);

            input = document.createElement('input');
            input.type = "text";
            input.name = "reportType";
            input.value = "due";
            form.appendChild(input);

            document.body.appendChild(form);
            form.submit();
        });

        $('.emailSiteVisit').on('click', function(){
            $(".se-pre-con").show();
            $.ajax({
                type : 'POST',
                url : "<?= base_url('site-visit-report-mail');?>",
                data:1,
                success: function(res){
                    $(".se-pre-con").hide("slow");
                    if(res == 1)
                        alert('Email Sent Successfully.');
                    else
                        alert('Email Sent fail!');
                }
            });
        });

    });
    // $('#filter_revenue').click(get_revenues());
    function get_revenues(){
        $.get( "<?php echo base_url()."dashboard/get_revenue/" ?>"+$('#revenueMonth').val(), function( data ) {
            $('#revenue_data').html(data);
        });
    }
    function view_callbacks(data, method) {
        var form = document.createElement('form');
        form.method = method;
        form.action = "<?php echo base_url()."view_callbacks?" ?>"+jQuery.param(data);
        for (var i in data) {
            var input = document.createElement('input');
            input.type = "text";
            input.name = i;
            input.value = data[i];
            form.appendChild(input);
        }
        //console.log(form);
        document.body.appendChild(form);
        form.submit();
    }

</script>
<script>
    $(document).ready(function() {
         $('#example').DataTable({
              "paging":   false,
              "info": false
 
        });
        if (!Modernizr.inputtypes.date) {
            // If not native HTML5 support, fallback to jQuery datePicker
            $('input[type=date]').datepicker({
                // Consistent format with the HTML5 picker
                    dateFormat : 'dd/mm/yy'
                }
            );
        }
        if (!Modernizr.inputtypes.time) {
            // If not native HTML5 support, fallback to jQuery timepicker
            $('input[type=time]').timepicker({ 'timeFormat': 'H:i' });
        }
        $('#revenueMonth').MonthPicker({
            Button: false
        });
        get_revenues();

        $('.view_callbacks').click(function(){
            var type = $(this).data('type');
            var data = {};
            switch (type)
            {
                case "user_total":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.due_date = "<?php echo date('Y-m-d'); ?>";
                    data.access = 'read_write'; 
                    break;

                case "user_overdue":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.due_date_to = "<?php echo date('Y-m-d H:i:s'); ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "user_active": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "user_close": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.status = "close";
                    break;

                case "user_important":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.access = 'read_write'; 
                    data.important = 1;
                    break;

                case "manager_active": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "manager_close":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.status = "close";
                    break;
            }
            
            view_callbacks(data,'post');

        });

        $("#refresh").click(function(){
            $(".se-pre-con").show();
            $.get("<?php echo base_url(); ?>dashboard/get_live_feed_back", function(response){
                $("#live_feed_back_body").html(response);
                $(".se-pre-con").hide("slow");
            });
        });

        $("#overdue_lead_count").click(function(){
            var form = document.createElement('form');
            form.method = "POST";
            form.action = "<?php echo base_url()."dashboard/generate_report" ?>";
            
            var input = document.createElement('input');
            input.type = "text";
            input.name = "toDate";
            input.value = $(this).data('datetime');
            form.appendChild(input);

            input = document.createElement('input');
            input.type = "text";
            input.name = "reportType";
            input.value = "due";
            form.appendChild(input);

            document.body.appendChild(form);
            form.submit();
        });

        $('.emailSiteVisit').on('click', function(){
            $(".se-pre-con").show();
            $.ajax({
                type : 'POST',
                url : "<?= base_url('site-visit-report-mail');?>",
                data:1,
                success: function(res){
                    $(".se-pre-con").hide("slow");
                    if(res == 1)
                        alert('Email Sent Successfully.');
                    else
                        alert('Email Sent fail!');
                }
            });
        });

    });
    // $('#filter_revenue').click(get_revenues());
    function get_revenues(){
        $.get( "<?php echo base_url()."dashboard/get_revenue/" ?>"+$('#revenueMonth').val(), function( data ) {
            $('#revenue_data').html(data);
        });
    }
    function view_callbacks(data, method) {
        var form = document.createElement('form');
        form.method = method;
        form.action = "<?php echo base_url()."view_callbacks?" ?>"+jQuery.param(data);
        for (var i in data) {
            var input = document.createElement('input');
            input.type = "text";
            input.name = i;
            input.value = data[i];
            form.appendChild(input);
        }
        //console.log(form);
        document.body.appendChild(form);
        form.submit();
    }

</script>
</body>
</html>