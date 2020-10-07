<?php
// echo $_POST


$connect = mysqli_connect('localhost', 'root', '', 'infos');
mysqli_set_charset($connect, 'utf8');


if (isset($_POST['operation']) && $_POST['operation'] == "add_product") {



    $query = mysqli_query($connect, "SELECT * FROM `storing` WHERE  qunt !=0 and `barco` = " . $_POST['sid'] );
    $products = mysqli_fetch_assoc($query);


    $vat_resulte = mysqli_query($connect, "SELECT * FROM vat WHERE  vid = 1 LIMIT 1 ");
    $vat = mysqli_fetch_array($vat_resulte);
   // $vat['tax'];
       // $products = mysqli_fetch_array($products_results);

    // $customer_id = 0;
    if (isset($_POST['search_customer'])) {

        $sql = mysqli_query($connect, "select * from customer where name ='" . $_POST['search_customer'] . "'");
        $customer = mysqli_fetch_array($sql);

        $customer_id =   $customer['cid'];
    } else {
        $customer_id = 0;
    }


    if ($products['sid'] > 0) {
        $sql = "INSERT INTO `sales` (`date`, `datetime`,    `invoice`,           `product`            , `qty`    , `name`                     , `price`,`discount` ,      `category`,             `type`, `user`,   `vat`,       `tell`)
    VALUES ('" . date("Y-m-d H:i:s") . "','" . date("Y-m-d H:i:s") . "','" . $_POST['invoice_id'] . "', '" . $products['barco'] . "' , '1'  , '" . $products['name'] . "', '" . $products['price'] . "', '0'  ,  '" . $products['unit'] . "' ,  '" . $_POST['payment'] . "'  ,    'المبيعات'  ,  '15'    , '1' )";

        $result = mysqli_query($connect, $sql);

        $qyt =  $products['qunt'] - 1;
        $update_prodect_qyt_sql = "UPDATE `storing` SET `qunt` = '" . $qyt . "' WHERE `storing`.`sid` = " . $products['sid'];
        mysqli_query($connect, $update_prodect_qyt_sql);
    }

    $sql = mysqli_query($connect, "select sum(price*qty) from sales where invoice='" . $_POST['invoice_id'] . "'");
    $row = mysqli_fetch_array($sql);

    $nx = mysqli_query($connect, "select * from vat");
    $mx = mysqli_fetch_array($nx);
    $tax = $mx['tax'];

    $costs = $row['sum(price*qty)'];
    //$costs = $row['sum(price*qty)'] *  ($tax / 100) + $row['sum(price*qty)'];
    // `sid`, `barco`, `name`, `unit`, `price`, `qunt`, `enddate`, `date`, `store`, `tell`


    $sql = mysqli_query($connect, "select sum(qty),invoice,name,category,product,price,discount,transaction_id from sales where invoice='" . $_POST["invoice_id"] . "' GROUP BY NAME");
    // $row = mysqli_fetch_array($sql);
    $total = 0;
    $vat_result = 0;
    $sub_total = 0;
    $table = "";
    while ($row = mysqli_fetch_array($sql)) {
        $vat_result += round(($row['price'] * $row['sum(qty)']*$tax/100 ), 2);
        $total += ($row['price'] * $row['sum(qty)']);
        $sub_total +=  round(($row['price'] * $row['sum(qty)']), 2);
        $table .= '<tr align="center">
                        <td style="width:25%;">' . $row['name'] . '</td>
                        <td style="width:15%;">' . $row['category'] . '</td>
                        <td style="width:10%;"><i style="color:green;" class=" fas fa-plus" onclick=javascript:add_product(' . $row["product"] . ');></i> ' . $row['sum(qty)'] . ' <i  style="color:red;" class=" fas fa-minus" onclick=javascript:decrease(' . $row["product"] . ');></i></td>
                        <td style="width:10%;">' . $row['price'] . '</td>
                        <td style="width:10%;">' . round(($row['price'] * $row['sum(qty)']), 2) . '</td>
                        <td style="width:10%;">' . round(($row['price'] * $row['sum(qty)'] * $tax / 100), 2) . '</td>
                        <td style="width:10%;">' . round(($row['price'] * $row['sum(qty)']  ), 2) . '</td>
                        <td style="width:10%;"><p style="color:red; font-size:22px;" class=" fas fa-times-circle " onclick=javascript:delete_product(' . $row["product"] . ');></p></td>
                    </tr>';
    }
    echo json_encode(['table' => $table, 'total' => $total, 'vat' => $vat_result, 'sub_total' => $sub_total]);
}






