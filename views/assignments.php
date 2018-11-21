<?php
    session_start();
    require('views.lib');
    $crn = $_GET['crn'];
    $_SESSION['crn'] = $crn;
    

$conn = db();
$query = $conn->query("SELECT * FROM instructor WHERE username='".$_SESSION['username']."'");
if($query->num_rows == 1) {
    $add_assign = nav_button('Add Assignment', 'add_assignment.php?crn='.$crn); 
    $acc_btn = nav_button('Delete', 'delete_assignment.php='.$crn);
} else {
    $add_assign = '';
    $acc_btn = nav_button('Submit', 'submit_assignment.php='.$crn);
}
$sql = "SELECT DISTINCT assignment FROM grades WHERE crn=".$crn;

$query = $conn->query($sql);
$results = $query->fetch_all(MYSQLI_ASSOC);


echo '<div class="row">
            <div class="col-sm-auto col-md-auto">
                <div class="card card-accent-primary">
                    <div class="card-header">
                        Assignments: '.$crn.'&nbsp&nbsp&nbsp&nbsp
                        <div class="float-right">'.$add_assign.'</div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>';

                        foreach ($results as $key=>$value) {
                            foreach ($value as $k=>$assignment) {
                                echo '<td>'.$assignment.'</td><td>
                                <td>'.$acc_btn.'</td>';
                                }
                            echo '</tr>';
                            }
                        echo '</table>
                    </div>
                </div>
            </div>
        </div>';
$conn->close();
?>
