
            <a href="<?php echo base_url();?>index.php?admin/parents_password/true"
            	class="btn btn-primary pull-right">
                <i class="entypo-plus-circled"></i>
                	Reset Passwords
                </a>
                <br><br>
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            <th><div>SN</div></th>
                            <th><div>PARENTS NAME</div></th>
                            <th><div>PASSWORD</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $sn = 1;
                                $parents	=	$this->db->get('parent' )->result_array();
                                foreach($parents as $row):?>
                        <tr>
                            <td> <?php echo $sn++; ?> </td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['password'];?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->
<script type="text/javascript">

	jQuery(document).ready(function($)
	{


		var datatable = $("#table_export").dataTable({
			"sPaginationType": "bootstrap",
			"sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
			"oTableTools": {
				"aButtons": [

					{
						"sExtends": "xls",
						"mColumns": [1,2]
					},
					{
						"sExtends": "pdf",
						"mColumns": [1,2]
					},
					{
						"sExtends": "print",
						"fnSetText"	   : "Press 'esc' to return",
						"fnClick": function (nButton, oConfig) {
							datatable.fnSetColumnVis(0, false);
							datatable.fnSetColumnVis(3, false);

							this.fnPrint( true, oConfig );

							window.print();

							$(window).keyup(function(e) {
								  if (e.which == 27) {
									  datatable.fnSetColumnVis(0, true);
									  datatable.fnSetColumnVis(3, true);
								  }
							});
						},

					},
				]
			},

		});

		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});

</script>