if (isset($_POST['operation']) && $_POST['operation'] == "register_new_customer") {


    $customer_name    = $_POST['customer_name'];
    $phone             = $_POST['phone'];
    $type             = $_POST['type'];
    $acount            = $_POST['acount'];
    $bank            = $_POST['bank'];


    $sql   =    "INSERT INTO `person` (`name`, `phone`, `type`, `bank`, `acount`, `date`)
                 VALUES ( '" . $_POST['customer_name'] . "','" . $_POST['phone'] . "','" . $_POST['type'] . "','" . $_POST['bank'] . "','" . $_POST['acount'] . "',now())";
                 mysqli_query($connect, $sql);

    // echo json_encode(['msg' => $table, 'total' => $total, 'vat' => $vat_result, 'sub_total' => $sub_total]);
}





if (isset($_POST['operation']) && $_POST['operation'] == "add_unknown_product") {


    $payment    = $_POST['payment'];
    $invoice_id = $_POST['invoice_id'];
    $name       = $_POST['name'];
    $price      = $_POST['price'];
    $search_customer      = $_POST['search_customer'];
    $qyt        = $_POST['qyt'];
    $barco = time() . rand(1, 100);



    // `invoice`, `product`, `qty`, `name`, `price`, `discount`, `category`, `date`, `datetime`, `type`, `user`, `vat`, `tell`, `customer_id`


    if (isset($_POST['search_customer'])) {

        $sql = mysqli_query($connect, "select * from customer where name ='" . $_POST['search_customer'] . "'");
        $customer = mysqli_fetch_array($sql);
        // print_r($customer);
        // die;

        $customer_id =   $customer['cid'];
    } else {
        $customer_id = 0;
    }

    $vat_resulte = mysqli_query($connect, "SELECT * FROM vat WHERE  vid = 1 LIMIT 1 ");
    $vat = mysqli_fetch_array($vat_resulte);

    $sql = "INSERT INTO `sales` (`date`, `datetime`,    `invoice`,   `product`   , `qty`  , `name`   , `price`,  `discount` ,   `category`,  `type`, `user`,   `vat`,       `tell`)
    VALUES ('" . date("Y-m-d H:i:s") . "','" . date("Y-m-d H:i:s") . "','" . $_POST['invoice_id'] . "', '" . $barco . "' , '" . $_POST['qyt'] . "' , '" . $name . "', '" . $price . "', '0'  ,  'وحده' ,    '" . $_POST['payment'] . "'  ,    'المبيعات'  ,   '15'      , '1' )";

    $result = mysqli_query($connect, $sql);




    $sql = mysqli_query($connect, "select sum(price*qty) from sales where invoice='" . $_POST['invoice_id'] . "' and tell ='1'");
    $row = mysqli_fetch_array($sql);

    $nx = mysqli_query($connect, "select * from vat");
    $mx = mysqli_fetch_array($nx);
    $tax = $mx['tax'];

    $costs = $row['sum(price*qty)'] *  ($tax / 100) + $row['sum(price*qty)'];
    // `sid`, `barco`, `name`, `unit`, `price`, `qunt`, `enddate`, `date`, `store`, `tell`


    $sql = mysqli_query($connect, "select sum(qty),invoice,name,category,product,price,discount,transaction_id from sales where invoice='" . $_POST["invoice_id"] . "'  and tell ='1' GROUP BY NAME");
    // $row = mysqli_fetch_array($sql);
    $total = 0;
    $vat_result = 0;
    $sub_total = 0;
    $table = "";
    while ($row = mysqli_fetch_array($sql)) {
        $vat_result += round(($row['price'] * $row['sum(qty)']*$tax/100), 2);
        $total += round(($row['price'] * $row['sum(qty)']), 2);
        $sub_total +=  round(($row['price'] * $row['sum(qty)']), 2);
        $table .= '<tr>
                        <td style="width:25%;">' . $row['name'] . '</td>
                        <td style="width:15%;">' . $row['category'] . '</td>
                        <td style="width:10%;"><i style="color:green;" class=" fas fa-plus" onclick=javascript:add_product(' . $row["product"] . ');></i> ' . $row['sum(qty)'] . ' <i  style="color:red;" class=" fas fa-minus" onclick=javascript:decrease(' . $row["product"] . ');></i></td>
                        <td style="width:10%;">' . $row['price'] . '</td>
                        <td style="width:10%;" >' . round(($row['price'] * $row['sum(qty)']), 2) . '</td>
                        <td style="width:10%;">' . round(($row['price'] * $row['sum(qty)'] * $tax / 100), 2) . '</td>
                        <td style="width:10%;">' . round(($row['price'] * $row['sum(qty)'] ), 2) . '</td>
                        <td style="width:10%;"><p style="color:red; font-size:22px;" class=" fas fa-times-circle " onclick=javascript:delete_product(' . $row["product"] . ');></p></td>
                    </tr>';
    }
    echo json_encode(['table' => $table, 'total' => $total, 'vat' => $vat_result, 'sub_total' => $sub_total]);
}






