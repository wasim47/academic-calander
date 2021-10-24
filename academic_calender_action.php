<?php
if($academic_calenderUpdate->num_rows()>0){
	foreach($academic_calenderUpdate->result() as $subData);
	$ac_id=$subData->ac_id;
	$session_year=$subData->session_year;
	$course_class=$subData->course_class;
	$academic_calender_name=$subData->academic_calender_name;
}
else{
	$ac_id='';
	$session_year='';
	$course_class='';
	$academic_calender_name='';
	}
?>
<script>
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	function getcourse(strURL) {		
		
		var req = getXMLHTTP();
		//alert(req);
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
	
	
	$(document).ready(function(){
		$('#page_structure').change(function(){
			if($(this).val()=='url'){
				$('#externalLink').css('display','inline');
			}
			else{
				$('#externalLink').css('display','none');
			}
			
		});
		
	});
</script>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Academic Calendar Details</h3>
                        </div>
                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Academic Calendar Registraion Form</h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                                   <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                 <h4 class="panel-title">
                                                   Academic Calendar Information </h4>
                                                 </a>
                                          </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                        			    <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Year<span class="required">*</span>
                                            </label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                
                                                <select name="year" class="form-control">
                                                	<option value="">Year</option>
                                                          <?php for($i=1980;$i<=date('Y');$i++)
                                                          print("<option style='padding:3px; border-bottom:1px solid #ccc'>".$i."</option>"); ?>
                                                </select>
                                             <?php echo form_error('year', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                            
                                            
                                            
                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Month<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                             <select name="month"  class="form-control" onchange="alert(this.value)">
                                                                  <option value="">Month</option>
                                                                  <?php for($i=1;$i<13;$i++)
                                                           print("<option value='".date('F',strtotime('01.'.$i.'.2016'))."' style='padding:3px; border-bottom:1px solid #ccc'>".date('F',strtotime('01.'.$i.'.2016'))."</option>"); ?>	
                                                              </select>
                                                             <?php echo form_error('month', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                            
                                                            
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Event date<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                                
                                                                
                                                                <select name="eventdate"  class="form-control">
                                                                  <option value="">Day</option>
                                                                  <?php for($i=1;$i<=31;$i++)
                                                                  print("<option style='padding:3px; border-bottom:1px solid #ccc'>".$i."</option>"); ?>	
                                                              </select>
                                                             <?php echo form_error('eventdate', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                            
                                                            
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Event Details<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-5 col-sm-5 col-xs-12">                                                                
                                                                <textarea name="eventsdetails" class="form-control"></textarea>
                                                             <?php echo form_error('eventsdetails', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                            
                                                            
                                                            
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                               	     </div>
                                   </div> 
                                    
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <input type="hidden" name="ac_id" value="<?php echo $ac_id; ?>">
                                            <input type="reset" class="btn btn-primary" value="Reset">
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               