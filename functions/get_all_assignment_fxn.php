<?php
include "../actions/get_all_assignment_action.php";

$var_data = getassignments($user_id,$user_role);
?><table>
    <thead>
        <tr>
            <th>Chore Name</th>
            <th>Assigned To</th>
            <th>Date Assigned</th>
            <th>Date Due</th>
            <th>Chore Status</th>
            <th>Actions</th>
    </thead>
    <tbody>
        <?php
        if ($var_data) {
            foreach ($var_data as $data) {

        ?>
                <tr>
                    <td><?php echo $data['chorname'] . ''; ?></td>
                    <td><?php echo $data['fname'] .' '; ?><?php echo $data['lname'] .''; ?></td>
                    <td><?php echo $data['date_assign'] . ''; ?></td>
                    <td><?php echo $data['date_due'] .''; ?></td>
                    <td><?php echo $data['sname'] . ''; ?></td>
 
                    <td>
                    <?php if ($user_role==2){ ?>
                        <a href=""><i class="fa-solid fa-trash" style="color:#38B6FF;"></i></a>
                        <?php }else if ($user_role==1){ ?>
                            <a href="../actions/delete_assignment_action.php?id=<?php echo $data['assignmentid'] ?>" onclick="confirmDelete(<?php echo $data['assignmentid']; ?>) ; return false;"><i class="fa-solid fa-trash" style="color:#38B6FF;"></i></a>
                         <?php } ?>
                    </td>
                </tr>
                </div>
            <?php
            }}else { ?>
                <tr>
                    <td colspan=6>
                        <center> No results found.
                        </center>
                    </td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<script>
    function confirmDelete(assignmentid) {
        if (confirm("Are you sure you want to delete this assignment?")) {
            window.location.href = "../actions/delete_assignment_action.php?id=" + assignmentid;
        }
    }
</script>