if (isset($_POST['operation']) && $_POST['operation'] == "search_customer") {

    if ($_POST['search_customer'] !== "") {
        $query = mysqli_query($connect, "SELECT * FROM `customer` WHERE name LIKE '%" . $_POST['search_customer'] . "%'");
        $list = "<ul id='art-vmenu'>";

        while ($row = mysqli_fetch_array($query)) {

            $list .= ' <li onclick=javascript:select_customer_from_list(' . $row['cid']  . '); href="#" class="list-group-item  result list-group-item-action">' . $row['name'] . '</li>';
        }
        $list .= "</ul>";
        echo json_encode(['list' => $list]);
    } else {
        echo json_encode(['list' => ""]);
    }
}



if (isset($_POST['operation']) && $_POST['operation'] == "sarech") {

    if ($_POST['suggestions_value'] !== "") {
        $query = mysqli_query($connect, "SELECT * FROM `storing` WHERE name LIKE '%" . $_POST['suggestions_value'] . "%' AND qunt !=0");
        $list = "<ul id='art-vmenu'>";

        while ($row = mysqli_fetch_array($query)) {

            $list .= ' <li onclick=javascript:add_product(' . $row["barco"] . '); href="#" class="list-group-item  result list-group-item-action">' . $row['name'] . '</li>';
        }
        $list .= "</ul>";
        echo json_encode(['list' => $list]);
    } else {
        echo json_encode(['list' => ""]);
    }
}



