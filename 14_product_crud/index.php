<?php 
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=product_crud','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statement =$pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
$statement->execute();
$products =$statement->fetchAll(PDO::FETCH_ASSOC);


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <h1>product crud!</h1>
    <p>
    <a  href="create.php" class="btn btn-success">Create product</a>
    </p>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">image</th>
      <th scope="col">Title</th>
      <th scope="col">price</th>
      <th scope="col">create date</th>
      <th scope="col">action</th>


    </tr>
  </thead>
  <tbody>
   <?php foreach ($products as $i => $product) : ?>
    <tr>
    <td></td>
      <th scope="row"><?php echo $i + 1 ?></th>
      <td><?php echo $product['title']?></td>
      <td><?php echo $product['price']?></td>
      <td><?php echo $product['create_date']?></td>
      <td>
      <button type="button" class="btn btn-outline-primary">edit</button>
      <button type="button" class="btn btn-outline-danger">delete</button>

      </td>
    </tr>
   <?php endforeach; ?>
    
  </tbody>
</table>
    
  </body>
</html>