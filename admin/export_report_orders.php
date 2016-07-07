<?php
	include "../config.php"; 
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment; filename=report_order.xls');
	$all_transaksi = fetchData('multiple',"SELECT *,tr.`created_timestamp` AS created_timestamp
			                                FROM transaksi tr
			                                JOIN tbl_user u ON tr.`user_id`=u.`id`
			                                WHERE 1");
?>
<html>
<head>
	<title></title>
<style type="text/css">
	th{
		background-color: black;
		color: white;
	}
</style>
</head>
<body>
	<table>
		<tr>
			<th style="background-color: black;color: white;">ORDER ID</th>
            <th style="background-color: black;color: white;">DATE</th>
			<th style="background-color: black;color: white;">CUSTOMER</th>
			<th style="background-color: black;color: white;">TOTAL BELANJA</th>
			<th style="background-color: black;color: white;">TOTAL SHIPPING</th>
			<th style="background-color: black;color: white;">GRAND TOTAL</th>
		</tr>
		<?php if (isset($all_transaksi)): ?>
		<?php foreach ($all_transaksi as $key => $value)
		{ ?>
        <tr>
        	<td><?php echo $value->order_id ?></td>
        	<td><?php echo $value->created_timestamp ?></td>
        	<td><?php echo $value->first_name ?></td>
        	<td><?php echo $value->total_belanja ?></td>
        	<td><?php echo $value->total_shipping ?></td>
        	<td><?php echo $value->total_belanja+$value->total_shipping ?></td>
		    <td><?php // echo str_replace(".00", "", $value['jumlah_simpanan']) ?></td>
        </tr>
			<?php  } ?>
		<?php endif ?>
	</table>
</body>
</html>