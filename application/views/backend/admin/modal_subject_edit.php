<?php
	$edit_data = $this->db->get_where('subject' , array('subject_id' => $param2))->result_array();
	foreach ($edit_data as $row):
?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title">
            		<i class="entypo-plus-circled"></i>
								Edit Subject
            	</div>
            </div>
			<div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/subject/do_update/' . $row['subject_id'] , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">SUBJECT NAME</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="<?php echo $row['name'];?>">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">CLASS</label>
						<div class="col-sm-5">
							<select class="form-control" name="class_id">
								<option value="1" <?php if($row['class_id'] == 1) echo 'selected'; ?> >JSS</option>
								<option value="4" <?php if($row['class_id'] == 4) echo 'selected'; ?> >SSS</option>
								<option value="0" <?php if($row['class_id'] == 0) echo 'selected'; ?> >ALL</option>
							</select>
						</div>
					</div>

					<input type="hidden" name="teacher_id" value="<?php echo $row['teacher_id']; ?>">

          <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-primary"><?php echo get_phrase('update');?></button>
						</div>
					</div>
                <?php echo form_close();?>
        </div>
        </div>
    </div>
</div>
<?php endforeach;?>
