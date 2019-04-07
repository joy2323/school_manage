<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					           <?php echo 'Create result checker pin';?>
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?student/view_result' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                  <div class="form-group">
        						<label for="field-2" class="col-sm-3 control-label">PIN</label>

        						<div class="col-sm-6">
        							<input type="text" name="pin" value="" required class="form-control" placeholder="Enter result pin">
        						</div>
        					</div>

                    <div class="form-group">
          						<div class="col-sm-offset-3 col-sm-5">
          							<button type="submit" class="btn btn-info">Check Result</button>
          						</div>
        					</div>
                        <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

	function get_class_sections(class_id) {

    	$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });

    }

</script>
