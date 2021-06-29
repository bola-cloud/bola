<?php 
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=product_crud','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo '<pre>';
var_dump($_FILES);
echo '<pre>';
exit;

$errors =[];
$title ='';
$describtion='';
$price ='';

if($_SERVER['REQUEST_METHOD']==='POST'){

$title = $_POST['title'];
$describtion = $_POST['describtion'];
$price = $_POST['price'];
$date= date('Y-m-d H:i:s');

if(!$title){
  $errors[]= 'product title is req';
}
if (!$price){
  $errors[]= 'product price is req' ;
}


$statement = $pdo->prepare("INSERT INFO products (title, images,describtion, price, create_date) 
VALUES  (:title , :images, :describtion ,:price, :date)");


$statement->bindValue(':title', $title);
$statement->bindValue(':images', '');
$statement->bindValue(':describtion', $describtion);
$statement->bindValue(':price', $price);
$statement->bindValue(':date', $date);


}
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
    <h1> create new product!</h1>

   
    <?php if (!empty($errors)): ?>
    </div>
    <div class="alert alert-danger">
      <?php foreach ($errors as $error): ?>
        <div><?php echo $error ?></div>
      <?php endforeach; ?>
    </div>
    <?php endif ?>
    <form action="" method="post" enctype="multipart/form-data" >
  <div class="form-group">
    <label >product images</label>
    <input type="file" name="images"  >
  </div>
  <div class="form-group">
    <label >product title</label>
    <input type="text" name="title" class="form-control" value="<?php echo $title ?>">
  </div> <div class="form-group">
    <label >product describtion</label>
    <textarea  class="form-control" name="describtion" ><?php echo $describtion ?></textarea>
  </div> <div class="form-group">
    <label >product price</label>
    <input type="number" step=".01" name="price" value="<?php echo $price ?>"  class="form-control" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
  </body>
</html>