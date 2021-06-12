<?php 
    require_once('setting/function2.php');
    $data = new main();

    foreach($data->all("user", "WHERE id_user='$_GET[id]'") as $d){
?>
<form action="setting/process.php?type=edit_user&table=user&id=<?php echo $d['id_user'] ?>" method="POST">
    <input type="text" name="username" placeholder="<?php echo $d['username'] ?>" value="<?php echo $d['username'] ?>"><br>
    <input type="text" name="pass" placeholder="<?php echo $d['pass'] ?>" value="<?php echo $d['pass'] ?>"><br>
    <input type="submit" value="Ubah">
</form>
<?php } ?>