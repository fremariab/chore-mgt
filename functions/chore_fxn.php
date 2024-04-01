<?php
include "../actions/get_all_chores_action.php";

$var_data = getchores();
$user_role=getUserRole();

?><table>
    <thead>
        <tr>
            <th>Chore Name</th>
            <th>Actions</th>
    </thead>
    <tbody>
        <?php
        if ($var_data) {
            foreach ($var_data as $data) {
        ?>
                <tr id="<?php echo $data['cid']?>">
                    <td><?php echo $data['chorname'] ?? ''; ?></td>
                    <td>
                        <?php if ($user_role==2){ ?>
                            <a href=""><i class="fa-solid fa-trash" style="color:#38B6FF;"></i></a>
                        <?php }else if ($user_role==1){ ?>
                            <a href="../actions/delete_chore_action.php?id=<?php echo $data['cid'];?>"  onclick="confirmDelete(<?php echo $data['cid']; ?>) ; return false;"><i class="fa-solid fa-trash" style="color:#38B6FF;"></i></a>
                         <?php } ?>
                        <a href="../admin/edit_chore_view.php?id=<?php echo $data['cid'] ?>"><i class="fa-solid fa-pen-to-square" style="color:#38B6FF;"></i></a>

                    </td>
                    <?php
                    if (isset($_GET['error'])) { ?>

                        <td class="error">

                            <?php echo $_GET['error'] ?>
                    <?php }
                } ?>
                        </td>
                </tr>
                </div>
            <?php
        } else { ?>
                <tr>
                    <td colspan=2>
                        <center> No results found.
                        </center>
                    </td>
                </tr>
            <?php } ?>
    </tbody>
</table>
<script>
    function confirmDelete(choreId) {
        if (confirm("Are you sure you want to delete this chore?")) {
            window.location.href = "../actions/delete_chore_action.php?id=" + choreId;
        }


    }
</script>

