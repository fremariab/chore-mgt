<?php
include "../actions/get_all_assignment_action.php";

function incomplete_stat($user_id,$user_role){
    $incomplete_chores_statistic=count(getassignments_incomplete($user_id,$user_role));
    return $incomplete_chores_statistic;

}

function inprogress_stat($user_id,$user_role){
    $inprogress_chores_statistic=count(getassignments_inprogress($user_id,$user_role));
    return $inprogress_chores_statistic;
}

function completed_stat($user_id,$user_role){
    $completed_chores_statistic=count(getassignments_completed($user_id,$user_role));
    return $completed_chores_statistic;

}

function all_stat($user_id,$user_role){
    $all_chores_statistic=count(getassignments($user_id,$user_role));
    return $all_chores_statistic;

}

function display_recent_stat($user_id,$user_role){
    $completed_chores= getassignments($user_id,$user_role);
    if ($user_role==3){
    ?>
    <table>
        <thead>
            <tr>
                <th>Chore Name</th>
                <th>Assigned By</th>
                <th>Date Due</th>
                <th>Date Completed</th>
                <th>  </th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($completed_chores) {
                $count = 0;
                foreach ($completed_chores as $data) {
            ?>
                    <tr>
                        <td><?php echo $data['chorname'] . ''; ?></td>
                        <td><?php echo $data['fname'] .' '; ?><?php echo $data['lname'] .''; ?></td>
                        <td><?php echo $data['date_assign'] . ''; ?></td>
                        <td><?php echo $data['date_due'] .''; ?></td> 
                        <td ><a href="../view/managechores.php" style="color:grey;text-decoration:none;">Chore details</a></td> 
                    </tr>
                <?php
                    $count++;
                    if ($count >= 3) {
                        break;  
                    }

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
<?php
}else{?><table>
    <thead>
        <tr>
            <th>Chore Name</th>
            <th>Assigned To</th>
            <th>Date Due</th>
            <th>Date Completed</th>
            <th>  </th>
     </thead>
    <tbody>
        <?php
        if ($completed_chores) {
            $count = 0;

            foreach ($completed_chores as $data) {

        ?>
                <tr>
                    <td><?php echo $data['chorname'] . ''; ?></td>
                    <td><?php echo $data['fname'] .' '; ?><?php echo $data['lname'] .''; ?></td>
                    <td><?php echo $data['date_assign'] . ''; ?></td>
                    <td><?php echo $data['date_due'] .''; ?></td> 
                     <td ><a href="../admin/assign_chore_view.php" style="color:grey;text-decoration:none;">Chore details</a></td> 

           
                </tr>
                </div>
            <?php
                $count++;
                if ($count >= 3) {
                    break;  
                }

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
<?php
}
}

function display_completed($user_id,$user_role){
    $completed_chores= getassignments_completed($user_id,$user_role);
     
    ?><table>
    <thead>
        <tr>
            <th>Chore Name</th>
            <th>Assigned To</th>
            <th>Date Due</th>
            <th>Date Completed</th>
            <th>Chore Status</th>
            <th>Actions</th>
    </thead>
    <tbody>
        <?php
        if ($completed_chores) {
            $count = 0;

            foreach ($completed_chores as $data) {

        ?>
                <tr>
                    <td><?php echo $data['chorname'] . ''; ?></td>
                    <td><?php echo $data['fname'] .' '; ?><?php echo $data['lname'] .''; ?></td>
                    <td><?php echo $data['date_assign'] . ''; ?></td>
                    <td><?php echo $data['date_due'] .''; ?></td> 
                    <td><?php echo $data['sname'] .''; ?></td> 

                    <td>
                    <a href="../actions/edit_assignment_action.php?id=<?php echo $data['assignmentid'] ?>" onclick="confirmation(<?php echo $data['assignmentid']; ?>) ; return false;"><i class="fa-solid fa-trash" style="color:#38B6FF;"></i></a>
                    <a href="../actions/edit_assignment_action.php?id=<?php echo $data['assignmentid'] ?>" onclick="confirmation(<?php echo $data['assignmentid']; ?>) ; return false;"><i class="fa-solid fa-trash" style="color:#38B6FF;"></i></a>
                    <a href="../actions/edit_assignment_action.php?id=<?php echo $data['assignmentid'] ?>" onclick="confirmation(<?php echo $data['assignmentid']; ?>) ; return false;"><i class="fa-solid fa-trash" style="color:#38B6FF;"></i></a>

                    </td>
                </tr>
                </div>
            <?php
                $count++;
                if ($count >= 3) {
                    break;  
                }

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
<?php
}


function display_ongoing($user_id,$user_role){
    $ongoing_chores= getongoing($user_id,$user_role);
    ?><table>
    <thead>
        <tr>
            <th>Chore Name</th>
            <th>Assigned By</th>
            <th>Date Due</th>
            <th>Date Completed</th>
            <th>Chore Status</th>
            <th>Actions</th>
    </thead>
    <tbody>
        <?php
        if ($ongoing_chores) {
            $count = 0;

            foreach ($ongoing_chores as $data) {

        ?>
                <tr>
                    <td><?php echo $data['chorname'] . ''; ?></td>
                    <td><?php echo $data['fname'] .' '; ?><?php echo $data['lname'] .''; ?></td>
                    <td><?php echo $data['date_assign'] . ''; ?></td>
                    <td><?php echo $data['date_due'] .''; ?></td> 
                    <td><?php echo $data['sname'] .''; ?></td> 

                    <td>
                    <a href="../actions/edit_assignment_action.php?sid=4&id=<?php echo $data['assignmentid'] ?>" onclick="confirmationIN(<?php echo $data['assignmentid']; ?>) ; return false;"><i class="fa-solid fa-ban" style="color:#38B6FF;"></i></a>
                    <a href="../actions/edit_assignment_action.php?sid=2&id=<?php echo $data['assignmentid'] ?>" onclick="confirmationIP(<?php echo $data['assignmentid']; ?>) ; return false;"><i class="fa-solid fa-hourglass-start" style="color:#38B6FF;"></i></a>
                    <a href="../actions/edit_assignment_action.php?sid=3&id=<?php echo $data['assignmentid'] ?>" onclick="confirmationC(<?php echo $data['assignmentid']; ?>) ; return false;"><i class="fa-solid fa-check" style="color:#38B6FF;"></i></a>

                    </td>
                </tr>
                </div>
            <?php
                $count++;
                if ($count >= 3) {
                    break;  
                }

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
<?php
}
?>

<script>
    function confirmationIP(assID) {
        if (confirm("Are you sure you want to update this chore?")) {
            window.location.href = "../actions/edit_assignment_action.php?sid=2&id=" + assID;
        }
    }
    function confirmationIN(assID) {
        if (confirm("Are you sure you want to update this chore?")) {
            window.location.href = "../actions/edit_assignment_action.php?sid=4&id=" + assID;
        }
    }
    function confirmationC(assID) {
        if (confirm("Are you sure you want to update this chore?")) {
            window.location.href = "../actions/edit_assignment_action.php?sid=3&id=" + assID;
        }
    }
</script>