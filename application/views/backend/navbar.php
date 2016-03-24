  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <a class="navbar-brand" href="<?php echo base_url('backend/admin/dash');?>">Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
             <?php

              if($this->session->userdata('loggedin') == true){
                echo "Welcome: {$this->session->userdata('username')}";
              }
              else
              {
                redirect('backend/admin');
              }
              ?> 
            <span class="caret"></span>
          </a>
         <ul class="dropdown-menu">
            <form class="form-horizontal myform" action="<?php echo base_url();?>backend/admin/sign_out">
              <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
               <button type="submit" class="btn btn-default">Sign Out</button>
              </div>
              </div>
            </form>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>