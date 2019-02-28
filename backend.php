<?php

$conn = mysqli_connect("localhost","root","","crud_db");

extract ($_POST);

if( isset($_POST['readrecord'])){
    $data = '<table class="table table-bordered table striped"
                        <tr>
                        <th>No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Edit Action</th>
                        <th>Delete Action</th>
                        </tr>';

    $displayquery = "select * from `crudtable` ";
    $result = mysqli_query($conn,$displayquery);

    if(mysqli_num_rows($result) > 0){
        $number 1;
        while($row = mysqli_fetch_array($result)) {
            $data .= '<tr>
                <td>' .$number. '</td>
                <td>' .$row['firstname']. '</td>
                <td>' .$row['lastname']. '</td>
                <td>' .$row['email']. '</td>
                <td>' .$row['mobile']. '</td>
                <td>
                    <button onclick="getUserDetails('.$row['id'].')" class="btn btn-warning">Edit</button>
                </td>
                <td>
                    <button onclick="deleteUserDetails('.$row['id'].')" class="btn btn-danger">Delete</button>
                </td>  
            </tr>';
            $number++;
        }
    }
    $data .= '</table>';
    echo $data;
}

if(isset($_POST['firstname']) && isset($_POST['lastname']) && 
    isset($_POST['email']) && isset($_POST['mobile'])){

    $query = "INSERT INTO `crudtable`(`firstname`, `lastname`, `email`, `mobile`) VALUES 
                        ('$firstname', '$lastname', '$email', '$mobile')";
    
    mysqli_query($conn, $query); 
}
?>