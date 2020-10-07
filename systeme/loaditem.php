<?php 
    $con=mysqli_connect("127.0.0.1","root","","infos");
    if(!$con)
    {
        die(" Connection Error ");
    }
 
$q=$_REQUEST["q"]; $hint="";
    $query = " select * from products where pid like '%$q%' or product_name like '%$q%' order by prid desc limit 7 ";
    $result = mysqli_query($con,$query);
 
?>
                                
    <style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
--></style>
 <center>
                        <table class="table table-bordered">
                            <tr align="center">
                                <td> الباركود</td>
                                <td> إسم الصنف </td>
                                <td> الوحده </td>
                                <td> السعر </td>
                                <td colspan="2" style="width:10%;"> التحكم</td>
                            
                            </tr>
 
                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $prid = $row['prid'];
                                        $pid = $row['pid'];
                                        $product_name = $row['product_name'];
                                        $unit = $row['unit'];
                                        $product_price = $row['product_price'];
                            ?>
                                    <tr>
                                        <td><?php echo $pid ?></td>
                                        <td><?php echo $product_name ?></td>
                                        <td><?php echo $unit ?></td>
                                        <td><?php echo $product_price ?></td>
             <td align="center"><a href="delete.php?&&infoprod=<?php echo $prid ?>" onClick="return confirm('Do you want Delete  <?php echo $row['product_name'];?>');">
                            <button class="btn btn btn-raised gradient-pomegranate white" style="width: 100px;"> حذف <i class="fa fa-trash-o"></i></button>
                        </a></td>
                    <td align="center"><a href="upitem.php?&&infoprod=<?php echo $prid ?>">
                            <button class="btn btn btn-raised gradient-pomegranate white" style="width: 100px;"> تعديل <i class="fa fa-edit"></i></button>
                        </a></td>                                   </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   
 
                        </table>