if (isset($_POST['operation']) && $_POST['operation'] == "decrease_product_qyt") {


    $invoice_id = $_POST['invoice_id'];
    $barcode = $_POST['barcode'];

    $sql = mysqli_query($connect, "SELECT * FROM sales WHERE  invoice = '" . $invoice_id . "' AND product = '" . $barcode . "'  and tell ='1'");
    $result = mysqli_fetch_array($sql);
    // echo 
    $transaction_id = $result['transaction_id'];

    // الكميه رجعت المخزن
    $sql = mysqli_query($connect, "select * from storing where barco='" . $_POST['barcode'] . "' AND qunt !=0");
    $row = mysqli_fetch_array($sql);


    if (isset($row)) {
        $product_qyt = $row['qunt'] +  1;


        $sql = "UPDATE `storing` SET `qunt` = '" . $product_qyt . "' WHERE `barco` = '" . $_POST['barcode'] . "'";
        mysqli_query($connect, $sql);
    }

    // نهايه رجعو الكميه للمخزن


    // delete item form invoice  
    $delete_sql = "DELETE FROM `sales` WHERE   transaction_id = '" . $transaction_id . "'";
    mysqli_query($connect, $delete_sql);

    $sql = mysqli_query($connect, "select sum(price*qty) from sales where invoice='" . $_POST['invoice_id'] . "' and tell ='1'");
    $row = mysqli_fetch_array($sql);

    $nx = mysqli_query($connect, "select * from vat");
    $mx = mysqli_fetch_array($nx);
    $tax = $mx['tax'];

    $costs = $row['sum(price*qty)'] *  ($tax / 100) + $row['sum(price*qty)'];
    // `sid`, `barco`, `name`, `unit`, `price`, `qunt`, `enddate`, `date`, `store`, `tell`


    $sql = mysqli_query($connect, "select sum(qty),invoice,name,category,product,price,discount,transaction_id from sales where invoice='" . $_POST["invoice_id"] . "' and tell ='1' GROUP BY NAME");
    // $row = mysqli_fetch_array($sql);
    $total = 0;
    $vat_result = 0;
    $sub_total = 0;
    $table = "";
    while ($row = mysqli_fetch_array($sql)) {
        $vat_result += round(($row['price'] * $row['sum(qty)']*$tax/100 ), 2);
        $total += round(($row['price'] * $row['sum(qty)']), 2);
        $sub_total +=  round(($row['price'] * $row['sum(qty)']), 2);
        $table .= '<tr align="center">
                        <td style="width:25%;">' . $row['name'] . '</td>
                        <td style="width:15%;">' . $row['category'] . '</td>
                        <td style="width:10%;"><i style="color:green;" class=" fas fa-plus" onclick=javascript:add_product(' . $row["product"] . ');></i> ' . $row['sum(qty)'] . ' <i  style="color:red;" class=" fas fa-minus" onclick=javascript:decrease(' . $row["product"] . ');></i></td>
                        <td style="width:10%;">' . $row['price'] . '</td>
                        <td style="width:10%;">' . round(($row['price'] * $row['sum(qty)']), 2) . '</td>
                        <td style="width:10%;">' . round(($row['price'] * $row['sum(qty)'] * $tax / 100), 2) . '</td>
                        <td style="width:10%;">' . round(($row['price'] * $row['sum(qty)']), 2) . '</td>
                        <td style="width:10%;"><p style="color:red; font-size:22px;" class=" fas fa-times-circle " onclick=javascript:delete_product(' . $row["product"] . ');></p></td>
                    </tr>';
    }
    echo json_encode(['table' => $table, 'total' => $total, 'vat' => $vat_result, 'sub_total' => $sub_total]);
}


