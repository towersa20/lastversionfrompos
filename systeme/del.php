<?php include('header.php');?>
                <h5 class="card-title">بيانات الطلب المسجله</h5>
                <p class="card-text">
                <?php 
    include('connect.php');
    $sql=mysql_query("select * from center");
    $row=mysql_fetch_array($sql);?>
                    
                <?php do { ?>
<table class="table table-bordered table-stripe">
    <tr align="center">
    <td style="width: 10%;">اسم العميل</td>
    <td><?php echo $row['name'];?></td>
    </tr>
    <tr>
    </tr>
    <tr>
        <td colspan="2">الموقع</td>
    </tr>
    <tr>
        <td colspan="2">
        <iframe style="width: 100%;height:300px;" src="https://maps.google.com/maps?q=<?php echo $row['maps']; ?>,<?php echo $row['lang']; ?>&output=embed"></iframe>

        </td>
    </tr>

    <tr>
    <td >
       
        <a href="delete.php?&&cid=<?php echo $row['id'];?>" onClick="return confirm('Do you want Delete <?php echo $row['name'];?>');">
        
        <button class="btn btn-danger" style="width: 100%;"><i class="fa fa-times"></i></button></a></td>

        <td>
        <a href="torder.php?&&cid=<?php echo $row['id'];?>"><button style="width: 100%;" class="btn btn-success"><i class="fa fa-eye"></i></button></a></td>

    </tr>
</table>
<?php } while($row=mysql_fetch_array($sql));?>
                </p>
            </div>
        </div>
    </div>
</div></div>
<br><br><br><br><br><br>
<br><br><br>
