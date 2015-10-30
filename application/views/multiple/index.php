<!DOCTYPE html>
<html>
<head>
	<title>Display </title>
</head>
<body>
<a href="<?= site_url('Multiple/form')?>">Add New Product</a>
<table>
	<thead>
	<tr>
		<th>Product Id</th>
		<th>Product Description</th>
		<th>Product Picture</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>
	
	

	
	
<?php
	foreach($data->result() as $row)
	{
		?>
		<tr>
			<td><?php echo $row->id ?></td>
			<td><?php echo $row->product_description ?></td>
			<td><img style="width:200px; height:200px" src="<?php echo base_url('assets/images/gallery/'.$row->product_name)  ?>" alt=""></td>
			<td>
				<a href="<?php echo site_url('Multiple/edit_product_image').'/'.$row->id?> ">Edit</a>| 
				<a href="<?php site_url('Multiple/delete'.'/'.$row->id)?>">Delete</a>
			</td>
		</tr>
<?php
	}
?>
	</tbody>
</table>

</body>
</html>