<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
</head>

<body>
    <?php

    $username = $_SESSION['username'];
    $get_user_query = "Select * from `user_table` where username='$username'";
    $result_users = mysqli_query($con, $get_user_query);
    $row_fetch = mysqli_fetch_assoc($result_users);
    $user_id = $row_fetch['user_id'];
    ?>
    <h3 class="text-sucess text-center">All my Orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>S.no.</th>
                <th>Amount Due</th>
                <th>Total Products</th>
                <th>Invoice No</th>
                <th>Date</th>
                <th>Complete/Pending</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php

            $get_order_details_query = "Select * from user_orders where user_id=$user_id";
            $result_orders = mysqli_query($con, $get_order_details_query);
            $number = 0;
            while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                $order_id = $row_orders['order_id'];
                $amount_due = $row_orders['amount_due'];
                $total_products = $row_orders['total_products'];
                $invoice_no = $row_orders['invoice_number'];
                $date = $row_orders['order_date'];
                $order_status = $row_orders['order_status'];
                $number++;

                echo "
                <tr>
                    <td>$number</td>
                    <td>$amount_due</td>
                    <td>$total_products</td>
                    <td>$invoice_no</td>
                    <td>$date</td>
                    <td>$order_status</td>";
            ?>
            <?php

                if ($order_status == 'Complete') {
                    echo "
                    <td>Paid</td>
                </tr>";
                } else {
                    echo "
                    <td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>
                </tr>";
                }
            }
            ?>


        </tbody>
    </table>
</body>

</html>