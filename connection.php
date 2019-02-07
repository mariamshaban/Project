<?php
$conn=mysqli_connect("MYSQL6001.site4now.net","a44015_mariamn","Mariam@2020","db_a44015_mariamn");

class Connection
{
public function rundb($st)
{
  $conn=mysqli_connect("MYSQL6001.site4now.net","a44015_mariamn","Mariam@2020","db_a44015_mariamn");
    $insert=$st;
   if (!mysqli_query( $conn,$insert))
       return mysqli_error($conn);

       else 
       return("Ok");


}  

public function search($st)
{
    $conn=mysqli_connect("MYSQL6001.site4now.net","a44015_mariamn","Mariam@2020","db_a44015_mariamn");
    $select=$st;
    $result=mysqli_query($conn,$select);

       // if(!mysqli_query($conn,$select))
      //  die(mysqli_error($conn));
      if (mysqli_num_rows($result)>0)
       return "ok";
      else
           return "no";
    



}



public function GetData($st)
{
    $conn=mysqli_connect("MYSQL6001.site4now.net","a44015_mariamn","Mariam@2020","db_a44015_mariamn");

    $select=$st;
    
    $result=mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($result);
     return  $row;
}

}


?>