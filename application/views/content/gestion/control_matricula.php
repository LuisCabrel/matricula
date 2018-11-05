<?php
 $this->load->view('head');
 $this->load->view('menu');
?>
<div class="page-content">
    <?php 
    $this->load->view('menu_head');
    ?>
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>                    
        <li class="active">Matricula</li>
    </ul>
    <!-- END BREADCRUMB -->
    <div class="row">
        <div class="col-md-12">         
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3>Datos Estudiante</h3>                                
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control" placeholder="youremail@domain.com">
                                </div>
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="email" class="form-control" placeholder="Message subject">
                                </div>                                
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" placeholder="Your message" rows="3"></textarea>
                                </div>                                
                            </div>
                           <!--  <div class="panel-footer">
                                <button class="btn btn-default"><span class="fa fa-paperclip"></span> Add attachment</button>
                                <button class="btn btn-success pull-right"><span class="fa fa-envelope-o"></span> Send</button>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3>Datos Padre</h3>                                
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control" placeholder="youremail@domain.com">
                                </div>
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="email" class="form-control" placeholder="Message subject">
                                </div>                                
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" placeholder="Your message" rows="3"></textarea>
                                </div>                                
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-default"><span class="fa fa-paperclip"></span> Add attachment</button>
                                <button class="btn btn-success pull-right"><span class="fa fa-envelope-o"></span> Send</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>  
        </div>
    </div>
</div>
    
</div>
<?php
 $this->load->view('foot');
?>