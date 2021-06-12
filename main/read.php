
<a href="create">Create data</a>
<table border='1'>
    <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Aksi</th>
    </tr>
    <?php 
        require_once('setting/function2.php');
        $data = new main();
        
        foreach($data->all("user") as $d){
    ?>
    <tr>
        <td><?php echo $d['username'] ?></td>
        <td><?php echo $d['pass'] ?></td>
        <td>
            <a href="setting/process.php?type=delete&table=user&id=<?php echo $d['id_user'] ?>">Hapus</a>
            <a href="edit?id=<?php echo $d['id_user'] ?>">Edit</a>
        </td>
    </tr>
    <?php } ?>
</table>