if (isset($_POST['operation']) && $_POST['operation'] == "delete_invoice") {

    $invoice_id = $_POST['invoice_id'];



    $sql_sales = mysqli_query($connect, "SELECT sum(qty) as qyt , product FROM sales WHERE invoice = '2020000174'  and tell ='1' GROUP BY product");

    while ($product = mysqli_fetch_assoc($sql_sales)) {
        $product_qyt = 0;



        $get_product_sql = mysqli_query($connect, "SELECT * FROM storing WHERE barco ='" . $product['product'] . "' AND qunt !=0");
        $row = mysqli_fetch_assoc($get_product_sql);


        $product_qyt = $row['qunt'] +  $product['qyt'];

        $sql = "UPDATE `storing` SET `qunt` = '" . $product_qyt . "' WHERE `barco` = '" . $product['product'] . "'";
        mysqli_query($connect, $sql);
    }
    //  // delete item form invoice  
    $delete_sql = "DELETE FROM `sales` WHERE   invoice = '" . $invoice_id . "'";
    mysqli_query($connect, $delete_sql);

    // echo $x;
    $msg =  "تم حذف الفاتورة بنجاح";


    $sql = mysqli_query($connect, "select sum(price*qty) from sales where invoice='" . $_POST['invoice_id'] . "' and tell ='1'");
    $row = mysqli_fetch_array($sql);

    $nx = mysqli_query($connect, "select * from vat");
    $mx = mysqli_fetch_array($nx);
    $tax = $mx['tax'];

    $costs = $row['sum(price*qty)'] *  ($tax / 100) + $row['sum(price*qty)'];
    // `sid`, `barco`, `name`, `unit`, `price`, `qunt`, `enddate`, `date`, `store`, `tell`


    $sql = mysqli_query($connect, "select sum(qty),invoice,name,category,product,price,discount,transaction_id from sales where invoice='" . $_POST["invoice_id"] . "' and tell ='1' GROUP BY NAME");
    // $row = mysqli_fetch_array($sql);
    $total = 0;
    $vat_result = 0;
    $sub_total = 0;
    $table = "";

    echo json_encode(['table' => $table, 'total' => $total, 'vat' => $vat_result, 'sub_total' => $sub_total, 'msg' => $msg]);
}

if (isset($_POST['operation']) && $_POST['operation'] == "delete_product") {

    $invoice_id = $_POST['invoice_id'];
    $barcode = $_POST['barcode'];

    $sql = mysqli_query($connect, "SELECT sum(qty) as total FROM sales WHERE  invoice = '" . $invoice_id . "' AND product = '" . $barcode . "' and tell ='1'");
    $result = mysqli_fetch_array($sql);

    $sql = mysqli_query($connect, "select * from storing where barco='" . $_POST['barcode'] . "' AND qunt !=0");
    $row = mysqli_fetch_array($sql);


    $product_qyt = $row['qunt'] +  $result['total'];


    $sql = "UPDATE `storing` SET `qunt` = '" . $product_qyt . "' WHERE `barco` = '" . $_POST['barcode'] . "'";
    mysqli_query($connect, $sql);





    // delete item form invoice  
    $delete_sql = "DELETE FROM `sales` WHERE   invoice = '" . $invoice_id . "' AND product= '" . $barcode . "'";
    mysqli_query($connect, $delete_sql);

    $sql = mysqli_query($connect, "select sum(price*qty) from sales where invoice='" . $_POST['invoice_id'] . "' and tell ='1'");
    $row = mysqli_fetch_array($sql);

    $nx = mysqli_query($connect, "select * from vat");
    $mx = mysqli_fetch_array($nx);
    $tax = $mx['tax'];

    $costs = $row['sum(price*qty)'] ;
    // `sid`, `barco`, `name`, `unit`, `price`, `qunt`, `enddate`, `date`, `store`, `tell`


    $sql = mysqli_query($connect, "select sum(qty),invoice,name,category,product,price,discount,transaction_id from sales where invoice='" . $_POST["invoice_id"] . "' and tell ='1' GROUP BY NAME");
    // $row = mysqli_fetch_array($sql);
    $total = 0;
    $vat_result = 0;
    $sub_total = 0;
    $table = "";
    while ($row = mysqli_fetch_array($sql)) {
        $vat_result += round(($row['price'] * $row['sum(qty)'] * $tax / 100), 2);
        $total += round(($row['price'] * $row['sum(qty)']), 2);
        $sub_total +=  round(($row['price'] * $row['sum(qty)']), 2);
        $table .= '<tr align="center">
                        <td style="width:25%;">' . $row['name'] . '</td>
                        <td style="width:15%;">' . $row['category'] . '</td>
                        <td style="width:10%;"><i style="color:green;" class=" fas fa-plus" onclick=javascript:add_product(' . $row["product"] . ');></i> ' . $row['sum(qty)'] . ' <i  style="color:red;" class=" fas fa-minus" onclick=javascript:decrease(' . $row["product"] . ');></i></td>
                        <td style="width:10%;">' . $row['price'] . '</td>
                        <td style="width:10%;">' . round(($row['price'] * $row['sum(qty)']), 2) . '</td>
                        <td style="width:10%;">' . round(($row['price'] * $row['sum(qty)'] * $tax / 100), 2) . '</td>
                        <td style="width:10%;">' . round(($row['price'] * $row['sum(qty)'] ), 2) . '</td>
                        <td style="width:10%;"><p style="color:red; font-size:22px;" class=" fas fa-times-circle " onclick=javascript:delete_product(' . $row["product"] . ');></p></td>
                    </tr>';
    }
    echo json_encode(['table' => $table, 'total' => $total, 'vat' => $vat_result, 'sub_total' => $sub_total]);
}

