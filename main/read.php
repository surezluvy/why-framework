
<a href="create">Create data</a>
<table border='1'>
    <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Aksi</th>
    </tr>
    <?php 
        foreach($ambil_data as $d){
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
