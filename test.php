<?php require 'vendor/autoload.php'; // include Composer's autoloader
$client = new MongoDB\Client("mongodb://localhost:27017");
$shop = $client -> shop;
$collection= $shop -> product;
$doclist =  $collection->find(array(), array('projection' => array('_id'=>false)));
$data = iterator_to_array($doclist);
 ?>
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Тег INPUT</title>
 </head>
 <body>
	<table>
		<thead>
			<tr>
				<?php foreach ($data[0] as $key => $value): ?>
					<th>
						<?php echo $key; echo "    ";  ?>
					</th>
				<?php endforeach; ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $entry):?>
				<tr>
					<?php foreach ($entry as $key => $value) :?>
						<td>
							<?php echo $value;  ?>
						</td>
						<?php endforeach; ?>
				</tr>
				<?php endforeach; ?>
		</tbody>
	</table>
 <form  name="test" method="post" >
  <p><b>Наименования товара:</b><br>
   <input  name="name" type="text" size="40">
  </p>
    <p><b>Категория:</b><br>
   <input name="categ" type="text" size="40" >
  </p>
  <p><b>Бренд:</b><br>
   <input  name="brand" type="text" size="40" >
  </p>
    <p><b>Описание:</b><br>
   <input name="disc" type="text" size="40"	>
  </p>
  <p><input name="submit" type="submit" value="Добавить" ></p>



 </form>

 </body>
</html>
<?php


	$name=trim($_POST['name']);
	$categ =  trim($_POST['categ']);
	$brand = trim($_POST['brand']);
	$disc = trim($_POST['disc']);




$collection = $client->shop->product;
if (isset($_POST['submit'])){
$result = $collection->insertOne( [ 'name' => $name, 'categ' => $categ,'brand' => $brand, 'disc' => $disc ] );
};



?>