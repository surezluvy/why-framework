
<a href="index.php?page=create">Create data</a>
<table border='1'>
    <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Aksi</th>
    </tr>
    <?php 
        include '../setting/function.php'; 
        $data = new crud();
        
        foreach($data->read("user") as $d){
    ?>
    <tr>
        <td><?php echo $d['username'] ?></td>
        <td><?php echo $d['pass'] ?></td>
        <td><a href="../setting/process.php?type=delete&table=user&id=<?php echo $d['id_user'] ?>">Hapus</a></td>
    </tr>
    <?php } ?>
</table>
