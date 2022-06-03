<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">

</head>

<body>
    <?php
    #connect to database
    $host='localhost';
    $user='root';
    $pass='';
    $db='student1';
    $con=mysqli_connect($host,$user,$pass,$db);
    $result=mysqli_query($con,"SELECT * from student");
    #button variable
    $id='';
    $name='';
    $address='';
    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }
    if(isset($_POST['name'])){
        $name=$_POST['name'];
    }
    if(isset($_POST['address'])){
        $address=$_POST['address'];
    }
    $sqls='';
    if(isset($_POST['add'])){
        $sqls =" insert into student value ($id,'$name','$address')";
        mysqli_query($con,$sqls);
        header("Location:home.php");

    };
    
    if(isset($_POST['del'])){
        $sqls="delete from student where name='$name'";
        mysqli_query($con,$sqls);
        header("Location:home.php");
    }
    ?>
    <div id="mother">
        <form method="POST">
            <aside>
                <div class="div">
                    <img src="images.jpg" alt="logo" width="100px">
                    <h3>لوحة المدير</h3>
                    <label>رقم الطالب</label>
                    <br/>
                    <input type="text" name="id" id="id"><br/>
                    <label>اسم الطالب</label>
                    <br/>
                    <input type="text" name="name" id="name"><br/>
                    <label>عنوان الطالب</label>
                    <br/>
                    <input type="text" name='address' id='address'><br/><br/>
                    <button name="add">اضافة الطالب</button>
                    <button name="del"> حذف الطالب</button>
                </div>
            </aside>
            <main>
                <table id="tbl">
                    <tr>
                        <th>عنوان الطالب</th>
                        <th>اسم الطالب</th>
                        <th>الرقم التسلسلى</th>
                    </tr>
<?php
while($row=mysqli_fetch_array($result)){
    echo "<tr>";
    
    echo "<td>".$row['address']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['id']."</td>";

echo "</tr>";
}
?>
                </table>
            </main>
        </form>
    </div>
</body>

</html>