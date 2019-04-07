      <?php
        $array = array('sub_class' => $section_id, 'session' => $session, 'term' => $term, 'class' => $class_id);
        $data	=	$this->db->get_where('result_pins' , $array)->result_array();
      ?>
      <?php if (count($data) > 0): $sn = 1;?>
        <table class="table table-bordered datatable" id="table_export">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th width=""><div>NAME</div></th>
                    <th width=""><div>PIN</div></th>
                </tr>
            </thead>
            <tbody>

                  <?php foreach ($data as $key):
                    $students	=	$this->db->get_where('student' , array('student_id' => $key['student_id']))->result_array();
                    foreach($students as $row){
                      $name = $row['name'];
                      break;
                    }
                  ?>
                <tr>
                    <td><?php echo $sn; $sn++; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $key['pin'];?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
      <?php else: ?>
        <div class="class alert alert-info">
          <h2>Result pins have not been created for this class.</h2>
        </div>
      <?php endif; ?>

<!-----  DATA TABLE EXPORT CONFIGURATIONS ----->
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
						"mColumns": [0, 2, 3, 4]
					},
					{
						"sExtends": "pdf",
						"mColumns": [0, 2, 3, 4]
					},
					{
						"sExtends": "print",
						"fnSetText"	   : "Press 'esc' to return",
						"fnClick": function (nButton, oConfig) {
							datatable.fnSetColumnVis(1, false);
							datatable.fnSetColumnVis(5, false);

							this.fnPrint( true, oConfig );

							window.print();

							$(window).keyup(function(e) {
								  if (e.which == 27) {
									  datatable.fnSetColumnVis(1, true);
									  datatable.fnSetColumnVis(5, true);
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
