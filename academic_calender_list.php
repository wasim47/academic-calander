<script type="text/JavaScript">
function openPage1(pid,tablename,colid)
{
	var b = window.confirm('Are you sure, you want to Delete This ?');
	if(b==true){
		$.ajax({
			   type: "GET",
			   url: '<?php echo base_url()?>school_administrator/deleteData/'+tablename+'/'+colid,
			   data: "deleteId="+pid,
			   success: function() {
				  alert("Successfully saved");
				  window.location.reload(true);
				},
				error: function() {
				  alert("There was an error. Try again please!");
				}
		 });
	}
	else{
	 return;
	}
	 
}


function update_sequence(id){
var updateid = document.getElementById("sequence"+id).value;
window.location.href='<?php echo base_url('school_administrator/update_sequence');?>?sequence='+updateid+"&&id="+id;
}
</script>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Academic Calendar Details</h3>
                        </div>
                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2 style="float:left">Total Academic Calendar (<?php echo $academic_calender_list->num_rows();?>)</h2>
                                    <h2 style="float:right"><a href="<?php echo base_url('school_administrator/academic_calender_registration');?>" class="btn btn-primary">New Academic Calendar</a></h2>
                                    <div class="clearfix"></div>
                                    
                                   
                                </div>
                                <div class="x_content">
                                <div style="width:100%"><?php echo $this->session->flashdata('successMsg');?></div>
                                <div class="container">
                                  <table class="table table-striped" width="100%">
                                    <thead>
                                      <tr>
                                        <th width="5%" align="center">SI</th>
                                        <th width="10%" align="center">Year</th>
                                        <th width="13%" align="center">Month</th>
                                        <th width="9%" align="center">Date</th>
                                        <th width="44%" align="center">Events</th>
                                        <th width="19%" align="center">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$i=0;
                                    foreach($academic_calender_list->result() as $academic_calenderData):
									$ac_id=$academic_calenderData->ac_id;
									$year=$academic_calenderData->year;
									$month=$academic_calenderData->month;
									$date=$academic_calenderData->date;
									$events=$academic_calenderData->events;
									
									$i++;
									?>
                                      <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $year; ?></td>
                                        <td><?php echo $month; ?></td>
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $events; ?></td>
                                         <td> 
                                         	<a href="<?php echo base_url('school_administrator/academic_calender_registration/'.$ac_id);?>" 
                                            class="btn btn-default btn-sm">
          										<span class="glyphicon glyphicon-edit"></span> Edit
                                            </a> 
                                            <a href="javascript:void();" onclick="openPage1('<?php echo $ac_id;?>','academic_calender','ac_id');" class="btn btn-default btn-sm">
          										<span class="glyphicon glyphicon-remove-circle"></span> Remove
                                            </a>
                                            </td>
                                      </tr>
                                    <?php
                                    endforeach;
									?>  
                                      
                                    </tbody>
                                  </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>