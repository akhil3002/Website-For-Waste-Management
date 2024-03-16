<?php
if ($rows['accepted'] == 0) {
?>
    <br><br>
    <center>
        <h3>ACTIONS</h3>
        <div class="btn-group mt-2">
            <a href="myposts.php" class="btn btn-success btn-lg cw">GO BACK</a>
            <a href="myaccount.php" class="btn btn-warning btn-lg cw">DASHBOARD</a>
            <?php if ($rows['closed'] == 0) {
            ?>
                <?php
                if ($rows['status'] == 1) {
                ?>
                    <a href="actions/myposts/status.php?token=<?php echo $rows['token'] ?>" class="btn btn-danger btn-lg cw">UNPUBLISH</a>
                <?php
                } else {
                ?>
                    <a href="actions/myposts/status.php?token=<?php echo $rows['token'] ?>" class="btn btn-success btn-lg cw">PUBLISH</a>
                <?php
                }
                ?>
                <a href="edit-post.php?token=<?php echo $rows['token'] ?>" class="btn btn-primary btn-lg cw">EDIT</a>
            <?php
            } ?>
        </div>
    </center>
<?php }
if ($rows['accepted'] == 1) {
    $qry_waste_process = $db->prepare("SELECT * FROM waste_process WHERE post_token = '$token'");
    $qry_waste_process->execute();
    $row_waste_process = $qry_waste_process->fetch();

    $qry_byer = $db->prepare("SELECT * FROM users WHERE token = '".$row_waste_process['accepted_by']."'");
    $qry_byer->execute();
    $row_byer = $qry_byer->fetch();

    if($row_waste_process['accept_type'] == 'buyer_admin'){
        $qry_agent = $db->prepare("SELECT * FROM users WHERE token = '".$row_waste_process['agent']."'");
        $qry_agent->execute();
        $row_agent = $qry_agent->fetch();
        $collectBy = "Collect by: ".ucwords($row_agent['name'] . " - " . $row_agent['contact_no']);
    }
    if($row_waste_process['accept_type'] == 'buyer'){
        $collection = 'Collection date:' . date_convert($row_waste_process['collection_date']).'<br>By: '.$row_byer['name'];
        $collectBy = "Collect by: ".ucwords($row_byer['name']);
    }
?>
    <ul class="list-group mt-50">
        <li class="list-group-item">
            <h3><i class="fa fa-chevron-right mr-2 text-success"></i><?php echo ucwords($row_byer['name']) ?> accepted this post at <?php echo time_convert($row_waste_process['accepted_on']); ?></h3>
        </li>
        <?php if ($row_waste_process['accept_type'] == 'buyer' || $row_waste_process['accept_type'] == 'admin') { ?>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i>Collection date: <?php echo date_convert($row_waste_process['collection_date']); ?></h3>
            </li>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i><?php echo $collectBy ?></h3>
            </li>
        <?php } elseif ($row_waste_process['accept_type'] == 'buyer_admin' && $row_waste_process['collection_date'] != '') { ?>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i>Collection date: <?php echo date_convert($row_waste_process['collection_date']); ?></h3>
            </li>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i><?php echo $collectBy ?></h3>
            </li>
        <?php } elseif ($row_waste_process['accept_type'] == 'buyer_admin' && $row_waste_process['collection_date'] == '') { ?>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i>Collect by Waste Catalogue</h3>
            </li>
        <?php } ?>
        <?php if ($row_waste_process['status'] == 2 || $row_waste_process['status'] == 3 || $row_waste_process['status'] == 0) {
            $qry_invoice = $db->prepare("SELECT * FROM invoice WHERE post_token = '$token'");
            $qry_invoice->execute();
            $row_invoice = $qry_invoice->fetch();
        ?>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i>INVOICE GENERATED: <?php echo 'Rs. '.$row_invoice['total'] ?></h3>
            </li>
            <?php
        } ?><?php if ($row_waste_process['status'] == 3 || $row_waste_process['status'] == 0) {
            ?>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i>TRANSIT</h3>
            </li>
            <?php
            } ?><?php if ($row_waste_process['status'] == 0) {
                ?>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i>CLOSED</h3>
            </li>
        <?php
                } ?>
    </ul>

<?php } ?>