if (isset($_POST['operation']) && $_POST['operation'] == "get_single_customer") {

    $sql = mysqli_query($connect, "select * from customer where cid ='" . $_POST['customer_id'] . "'");
    $customer = mysqli_fetch_array($sql);


    echo  $customer['name'];
}

if (isset($_POST['operation']) && $_POST['operation'] == "get_customer") {

    $sql = mysqli_query($connect, "select * from customer");
    $customers = "";
    while ($row = mysqli_fetch_array($sql)) {

        $customers .= '<option value="' . $row['cid'] . '">' . $row['name'] . '</option>';
    }
    $customers .= '<option value="0">اضافة عميل</option>';
    echo  $customers;
}



if (isset($_POST['operation']) && $_POST['operation'] == "loading") {

    $invoice_id = $_POST['invoice_id'];





    $sql = mysqli_query($connect, "select sum(price*qty) from sales where invoice='" . $_POST['invoice_id'] . "' and tell ='1'");
    $row = mysqli_fetch_array($sql);

    $nx = mysqli_query($connect, "select * from vat");
    $mx = mysqli_fetch_array($nx);
    $tax = $mx['tax'];

    $costs = $row['sum(price*qty)'] *  ($tax / 100);
    // `sid`, `barco`, `name`, `unit`, `price`, `qunt`, `enddate`, `date`, `store`, `tell`


    $sql = mysqli_query($connect, "select sum(qty),invoice,name,category,product,price,discount,transaction_id from sales where invoice='" . $_POST["invoice_id"] . "' GROUP BY NAME");
    // $row = mysqli_fetch_array($sql);
    $total = 0;
    $vat_result = 0;
    $sub_total = 0;
    $table = "";
    while ($row = mysqli_fetch_array($sql)) {
        $vat_result += round(($row['price'] * $row['sum(qty)'] * $tax / 100), 2);
        $total += round(($row['price'] * $row['sum(qty)'] ), 2);
        $sub_total +=  round(($row['price'] * $row['sum(qty)']), 2);
        $table .= '<tr align="Center">
                        <td>' . $row['name'] . '</td>
                        <td>' . $row['category'] . '</td>
                        <td><i style="color:green;" class=" fas fa-plus" onclick=javascript:add_product(' . $row["product"] . ');></i> ' . $row['sum(qty)'] . ' <i  style="color:red;" class=" fas fa-minus" onclick=javascript:decrease(' . $row["product"] . ');></i></td>
                       <td>' . $row['price'] . '</td>
                        <td>' . round(($row['price'] * $row['sum(qty)']), 2) . '</td>
                        <td>' . round(($row['price'] * $row['sum(qty)'] * $tax / 100), 2) . '</td>
                        <td>' . round(($row['price'] * $row['sum(qty)']), 2) . '</td>
                        <td><p style="color:red;" class=" fas fa-times-circle " onclick=javascript:delete_product(' . $row["product"] . ');></p></td>
                    </tr>';
    }
    echo json_encode(['table' => $table, 'total' => $total, 'vat' => $vat_result, 'sub_total' => $sub_total]);
}
