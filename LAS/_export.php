<?php
        require 'partials/_connection.php';
        $id=$_GET['id'];
        $sql = "SELECT * FROM product WHERE product_id='$id'";
        $run = mysqli_query($con, $sql);
        $html = '<h5>PRODUCT DETAIL <sub>By Cherv</sub></h5>';
        $html = '<table><tr style="background-color:grey;">
        <td>Id</td>
        <td>Name</td>
        <td>Code</td>
        <td>Component</td>
        <td>Status</td>
        <td>user</td>
        </tr>';
        while ($data = mysqli_fetch_assoc($run)) {
            $temp=$data['component_id_FK'];
            $sql2="SELECT * FROM component WHERE component_id='$temp'";
            $run2=mysqli_query($con, $sql2);
            $data2=mysqli_fetch_assoc($run2);

            $temp=$data['status_id_FK'];
            $sql3="SELECT * FROM status WHERE status_id='$temp'";
            $run3=mysqli_query($con, $sql3);
            $data3=mysqli_fetch_assoc($run3);

            $temp=$data['user_id_FK'];
            $sql4="SELECT * FROM user WHERE user_id='$temp'";
            $run4=mysqli_query($con, $sql4);
            $data4=mysqli_fetch_assoc($run4);
            $html .= '<tr>
    <td style="background-color: pink;">' . $data['product_id'] . '</td>
    <td style="background-color: orange;">' . $data['product_name'] . '</td>
    <td style="background-color: pink;">' . $data['product_code'] . '</td>
    <td style="background-color: orange;">' . $data2['component_name'] . '</td>
    <td style="background-color: pink;">' . $data3['status_name'] . '</td>
    <td style="background-color: orange;">' . $data4['user_name'] . '</td>
    </tr>';
        }
        $html .= '</table>';
        header('Content-Type:application/xls');
        header('Content-Disposition:attachment;filename=report.xls');
        // echo $html;
        echo $html;
        mysqli_close($con);
        exit();
