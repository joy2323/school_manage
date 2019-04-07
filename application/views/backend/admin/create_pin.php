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

                <?php echo form_open(base_url() . 'index.php?admin/create_pins' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                  <div class="form-group">
        						<label for="field-2" class="col-sm-3 control-label">CLASS</label>

        						<div class="col-sm-5">
        							<select name="class_id" class="form-control selectboxit" data-validate="required" id="class_id" data-message-required="<?php echo get_phrase('value_required');?>"
        									onchange="return get_class_sections(this.value)">
                          <option value="">Select class</option>
                          <?php
                            $classes = $this->db->get('class')->result_array();
        				            foreach($classes as $row):
        									?>
                          		<option value="<?php echo $row['class_id'];?>">	<?php echo $row['name'];?> </option>
                          <?php
        						        endforeach;
        		              ?>
                      </select>
        						</div>
        					</div>

									<div class="form-group">
										<label for="field-2" class="col-sm-3 control-label">SUB-CLASS</label>
		                    <div class="col-sm-5">
		                        <select name="section_id" class="form-control" id="section_selector_holder">
		                            <option value=""><?php echo get_phrase('select_class_first');?></option>

			                    </select>
			                </div>
									</div>

        					<div class="form-group">
        						<label for="field-2" class="col-sm-3 control-label">TERM</label>
                    <div class="col-sm-5">
                      <select name="term" class="form-control selectboxit">
                          <option value="1">1st</option>
                          <option value="2">2nd</option>
                          <option value="3">3rd</option>
                      </select>
                    </div>
        					</div>

                  <div class="form-group">
        						<label for="field-2" class="col-sm-3 control-label">SESSION</label>
                    <div class="col-sm-5">
                      <select name="session" class="form-control selectboxit" required>
                          <option value="">Select Session</option>
													<?php
														$this->db->select('session');
														$this->db->distinct();
														$this->db->from('term_jss');
														$result = $this->db->get()->result();
        									?>
													<?php foreach ($result as $key => $value): ?>
														<option value="<?php echo $value->session; ?>">	<?php echo $value->session; ?> </option>
													<?php endforeach; ?>
                      </select>
                    </div>
        					</div>

                    <div class="form-group">
          						<div class="col-sm-offset-3 col-sm-5">
          							<button type="submit" class="btn btn-info">Create Pin</button>
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
