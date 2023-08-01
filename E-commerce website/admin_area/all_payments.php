<?php

$get_all_orders_query = "Select * from `user_payments`";
$result_orders = mysqli_query($con, $get_all_orders_query);
$num_of_rows = mysqli_num_rows($result_orders);
if ($num_of_rows == 0) {
    echo "<h2 class='text-center text-danger'>No payments have been made yet</h2>";
} else {
    while ($row_orders = mysqli_fetch_assoc($result_orders)) {
        $payment_id = $row_orders['payment_id'];
        $order_id = $row_orders['order_id'];
        $amount_due = $row_orders['amount_due'];
        $invoice_number = $row_orders['invoice_number'];
        $order_date = $row_orders['order_date'];
        $payment_mode = $row_orders['payment_mode'];
?>

        <div class="d-flex flex-column align-items-center">
            <h3 class="text-center text-success">All orders</h3>
            <table class="table table-bordered mt-3 w-75 text-center">
                <thead class="bg-info">
                    <tr>
                        <th>Order ID</th>
                        <th>Invoice no</th>
                        <th>Amount</th>
                        <th>Payment mode</th>
                        <th>Order date</th>
                        <th>Delete</th>
                    </tr>


                </thead>
                <tbody class="bg-secondary text-light">


                    <tr>
                        <td>
                            <?php echo $order_id ?>
                        </td>
                        <td>
                            <?php echo "$invoice_number" ?>
                        </td>
                        <td>
                            <?php echo "$amount_due" ?>
                        </td>
                        <td>
                            <?php echo "$payment_mode" ?>
                        </td>
                        <td>
                            <?php echo "$order_date" ?>
                        </td>
                        <td>
                            <a href='index.php?delete_payment=<?php echo $payment_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a>
                        </td>
                    </tr>

            <?php
        }
    }
            ?>
                </tbody>
            </table>
        </div>