<?php
if ($rows['accepted'] == 0) {
    if ($post_active > 0) {
?>
        <br><br>
        <center>
            <div class="btn-group mt-2">
                <?php if ($rows['closed'] == 0) {
                    if ($rows['status'] == 1) {
                ?>
                        <button class="btn btn-warning btn-lg cw" data-toggle="modal" data-target="#acceptPopup">ACCEPT POST TO COLLECT</button>
                <?php
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
                                <div class="panel-body p-2"><br>
                                    <div class="row">
                                        <?php if ($posted_by == 'admin') {
                                        ?>
                                            <input type="hidden" name="accept_type" value="buyer">
                                        <?php } else {
                                        ?>
                                            <div class="col-md-12 mb-30">
                                                <label>How do you collect it?</label>
                                                <select name="accept_type" id="accept_type" onchange="optionChange()" required>
                                                    <option value="">CHOOSE AN OPTION</option>
                                                    <option value="buyer">COLLECT DIRECTLY</option>
                                                    <option value="buyer_admin">COLLECT THROUGH THE WASTE CATALOGUE</option>
                                                </select>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="col-md-12 mb-30" id="collection_date_div" <?php if ($posted_by != 'admin') { echo ' style="display: none;"'; } ?>>
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
        </div>
    <?php } ?>
    <script>
        function optionChange() {
            var accept_type = $("#accept_type").val();
            $("#collection_date_div").hide();
            $("#collection_date").prop('required', false);
            if (accept_type == 'buyer') {
                $("#collection_date_div").show();
                $("#collection_date").prop('required', true);
            } else if (accept_type == 'buyer_admin') {

            } else {

            }
        }
    </script>
<?php
} elseif ($rows['accepted'] == 1 && $rows['accepted_by'] == $user) {
    $qry_waste_process = $db->prepare("SELECT * FROM waste_process WHERE accepted_by = '$user' AND post_token = '$token'");
    $qry_waste_process->execute();
    $row_waste_process = $qry_waste_process->fetch();
?>
    <ul class="list-group mt-50">
        <li class="list-group-item">
            <h3><i class="fa fa-chevron-right mr-2 text-success"></i>You accepted this post at <?php echo time_convert($row_waste_process['accepted_on']); ?></h3>
        </li>
        <?php if ($row_waste_process['accept_type'] == 'buyer') { ?>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i>Collection date: <?php echo date_convert($row_waste_process['collection_date']); ?></h3>
            </li>
            <li class="list-group-item">
                <h3><i class="fa fa-chevron-right mr-2 text-success"></i>Collect by: Buyer</h3>
            </li>
        <?php }
        if($row_waste_process['accept_type'] == 'buyer_admin'){
            $qry_agent = $db->prepare("SELECT * FROM users WHERE token = '".$row_waste_process['agent']."'");
            $qry_agent->execute();
            $row_agent = $qry_agent->fetch();
            $collectBy = "Collect by: ".ucwords($row_agent['name'] . " - " . $row_agent['contact_no']);
        }
        if ($row_waste_process['accept_type'] == 'buyer_admin' && $row_waste_process['collection_date'] != '') { ?>
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