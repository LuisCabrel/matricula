<?php
 $this->load->view('head');
 $this->load->view('menu');
?>
 <!-- PAGE CONTENT -->
<div class="page-content">
    
    <!-- START X-NAVIGATION VERTICAL -->
    <?php 
    $this->load->view('menu_head');
    ?>
    <!-- END X-NAVIGATION VERTICAL -->                     
    
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Link</a></li>                    
        <li class="active">Active</li>
    </ul>
    <!-- END BREADCRUMB --> 
    <!-- START WIDGETS -->                    
    <div class="row">                        
        <div class="col-md-3">
            
            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
                <div class="widget-item-left">
                    <span class="fa fa-envelope"></span>
                </div>                             
                <div class="widget-data">
                    <div class="widget-int num-count">48</div>
                    <div class="widget-title">New messages</div>
                    <div class="widget-subtitle">In your mailbox</div>
                </div>      
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>                            
            <!-- END WIDGET MESSAGES -->
            
        </div>
        <div class="col-md-3">
            
            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                <div class="widget-item-left">
                    <span class="fa fa-user"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">375</div>
                    <div class="widget-title">Registred users</div>
                    <div class="widget-subtitle">On your website</div>
                </div>
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>                            
            </div>                            
            <!-- END WIDGET REGISTRED -->
            
        </div>
        <div class="col-md-3">
            
            <!-- START WIDGET CLOCK -->
            <div class="widget widget-info widget-padding-sm">
                <div class="widget-big-int plugin-clock">00:00</div>                            
                <div class="widget-subtitle plugin-date">Loading...</div>
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>                            
                <div class="widget-buttons widget-c3">
                    <div class="col">
                        <a href="#"><span class="fa fa-clock-o"></span></a>
                    </div>
                    <div class="col">
                        <a href="#"><span class="fa fa-bell"></span></a>
                    </div>
                    <div class="col">
                        <a href="#"><span class="fa fa-calendar"></span></a>
                    </div>
                </div>                            
            </div>                        
            <!-- END WIDGET CLOCK -->
            
        </div>
        <div class="col-md-3">
            
            <!-- START WIDGET CLOCK -->
            <div class="widget widget-info widget-padding-sm">
                <div class="widget-big-int plugin-clock">00:00</div>                            
                <div class="widget-subtitle plugin-date">Loading...</div>
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>                            
                <div class="widget-buttons widget-c3">
                    <div class="col">
                        <a href="#"><span class="fa fa-clock-o"></span></a>
                    </div>
                    <div class="col">
                        <a href="#"><span class="fa fa-bell"></span></a>
                    </div>
                    <div class="col">
                        <a href="#"><span class="fa fa-calendar"></span></a>
                    </div>
                </div>                            
            </div>                        
            <!-- END WIDGET CLOCK -->
            
        </div>
    </div>
    <!-- END WIDGETS -->                
    
    <!-- <div class="page-title">                    
        <h2><span class="fa fa-arrow-circle-o-left"></span> Page Title</h2>
    </div>  -->                  
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
    
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Panel Title</h3>
                    </div>
                    <div class="panel-body">
                        Panel body
                    </div>
                </div>

            </div>
        </div>
    
    </div>
    <!-- END PAGE CONTENT WRAPPER -->                
</div>            
<!-- END PAGE CONTENT -->
<?php
 $this->load->view('foot');
?>