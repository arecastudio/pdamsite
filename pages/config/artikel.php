<script type="text/javascript">document.getElementById('artikel').className='active'</script>

<h2>Artikel</h2>

<div class="table-parent">
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Tag</th>
				<th>Judul</th>
				<th>Penulis</th>
				<th>Tgl Posting</th>
				<th>Tgl Update</th>
				<th>Status</th>
				<th colspan="2">Kontrol</th>
			</tr>
		</thead>
		<tbody>

			<?php

$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
$sql="
SELECT 
	id,
	tag_id,
	judul,
	isi,
	foto,
	users_id,
	users_id_ubah,
	tgl,
	tgl_ubah,
	is_publish,
	hit 
FROM 
	artikel 
ORDER BY 
	tgl DESC
;";
$i=0;
$stmt=$conn->prepare($sql);
$stmt->execute();
$artikel=$stmt->get_result();
while ($row=$artikel->fetch_row()) {
	$i++;
	$status="Published";
	if($row[9]=='0') $status="Unpublished";
	echo "
	<tr>
		<td>$i</td>
		<td>$row[1]</td>
		<td>$row[2]</td>
		<td>$row[5]</td>
		<td>$row[7]</td>
		<td>$row[8]</td>
		<td>$status</td>
				
		<td><a href=\"".base_url_cfg2()."artikel-mod/$row[0]\"><span class=\"glyphicon glyphicon-pencil\"></span>&nbsp;</a></td>
		<td><a href=\"".base_url_cfg2()."artikel-del/$row[0]\"><span class=\"glyphicon glyphicon-trash\"></span>&nbsp;</a></td>
	</tr>
	";
}

$artikel->close();
$conn->close();
			?>

		</tbody>
		<tfoot>
			<tr>			
				<td colspan="6">Keterangan</td>
			</tr>
		</tfoot>
	</table>
</div>

<div>
	<a href="<?php echo base_url_cfg();?>?cfg=artikel-tambah" class="btn btn-primary" id="btn_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah Artikel</a>
</div>

<?php
#echo get_slug("Regular expression function that replaces spaces between words with hyphens. jangan/ juga-juga");
?>

<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->