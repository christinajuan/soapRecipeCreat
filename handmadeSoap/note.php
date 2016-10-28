
<!-- 送出資料ajax -->
$('#subm').click(function() {
                var Arr = new Array();
                for(var i=0;i<13;i++){
                    Arr.push($('#oilRange'+i).val());
                }
                
                var passData={
                    passData:Arr,
                    fNameval:$("#fNametxt").val()+"*",
                }
                
                
                $.ajax( {
                    url:"submit.php" ,
                    type:"POST",
                    data: passData,
                    success:function(result){
                      alert(result); 
                    },
                    error:function(){
                        alert("error");
                    }
                }
                );
        });
        
<!--接收資料  -->
<?php
//  ~~~   接資料  ~~~
$arr = $_POST["passData"];
$fName = $_POST["fNameval"];
//echo $arr[0];

//　~~~ 連結資料庫  ~~~
	$dbhost = 'localhost';
	$dbuser = 'christjuan1104';
	$dbpass = '';
	$dbname = 'soapTest';

// Create connection  ~~~
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// Check connection  ~~~
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


//新增資料
$sql = "INSERT INTO `gustRecipe`(`oID`,`fName`,`coconut`, `palmkernel`, `palm`, `olive`, `sweetAlmond`, `caster`, `avocado`, `macadamiaNut`, `hazelnut`, `sesame`, `cocoaButter`, `sheaButter`, `rosehip`) 
VALUES (null,'".$fName."',".$arr[0].",".$arr[1].",".$arr[2].",".$arr[3].",".$arr[4].",".$arr[5].",".$arr[6].",".$arr[7].",".$arr[8].",".$arr[9].",".$arr[10].",".$arr[11].",".$arr[12].")";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>