<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title">
            		<i class="entypo-plus-circled"></i>
					           Add new subject
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/subject/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">SUBJECT NAME</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"  autofocus value="" placeholder="Enter subject title">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">SELECT CLASS</label>
						<div class="col-sm-5">
              <select class="form-control" name="class_id">
                <option value="1">JSS</option>
                <option value="4">SSS</option>
                <option value="0">ALL</option>
              </select>
						</div>
					</div>

          <input type="hidden" name="teacher_id" value="0">

          <div class="form-group">
		         <div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-primary">Add Subject</button>
						</div>
					</div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
