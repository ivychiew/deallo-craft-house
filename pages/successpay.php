<?php
    include "config.php";

    $name = $_GET['item_name'];
    $tx = $_GET['tx'];
    $amt = $_GET['amt'];
    $currency = $_GET['cc'];
    $status = $_GET['st'];
    $date = date('Y/m/d');
    $time = date('H:m');

    // if no error occured, continue ....
    if(!isset($errMSG))
    {
        $stmt = $dbh->prepare('INSERT INTO payments(item_name,	 txn_id, payment_gross, currency, payment_status, date, time) VALUES(:pname, :ptxn, :pamt, :pcc, :pstatus, :pdate, :ptime)');
        $stmt->bindParam(':pname',$name);
        $stmt->bindParam(':ptxn',$tx);
        $stmt->bindParam(':pamt',$amt);
        $stmt->bindParam(':pcc',$currency);
        $stmt->bindParam(':pstatus',$status);
        $stmt->bindParam(':pdate',$date);
        $stmt->bindParam(':ptime',$time);


        if($stmt->execute())
        {
            $successMSG = "new record succesfully inserted ...";
            header("refresh:2;transactionHistory.php"); // redirects image view page after 5 seconds.
        }
        else
        {
            $errMSG = "error while inserting....";
        }
    }
?>
