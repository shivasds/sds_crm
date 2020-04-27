<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('inc/header'); 
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
   <div class="page-container">
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
                                    <?php $this->load->view('notification');?>                            </div>
                            <div class="clearfix"></div>    
                            <!--//profile_details-->
                        </div>
                        <!--//menu-right-->
                    <div class="clearfix"></div>
                </div>
                    <!-- //header-ends -->
                       <div>
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
<div class="container">
  
    <div class="page-header">
        <h1><?php echo $heading; ?></h1>
    </div>
    <div class="row">
        <div class="col-sm-12 nopaddin">
            <?php 
//echo $this->session->userdata('user_type');


            if($fromDate){ ?>
                <div class="col-sm-4">
                    <h4>From Date: &emsp;<?php echo $fromDate; ?></h4>
                </div>
            <?php } ?>
            <?php if($toDate){ ?>
                <div class="col-sm-4">
                    <h4>To Date: &emsp;<?php echo $toDate; ?></h4>
                </div>
            <?php } ?>
            <?php if($dept) { ?>
                <div class="col-sm-4">
                    <h4>Department: &emsp;<?php echo $this->common_model->get_department_name($dept); ?></h4>
                </div>
            <?php }
            if($city) { ?>
                <div class="col-sm-4">
                    <h4>City: &emsp;<?php echo $this->common_model->get_city_name($city); ?></h4>
                </div>
            <?php } 
            if($advisor) { ?>
                <div class="col-sm-4">
                    <h4>Advisor: &emsp;<?php echo $this->user_model->get_user_fullname($advisor); ?></h4>
                </div>
            <?php }
            if($project) { ?>
                <div class="col-sm-4">
                    <h4>Project: &emsp;<?php echo $this->common_model->get_project_name($project); ?></h4>
                </div>
            <?php } 
            if($lead_source) { ?>
                <div class="col-sm-4">
                    <h4>Lead Source: &emsp;<?php echo $this->common_model->get_leadsource_name($lead_source); ?></h4>
                </div>
            <?php }
            if($status) { ?>
                <div class="col-sm-4">
                    <h4>Status: &emsp;<?php echo $this->common_model->get_status_name($status); ?></h4>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="clearfix"></div><br>
              
                <?php $row['page']= $this->uri->segment(2);
              //  $report=$this->input->get('report');
                //echo $advisor;
                
                if($this->session->userdata('user_type')!='user')
                {
                if(!empty($advisor))
                  {
                ?>

                <td><a href="<?php echo site_url(); ?>excel/view_callback/<?php echo $row['page'].'?report='.
                 $report.'&advisor='.$advisor.'&fromDate='.$fromDate.'&toDate='.$toDate.'&project='.$project.'&dept='.$dept;
                ?>" class="btn" >Download</a></td>
            <?php }
else if(!empty($project))
{
            ?>
                <td><a href="<?php echo site_url(); ?>excel/view_callback/<?php echo $row['page'].'?report='.
                 $report.'&project='.$project.'&fromDate='.$fromDate.'&toDate='.$toDate.'&dept='.$dept;
                ?>" class="btn" >Download</a></td>
            <?php }
            else if(!empty($lead_source))
            {
             ?>
             <td><a href="<?php echo site_url(); ?>excel/view_callback/<?php echo $row['page'].'?report='.
                 $report.'&lead_source='.$lead_source.'&fromDate='.$fromDate.'&toDate='.$toDate.'&dept='.$dept;
                ?>" class="btn" >Download</a></td>
             <?php }
            else if(!empty($report))
            {
             ?>
            <td><a href="<?php echo site_url(); ?>excel/view_callback/<?php echo $row['page'].'?report='.
                 $report.'&advisor='.$advisor.'&fromDate='.$fromDate.'&toDate='.$toDate.'&dept='.$dept;
                ?>" class="btn" >Download</a></td>
            <?php }
             else if(!empty($dept))
            {
             ?>
            <td><a href="<?php echo site_url(); ?>excel/view_callback/<?php echo $row['page'].'?report='.
                 $report.'&advisor='.$advisor.'&fromDate='.$fromDate.'&toDate='.$toDate.'&dept='.$dept;
                ?>" class="btn" >Download</a></td>
            <?php }
            
        }
            ?>            
           
           
    <div style=" ">
    <table id="example" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%" >
        <thead>

            <tr>
                <th>No</th>
                <?php if(($report == 'lead') || ($report == 'lead_assignment') || ($report == 'site_visit') || ($report == 'clent_reg')){ ?>
                    <th>Contact Name</th> 
                    <th>Added Date</th>
                    <th>Last Updated</th>
                    <th>Due Date</th>
                    <!-- <th>Lead Source</th> -->
                    <?php if ($report == 'lead_assignment') { ?>
                        <th>Sub Broker</th>
                    <?php } ?>
                    <th>Status</th> 
                    <?php if ($report == 'lead_assignment') { ?>
                        <th>Advisor</th>
                    <?php } ?>
                    <th>Project</th> 
                    <th>Comment</th>
                    <th style="word-wrap:break-word;" width="20%" >Lead Source</th>
                    <th>Sub Source</th>
                <?php }else {?>
                    <th>Contact Name</th> 
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>Project</th>
                    <!-- <th>Lead Source</th> -->
                    <th>Lead Id</th> 
                    <th>Advisor</th> 
                    <!-- <th>Sub-Source</th> -->
                    <th>Due date</th>
                    <th>Status</th>
                    <th>Date Added</th>
                    <th>Last Update</th>
                <?php } ?>
                <?php if($access == 'read_write'){ ?>
                    <th>Action</th>
                <?php } ?>
            </tr>
        </thead> 
        <tbody id="main_body">
            <?php $i= 1;
//echo count($result);
            if(count($result)>0){
            foreach ($result as $data) {
                $duedate = explode(" ", $data->due_date);
                $duedate = $duedate[0]; ?>
                <tr id="row<?php echo $data->id; ?>" <?php if(strtotime($duedate)<strtotime('today')){?> class="highlight_past" <?php }elseif(strtotime($duedate) == strtotime('today')) {?> class="highlight_now" <?php }elseif(strtotime($duedate)>strtotime('today')){ ?> class="highlight_future" <?php } ?>>
                    <td><?php echo $i; ?></td>
                    <?php if(($report == 'lead') || ($report == 'lead_assignment') || ($report == 'site_visit') || ($report == 'clent_reg')){ ?>

                        <td><?php echo $data->name; ?></td>
                        <td><?php echo $data->date_added ?></td>
                        <td><?php echo $data->last_update; ?></td>
                        <td class="due_date"><?php echo $data->due_date; ?></td>
                        <!-- <td><?php echo $data->lead_source_name; ?></td> -->
                        <?php if ($report == 'lead_assignment') { ?>
                            <td><?php echo $data->broker_name; ?></td>
                        <?php } ?>
                        <td><?php echo $data->status_name; ?></td>
                        <?php if ($report == 'lead_assignment') { ?>
                            <td><?php echo $data->user_name; ?></td>
                        <?php } ?>
                        <td><?php echo $data->project_name; ?></td>
                        <td><?php echo $data->notes; ?></td>
                
                <?php 

                   // $this->db->model('Callback_model');
                   $lead_source_name= $this->callback_model->get_leadsource_name($data->lead_source_id);
                    $sub_source_name=$this->callback_model->get_broker_name($data->broker_id);
                ?>

                        <td><?php echo  $lead_source_name['name'];?></td>
                        <td><?php echo $sub_source_name['name']; ?></td>
                    <?php }else {?>
                        <td><?php echo $data->name; ?></td>
                        <td><?php echo $data->contact_no1 ?></td>
                        <td><?php echo $data->email1; ?></td>
                        <td><?php echo $data->project_name; ?></td>
                        <!-- <td><?php echo $data->lead_source_name; ?></td> -->
                        <td><?php echo $data->leadid; ?></td>
                        <td><?php echo $data->user_name; ?></td>
                        <!-- <td><?php echo $data->broker_name; ?></td> -->
                        <td class="due_date"><?php echo $data->due_date; ?></td>
                        <td><?php echo $data->status_name; ?></td>
                        <td><?php echo $data->date_added; ?></td>
                        <td><?php echo $data->last_update; ?></td>
                    <?php } ?>
                    <?php if($access == 'read_write'){ ?>
                        <td>
                            <table>
                                <tr>
                                    <td>
                                        <!-- <a onclick="edit('<?php echo $data->id; ?>')" data-toggle="modal" data-target="#modal_edit"> -->
                                        <a href="<?= base_url('callback-details?id='.$data->id) ?>" target="_blank">
                                            <i class="fa fa-home fa-2x"  title="Detail" style="color:#ff1122; font-size:21px;padding-right:7px;" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <i class="fa fa-keyboard-o fa-2x" onclick="abc()" title="Notes" style="color:#ff1122; font-size:21px;padding-right:7px;" aria-hidden="true"></i>
                                    </td>
                                    <?php if($data->important) {?>
                                        <td>
                                            <i class="fa fa-exclamation fa-2x" onclick="remove_important('<?php echo $data->id; ?>')" title="Mark Not Important" style="color:#ff1122; font-size:21px;padding-right:7px;" aria-hidden="true"></i>
                                        </td>
                                    <?php } ?>
                                </tr>
                            </table>
                        </td>
                    <?php } ?>
                </tr>
            <?php $i++; } }?>
        </tbody>
    </table>
    </div>
    <div style="margin-top: 20px">
        <span class="pull-left"><p>Showing <?php echo ($this->uri->segment(2)) ? $this->uri->segment(2)+1 : 1; ?> to <?= ($this->uri->segment(2)+count($result)); ?> of <?= $totalRecords ; ?> entries</p></span>
        <ul class="pagination pull-right"><?php echo $links; ?></ul>
    </div>
</div>

<form style="display: none;" method="POST" id="repost">
    <input type="hidden" name="access" value="<?php echo isset($access)?$access:''; ?>">
    <input type="hidden" name="cb_ids" value="<?php echo isset($cb_ids)?$cb_ids:''; ?>">
    <input type="hidden" name="dept" value="<?php echo isset($dept)?$dept:''; ?>">
    <input type="hidden" name="fromDate" value="<?php echo isset($fromDate)?$fromDate:''; ?>">
    <input type="hidden" name="toDate" value="<?php echo isset($toDate)?$toDate:''; ?>">
    <input type="hidden" name="advisor" value="<?php echo isset($advisor)?$advisor:''; ?>">
    <input type="hidden" name="project" value="<?php echo isset($project)?$project:''; ?>">
    <input type="hidden" name="lead_source" value="<?php echo isset($lead_source)?$lead_source:''; ?>">
    <input type="hidden" name="status" value="<?php echo isset($status)?$status:''; ?>">
    <input type="hidden" name="due_date" value="<?php echo isset($due_date)?$due_date:''; ?>">
    <input type="hidden" name="due_date_to" value="<?php echo isset($due_date_to)?$due_date_to:''; ?>">
    <input type="hidden" name="due_date_from" value="<?php echo isset($due_date_from)?$due_date_from:''; ?>">
    <input type="hidden" name="important" value="<?php echo isset($important)?$important:''; ?>">
    <button type="submit"></button>
</form>

<?php if($access == 'read_write') $this->load->view('callback_operations'); ?>

<script type="text/javascript">

    $(document).ready(function() {
       //  $('#example').DataTable({
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
    });

</script> 
      
                       </div>

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
                                     <?php if($this->session->userdata('user_type')=='user')
                                       {?>
                                      <span class="name-caret">RM:</span> <?php echo $this->session->userdata('manager_name'); ?><br>
                                        <?php } ?>
                                    
                                    <ul>
                                    <li><a class="tooltips" href="<?= base_url('dashboard/profile'); ?>"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
                                        <li><a class="tooltips" style=" color: #00C6D7 !important; " href="#"><span>Team Size</span><?php if($this->session->userdata("manager_team_size")) echo $this->session->userdata("manager_team_size")?$this->session->userdata("manager_team_size"):''?></a></li>
                                        <li><a class="tooltips" href="<?php echo base_url()?>login/logout"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
                                        </ul>
                                    </div>
                               <!--//down-->
                           <?php $this->load->view('inc/header_nav'); ?>
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