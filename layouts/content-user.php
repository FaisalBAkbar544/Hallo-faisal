<!-- content user management -->
<script>
    function KonfirmasiHapus() {
        return confirm("Anda yakin data ini akan dihapus?");
    }
</script>

<?php
    if (!isset($_SESSION['U']) and (!isset($_SESSION['P']))){
        $hidestatus ="hidden";
        $hr="";
    } else{       
        $hidestatus ="";
        $hr="<hr>";
    }
    include("../configs/connection.php");
    $sql = mysqli_query($connect, "select * from user");
?>

<button class="btn btn-info" <?php echo $hidestatus; ?> onclick="location.href='user-form.php?id'">Add Data</button>
<?php echo $hr; ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col" <?php echo $hidestatus; ?>>Action</th>
        </tr>
    </thead>

    <?php
        $nomor=1;
        while($data = mysqli_fetch_array($sql)) { ?>
        <tbody>
            <tr>
                <td scope="row"> <?php echo $nomor; ?> </td>
                <td> <?php echo $data['name']; ?> </td>
                <td> <?php echo $data['username'];?> </td>
                <td <?php echo $hidestatus; ?>>
                    <a href="user-form.php? id=<?php echo $data['id_user']; ?>" class="text-primary">Edit</a> |
                    <a href="../layouts/content-user-delete.php? id=<?php echo $data['id_user'];?>" class="text-danger" onclick="return KonfirmasiHapus()">Delete</a>
                </td>
            </tr>
        </tbody>
    <?php $nomor++; } ?>
</table>

<!-- end of content user management -->