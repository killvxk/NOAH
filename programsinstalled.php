<?php

include ("header.php");

echo '
	<h1>
        Software Installed
        <small>NOAH 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="hunt.php"><i class="fa fa-cube"></i> Hunts</a></li>';
if($huntGUID != ''){	
	echo '<li><a href="huntdetails.php?hunt='.$huntGUID.'"><i class="fa fa-cubes"></i> Hunt Details</a></li>';
}
if($serverID != ''){	
	echo '<li><a href="hostdetails.php?hunt='.$huntGUID.'&serverID='.$serverID.'"><i class="fa fa-desktop"></i> Host Details</a></li>';  
}
echo '    
		<li class="active">Software Installed</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

	  <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
       
         
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Software Installed</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">			  
                <table class="table no-margin">
                  <thead>
                  <tr>
					<th>Hunt GUID</th>                   
					<th>Server Name</th>                   
                    <th>Program Name</th>  
					<th>Version</th>
					<th>Location</th>					
					<th>Publisher</th>
					<th>Icon</th>                    
                  </tr>
                  </thead>
                  <tbody id="suspicioussoftwareinstalledph">				 
				  <div class="input-group input-group-sm">
					<form id="formsoftwareinstalled" method="post" autocomplete="off">
					<input type="text" class="form-control" id="softwareinstalledinput">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat" id="softwareinstalled">Go!</button>
                    </span>
					</form>
					</div>	';							  
				include_once("programsinstalledfetch.php");	
				 echo ' 
				</tbody>
                </table>
              </div>
              <!-- /.table-responsive -->			  
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="launchhunt.php" class="btn btn-sm btn-info btn-flat pull-left">Make New Hunt</a>
              <a href="hunt.php" class="btn btn-sm btn-default btn-flat pull-right">View All Hunts</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

       
      </div>
      <!-- /.row -->
	  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script type="text/javascript">
$("#suspicioussoftwareinstalledph").on( "click", ".pagination2 a", function (e){
        e.preventDefault();
        $(".loading-div").show(); //show loading element
        var page = $(this).attr("data-page");';
	
	$varHunt = '';
	$varServer = '';
	if ($huntGUID != '') {
		echo 'var huntGUID = "'.$huntGUID.'";';
		$varHunt = ', "huntGUID":huntGUID';
	}
	if ($serverID!= '') {
		echo 'var serverID = '.$serverID.';';
		$varServer = ',"serverID":serverID';
	}
	echo '$("#suspicioussoftwareinstalledph").load("programsinstalledfetch.php",{"page":page'.$varHunt.''.$varServer.'}, function(){';
	
		echo '
            $(".loading-div").hide(); //once done, hide loading element
        });
        
    });
</script>';
 
 include ("footer.php");
sqlsrv_close($conn);