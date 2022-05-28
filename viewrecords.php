<?php
        $title = "View Attendees";
        require_once 'includes/header.php';
        require_once 'includes/auth_check.php';
        require_once 'db/conn.php';

        $result = $crud->getAttendees();
?>
<br>
<table  class="table">
    <tr>
        <th> # </th>
        <th> First Name </th>
        <th> Last Name </th>
        <th> Area of Expertise </th>
        <th> Action </th>
    </tr>
    <?php
        // data here
        while($row = $result->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
                <td> <?php echo $row['attendee_id'] ?> </td>
                <td> <?php echo $row['firstname'] ?> </td>
                <td> <?php echo $row['lastname'] ?> </td>
                <td> <?php echo $row['name'] ?> </td>
                <td> 
                    <a href="viewone.php?id=<?php echo $row['attendee_id'] ?>" class="btn btn-primary"> View</a> 
                    <a href="edit.php?id=<?php echo $row['attendee_id'] ?>" class="btn btn-warning"> Edit</a> 
                    <a onclick="return confirm('Are you sure to delete this record')" href="delete.php?id=<?php echo $row['attendee_id'] ?>" class="btn btn-danger"> Delete</a> 
                </td>
            </tr>

       <?php } ?>
    
</table>


<br>
    <?php
        require_once 'includes/footer.php';
?>