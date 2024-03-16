<?php
if ($rows['accepted'] == 0 && trim($_SESSION['SESS_USER_TYPE']) == 'admin') {
?>
    <br><br>
    <!-- <center>
        <div class="btn-group mt-2">
            < ?php if ($rows['closed'] == 0) {
                if ($rows['status'] == 1) {
            ?>
                    <button class="btn btn-warning btn-lg cw" data-toggle="modal" data-target="#acceptPopup">ACCEPT POST TO COLLECT</button>
            < ?php
                }
            } ?>
        </div>
    </center>
    <div class="modal fade" id="acceptPopup" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="text-center">ACCEPT POST TO COLLECT</h2>
                </div>
                <div class="modal-body">
                    <div class="contact-middle" style="padding: 0;">
                        <form action="actions/post/accept.php" method="post">
                            <input type="hidden" name="post_token" value="<?php echo $token ?>">
                            <input type="hidden" name="accept_type" value="admin">
                            <div class="panel-body p-2"><br>
                                <div class="row">
                                    <div class="col-md-12 mb-30" id="collection_date_div">
                                        <label>Choose a date to collect it from Vendor</label>
                                        <input type="date" id="collection_date" name="collection_date" min="<?php echo date("Y-m-d") ?>">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="clearfix"></div>
                            <button type="button" onclick="location.reload();" class="btn btn-danger btn-lg pull-left mr-2">CANCEL</button>
                            <button type="submit" class="btn btn-success btn-lg pull-right">SEND ACCEPTANCE</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <?php
} elseif ($rows['accepted'] == 1) {
    $qry_waste_process = $db->prepare("SELECT * FROM waste_process WHERE post_token = '$token'");
    $qry_waste_process->execute();
    $row_waste_process = $qry_waste_process->fetch();

    $qry_byer = $db->prepare("SELECT * FROM users WHERE token = '" . $row_waste_process['accepted_by'] . "'");
    $qry_byer->execute();
    $row_byer = $qry_byer->fetch();

    if ($row_waste_process['accept_type'] == 'buyer_admin' && $row_waste_process['status'] == 1 && $row_waste_process['collection_date'] == NULL) { ?>
        <br><br>
        <center>
            <div class="btn-group mt-2">
                <?php if ($rows['closed'] == 0) {
                    if ($rows['status'] == 1) {
                ?>
                        <button class="btn btn-warning btn-lg cw" data-toggle="modal" data-target="#acceptPopup">UPDATE COLLECTION DATE</button>
                <?php
                    }
                } ?>
            </div>
        </center>
        <div class="modal fade" id="acceptPopup" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="text-center">UPDATE COLLECTION DATE</h2>
                    </div>
                    <div class="modal-body">
                        <div class="contact-middle" style="padding: 0;">
                            <form action="actions/post/accept.php" method="post">
                                <input type="hidden" name="post_token" value="<?php echo $token ?>">
                                <input type="hidden" name="accept_type" value="admin">
                                <input type="hidden" name="action" value="date">
                                <div class="panel-body p-2"><br>
                                    <div class="row">
                                        <div class="col-md-12 mb-30" id="collection_date_div">
                                            <label>Choose a date to collect it from Vendor</label>
                                            <input type="date" id="collection_date" name="collection_date" min="<?php echo date("Y-m-d") ?>">
                                        </div>
                                        <div class="col-md-12 mb-30">
                                            <label>Assigned Agent</label>
                                            <select name="agent" id="agent" required>
                                                <option value="">CHOOSE AN OPTION</option>
                                                <?php
                                                $qry = $db->prepare("SELECT * FROM users WHERE user_type = 'agent'");
                                                $qry->execute();
                                                if ($qry->rowcount() > 0) {
                                                    for ($i = 0; $rows = $qry->fetch(); $i++) {
                                                        $qryIn = $db->prepare("SELECT * FROM waste_process WHERE agent = '".$rows['token']."' AND status != 0");
                                                        $qryIn->execute();
                                                        if ($qryIn->rowcount() == 0) {
                                                ?>
                                                            <option value="<?php echo $rows['token'] ?>"><?php echo ucwords($rows['name'] . " - " . $rows['contact_no']) ?></option>
                                                <?php }
                                                    }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="clearfix"></div>
                                <button type="button" onclick="location.reload();" class="btn btn-danger btn-lg pull-left mr-2">CANCEL</button>
                                <button type="submit" class="btn btn-success btn-lg pull-right">SEND</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <ul class="list-group mt-50">
        <?php if ($row_waste_process['accept_type'] == 'admin') { ?>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i>You accepted this post at <?php echo time_convert($row_waste_process['accepted_on']); ?></h3>
            </li>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i>Collection date: <?php echo date_convert($row_waste_process['collection_date']); ?></h3>
            </li>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i>Collect by: Waste Catalogue Agent</h3>
            </li>
        <?php }
        if ($row_waste_process['accept_type'] == 'buyer') { ?>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i>Buyer accepted this post at <?php echo time_convert($row_waste_process['accepted_on']); ?></h3>
            </li>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i>Collection date: <?php echo date_convert($row_waste_process['collection_date']); ?></h3>
            </li>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i>Collect by: Buyer</h3>
            </li><?php }
                if ($row_waste_process['accept_type'] == 'buyer_admin') {
                    $collectBy = '';
                    $qry_agent = $db->prepare("SELECT * FROM users WHERE token = '" . $row_waste_process['agent'] . "'");
                    $qry_agent->execute();
                    if ($qry_agent->rowcount() > 0) {
                        $row_agent = $qry_agent->fetch();
                        $collectBy = "Collect by: " . ucwords($row_agent['name'] . " - " . $row_agent['contact_no']);
                    }
                    ?>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i>
                    <?php echo strtoupper($row_byer['name'] . " (" . $row_byer['company'] . ")") ?> accepted this post at <?php echo time_convert($row_waste_process['accepted_on']); ?>
                </h3>
            </li>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i>
                    <?php echo "CONTACT BUYER: " . ucwords($row_byer['address'] . " - " . $row_byer['contact_no']); ?>
                </h3>
            </li>
            <?php if ($row_waste_process['collection_date'] != NULL) { ?>
                <li class="list-group-item">
                    <h3><i class="fa fa-chevron-right mr-2 text-success"></i>Collection date: <?php echo date_convert($row_waste_process['collection_date']); ?></h3>
                </li>
            <?php } ?>
            <?php if ($collectBy != '' && trim($_SESSION['SESS_USER_TYPE']) == 'admin') { ?>
                <li class="list-group-item">
                    <h3><i class="fa fa-chevron-right mr-2 text-success"></i><?php echo $collectBy ?></h3>
                </li>
            <?php } ?>
        <?php }
                if ($row_waste_process['status'] == 2 || $row_waste_process['status'] == 3 || $row_waste_process['status'] == 0) {
                    $qry_invoice = $db->prepare("SELECT * FROM invoice WHERE post_token = '$token'");
                    $qry_invoice->execute();
                    $row_invoice = $qry_invoice->fetch();
        ?>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i>INVOICE GENERATED: <?php echo 'Rs. ' . $row_invoice['total'] ?></h3>
            </li>
        <?php
                }
                if ($row_waste_process['status'] == 3 || $row_waste_process['status'] == 0) {
        ?>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i>TRANSIT</h3>
            </li>
        <?php
                }
                if ($row_waste_process['status'] == 0) {
        ?>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i>CLOSED</h3>
            </li>
        <?php
                } ?>
    </ul>
<?php } ?>