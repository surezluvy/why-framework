<?php 
    include '../setting/function.php'; 
    $data = new crud();
    
    foreach($data->read("user") as $d){
?>
<pre><?php print_r($d) ?></pre>
<?php } ?>

<a href="index.php?page=create">Create data</a>