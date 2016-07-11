<?php
	include "../config.php"; 
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment; filename=report_stock_manager.xls');
	$all_product = fetchData('multiple',"SELECT *,pr.`id` AS id_product
			                                FROM product pr
			                                JOIN product_category pc ON pc.`id`=pr.`id_category`
			                                LEFT JOIN stock_product sp ON pr.`id`=sp.`id_product`
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
			<th style="background-color: black;color: white;">KODE BARANG</th>
            <th style="background-color: black;color: white;">NAMA BARANG</th>
			<th style="background-color: black;color: white;">CATEGORY PRODUCT</th>
			<th style="background-color: black;color: white;">MERK</th>
			<th style="background-color: black;color: white;">PRICE</th>
			<th style="background-color: black;color: white;">STOCK</th>
			<th style="background-color: black;color: white;">QTY BOOKED</th>
		</tr>
		<?php if (isset($all_product)): ?>
		<?php foreach ($all_product as $key => $value)
		{ 
			$sql_booked = "SELECT SUM(qty) AS qty_booked
                                          FROM transaksi tr
                                          JOIN transaksi_detail trd ON tr.`order_id`=trd.`order_id`
                                          WHERE 1
                                          AND tr.`status`='checkout'
                                          AND trd.`product_id`='".$value->id_product."'
                                          GROUP BY trd.`product_id`";
            $get_booked = fetchData('single',$sql_booked);
		?>
        <tr>
        	<td><?php echo $value->kode_product ?></td>
        	<td><?php echo $value->nama_product ?></td>
        	<td><?php echo $value->name_category ?></td>
        	<td><?php echo $value->merk ?></td>
        	<td><?php echo $value->selling_price ?></td>
        	<td><?php echo $value->qty==null?'0':$value->qty ?></td>
		    <td><?php echo $get_booked->qty_booked?$get_booked->qty_booked:'0' ?></td>
        </tr>
			<?php  } ?>
		<?php endif ?>
	</table>
</body>
</html>