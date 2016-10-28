<?php

require ("config.php");
$link = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysql_error () );
$result = mysql_query ( "set names utf8", $link );
mysql_selectdb ( $dbname, $link );
$commandText = <<<SqlQuery
select *
  from  CommonlyUsedOil
  where cClass='清潔力'
SqlQuery;

$result = mysql_query ( $commandText, $link );
//$row = mysql_fetch_assoc ( $result );
// var_dump($row);

$commandTextB = <<<SqlQuery
select *
  from  CommonlyUsedOil
  where cClass='保濕度'
SqlQuery;

$resultB = mysql_query ( $commandTextB, $link );

$commandTextC = <<<SqlQuery
select *
  from  CommonlyUsedOil
  where cClass='特殊需求'
SqlQuery;

$resultC = mysql_query ( $commandTextC, $link );

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!--css Icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">


    <style type="text/css">
        /*
Inspired by the dribble shot http://dribbble.com/shots/1285240-Freebie-Flat-Pricing-Table?list=tags&tag=pricing_table
*/
        /*--------- Font ------------*/
        
        @import url(http://fonts.googleapis.com/css?family=Droid+Sans);
        @import url(http://weloveiconfonts.com/api/?family=fontawesome);
        /* fontawesome */
        
        [class*="fontawesome-"]:before {
            font-family: 'FontAwesome', sans-serif;
        }
        
        * {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        /*------ utiltity classes -----*/
        
        .fl {
            float: left;
        }
        
        .fr {
            float: right;
        }
        /*its also known as clearfix*/
        
        .group:before,
        .group:after {
            content: "";
            display: table;
        }
        
        .group:after {
            clear: both;
        }
        
        .group {
            zoom: 1;
            /*For IE 6/7 (trigger hasLayout) */
        }
        
        body {
            background: #F2F2F2;
            font-family: 'Droid Sans', sans-serif;
            line-height: 1;
            font-size: 16px;
        }
        
        .wrapper {}
        
        .pricing-table {
            width: 80%;
            margin: 50px auto;
            text-align: center;
            padding: 10px;
            padding-right: 0;
        }
        
        .pricing-table .heading {
            color: #9C9E9F;
            text-transform: uppercase;
            font-size: 1.3rem;
            margin-bottom: 4rem;
        }
        
        .block {
            width: 30%;
            margin: 0 15px;
            overflow: hidden;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            /*    border: 1px solid red;*/
        }
        /*Shared properties*/
        
        .title,
        .pt-footer {
            color: #FEFEFE;
            text-transform: capitalize;
            line-height: 2.5;
            position: relative;
        }
        
        .content {
            position: relative;
            color: #FEFEFE;
            padding: 20px 0 10px 0;
        }
        /*arrow creation*/
        
        .content:after,
        .content:before,
        .pt-footer:before,
        .pt-footer:after {
            top: 100%;
            left: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
        }
        
        .pt-footer:after,
        .pt-footer:before {
            top: 0;
        }
        
        .content:after,
        .pt-footer:after {
            border-color: rgba(136, 183, 213, 0);
            border-width: 5px;
            margin-left: -5px;
        }
        /*/arrow creation*/
        
        .price {
            position: relative;
            display: inline-block;
            margin-bottom: 0.625rem;
        }
        
        .price span {
            font-size: 6rem;
            letter-spacing: 8px;
            font-weight: bold;
        }
        
        .price sup {
            font-size: 1.5rem;
            position: absolute;
            top: 12px;
            left: -12px;
        }
        
        .hint {
            font-style: italic;
            font-size: 0.9rem;
        }
        
        .features {
            list-style-type: none;
            background: #FFFFFF;
            text-align: left;
            color: #9C9C9C;
            padding: 30px 22%;
            font-size: 0.9rem;
        }
        
        .features li {
            padding: 15px 0;
            width: 100%;
        }
        
        .features li span {
            padding-right: 0.4rem;
        }
        
        .pt-footer {
            font-size: 0.95rem;
            text-transform: capitalize;
        }
        /*PERSONAL*/
        
        .personal .title {
            background: #78CFBF;
        }
        
        .personal .content,
        .personal .pt-footer {
            background: #82DACA;
        }
        
        .personal .content:after {
            border-top-color: #82DACA;
        }
        
        .personal .pt-footer:after {
            border-top-color: #FFFFFF;
        }
        /*PROFESSIONAL*/
        
        .professional .title {
            background: #3EC6E0;
        }
        
        .professional .content,
        .professional .pt-footer {
            background: #53CFE9;
        }
        
        .professional .content:after {
            border-top-color: #53CFE9;
        }
        
        .professional .pt-footer:after {
            border-top-color: #FFFFFF;
        }
        /*BUSINESS*/
        
        .business .title {
            background: #E3536C;
        }
        
        .business .content,
        .business .pt-footer {
            background: #EB6379;
        }
        
        .business .content:after {
            border-top-color: #EB6379;
        }
        
        .business .pt-footer:after {
            border-top-color: #FFFFFF;
        }
        
.left {
    float:left;    
}
.right {
    float:right;    
}


    </style>
    <script type="text/javascript" src="jquery.js"></script>
</head>

<body>
    <div class="wrapper">
        <!-- PRICING-TABLE CONTAINER -->
        <div class="pricing-table group">
            <!--goHome-->
            <div class="content left">
                <a href ="RecipeHome.html">
                <button style="padding: 8px;color: #FFFFFF;background-color: #808080;border-radius:4px">
                    <i class="fa fa-home"></i>Go Home</button>
                </a>
                
            </div><br><br><br><br>
            <!--history-->
            <div class="content left">
                <a href ="data_gustRecipe.php">
                <button style="padding: 8px;color: #FFFFFF;background-color: #808080;border-radius:4px">
                    <i class="fa fa-newspaper-o"></i>History</button>
                </a>
            </div>
            <!--compute-->
            <div class="content left">
                <button id="computeID" style="padding: 8px;color: #FFFFFF;background-color: #8585ad;border-radius:4px">
                    <i class="fa fa-edit"></i>計算配方</button>
            </div>
            <!--完成-->
            <div class="content right">
                <input type="button" id="subm" value="全部選擇完成" style="padding: 8px;color: #FFFFFF;background-color: orange;border-radius:4px">
            </div>
            <h1 class="heading">
                soap recipe
            </h1>
            
            <div style="margin: 40px 0px">
                <input type="text" id="fNametxt" placeholder="請輸入你的名字"/>
            </div>
            
            <!-- PERSONAL -->
            <div class="block personal fl">
                <h2 class="title">清潔力</h2>
                <!-- CONTENT -->
                <div class="content">
                    <p class="price">
                        <sup></sup>
                        <span>60</span>
                        <sub>%</sub>
                    </p>
                    <p >請從最上面的選項開始調整比例</p>
                </div>
                <!-- /CONTENT -->
                <!-- FEATURES -->
                <ul class="features">
                    <?php $i=0;?>
                    <?php while ($row = mysql_fetch_assoc($result)) : ?>
                    <li>
                    <span class="fontawesome-cog"></span><?php echo $row["cOilName"] ?><br>
                    <input type="range" id="oilRange<?php echo $i;?>"  min = "0" max = "100" value="0">
                    <p id="readValue<?php echo $i;?>"></p>
                    </li>
                    <?php $i++;?>
                    <?php endwhile ?>
                    
                

                </ul>
          
                <!-- /FEATURES -->
                <!-- PT-FOOTER -->
                <div class="pt-footer">
                    <p id="checked">請調整配方</p>
                </div>
                <!-- /PT-FOOTER -->
            </div>
            <!-- /PERSONAL -->
            <!-- PROFESSIONAL -->
            <div class="block professional fl">
                <h2 class="title">保濕力</h2>
                <!-- CONTENT -->
                <div class="content">
                    <p class="price">
                        <sup></sup>
                        <span>35</span>
                        <sub>%</sub>
                    </p>
                    <p>請從最上面的選項開始調整比例</p>
                </div>
                <!-- /CONTENT -->
                <!-- FEATURES -->
                <ul class="features">
                     <?php $i=3;?>
                     <?php while ($row = mysql_fetch_assoc($resultB)) : ?>
                    <li>
                        <span class="fontawesome-cog"></span><?php echo $row["cOilName"] ?><br>
                    <input type="range" id="oilRange<?php echo $i;?>" min = "0" max = "100" value="0">
                    <p id="readValue<?php echo $i;?>"></p>
                    </li>
                    <?php $i++;?>
                     <?php endwhile ?>
                </ul>
                <!-- /FEATURES -->
                <!-- PT-FOOTER -->
                <div class="pt-footer">
                    <p id="checkRangeValue">請調整配方</p>
                    <p>請繼續調整配方，直到上方數值顯示為100，即為完成</p>
                    
                </div>
                <!-- /PT-FOOTER -->
            </div>
            <!-- /PROFESSIONAL -->
            
            
            <!-- BUSINESS -->
            <div class="block business fl">
                <h2 class="title">加強</h2>
                <!-- CONTENT -->
                <div class="content">
                    <p class="price">
                        <sup></sup>
                        <span>5</span>
                        <sub>%</sub>
                    </p>
                    <p>請從最上面的選項開始調整比例</p>
                </div>
                <!-- /CONTENT -->

                <!-- FEATURES -->
                <ul class="features">
                     <?php $i=10;?>
                    <?php while ($row = mysql_fetch_assoc($resultC)) : ?>
                    <li><span class="fontawesome-cog"></span><?php echo $row["cOilName"] ?><br>
                    <input type="range" id="oilRange<?php echo $i;?>" name="pPalmKernelOil" min = "0" max = "100" value="0"/></li>
                    <p id="readValue<?php echo $i;?>"></p>
                    <?php $i++;?>
                    <?php endwhile ?>
                </ul>
                <!-- /FEATURES -->

                <!-- PT-FOOTER -->
                <div class="pt-footer">
                    <p id="checkedC">請調整配方</p>
                </div>
                <!-- /PT-FOOTER -->
            </div>
            <!-- /BUSINESS -->
            <!--計算-->
            <div>
            	<h1>滋潤度<p id="compute"></p></h1>
            	<h1>清潔力<p id="computeA"></p></h1>
            </div>
            <!--/計算-->
        </div>
        <!-- /PRICING-TABLE -->
    </div>
    

<script>
    $(document).ready(function() {
        
        $('#oilRange0').change(function(){
            var x = $('#oilRange0').val();
            $('#readValue0').html(x);
            // var otherVal = (100 - $('#oilRange0').val())/2;
            // $('#oilRange1').val(otherVal);
            // $('#readValue1').html($('#oilRange1').val());
            // $('#oilRange2').val(otherVal);
            // $('#readValue2').html($('#oilRange2').val()); 
            
        });
        $('#oilRange1').change(function(){
            var x = $('#oilRange1').val();
            $('#readValue1').html(x);
            var otherVal = (100 - $('#oilRange0').val()- $('#oilRange1').val());
            $('#oilRange2').val(otherVal);
            $('#readValue2').html($('#oilRange2').val());
            
            if (100-$('#oilRange0').val()-$('#oilRange1').val()<0){
            $('#oilRange0').val(100-$('#oilRange1').val()-$('#oilRange2').val());
            $('#readValue0').html($('#oilRange0').val());
            }
        });
        
        if($('#oilRange1').val()+$('#oilRange0').val()<100){
        $('#oilRange2').change(function(){
            var x = $('#oilRange2').val();
            $('#readValue2').html(x);
        });
       };
       $('#oilRange2').change(function(){
            var x = $('#oilRange2').val();
            $('#readValue2').html(x);
            if (100-$('#oilRange0').val()-$('#oilRange2').val()<0){
                $('#oilRange0').val(100-$('#oilRange1').val()-$('#oilRange2').val());
                $('#readValue0').html($('#oilRange0').val());
            }
            else if(100-$('#oilRange0').val()-$('#oilRange2').val()>0){
                var otherVal = (100 - $('#oilRange0').val()- $('#oilRange2').val());
                $('#oilRange1').val(otherVal);
                $('#readValue1').html($('#oilRange1').val());
            }
             var k="完成!";
            $('#checked').html(k)
        });
       
        // 保濕力
        $('#oilRange3').change(function(){
            var x = $('#oilRange3').val();
            $('#readValue3').html(x);
            var total= parseInt($('#oilRange3').val()) + parseInt($('#oilRange4').val())+ parseInt($('#oilRange5').val())+ parseInt($('#oilRange6').val())+ parseInt($('#oilRange7').val())+ parseInt($('#oilRange8').val())+ parseInt($('#oilRange9').val());
            $('#checkRangeValue').html(total);
        });
        
        $('#oilRange4').change(function(){
            var x = $('#oilRange4').val();
            $('#readValue4').html(x);
            if (100-$('#oilRange3').val()-$('#oilRange4').val()<0){
            $('#oilRange4').val(100-$('#oilRange3').val());
            $('#readValue4').html($('#oilRange4').val());
            }
            var total= parseInt($('#oilRange3').val()) + parseInt($('#oilRange4').val())+ parseInt($('#oilRange5').val())+ parseInt($('#oilRange6').val())+ parseInt($('#oilRange7').val())+ parseInt($('#oilRange8').val())+ parseInt($('#oilRange9').val());
            $('#checkRangeValue').html(total);
            });
        $('#oilRange5').change(function(){
            var x = $('#oilRange5').val();
            $('#readValue5').html(x);
            if (100-$('#oilRange3').val()-$('#oilRange4').val()-$('#oilRange5').val()<0){
            $('#oilRange5').val(100-$('#oilRange3').val()-$('#oilRange4').val());
            $('#readValue5').html($('#oilRange5').val());
            }
            var total= parseInt($('#oilRange3').val()) + parseInt($('#oilRange4').val())+ parseInt($('#oilRange5').val())+ parseInt($('#oilRange6').val())+ parseInt($('#oilRange7').val())+ parseInt($('#oilRange8').val())+ parseInt($('#oilRange9').val());
            $('#checkRangeValue').html(total);
            });
        $('#oilRange6').change(function(){
            var x = $('#oilRange6').val();
            $('#readValue6').html(x);
            if (100-$('#oilRange3').val()-$('#oilRange4').val()-$('#oilRange5').val()-$('#oilRange6').val()<0){
            $('#oilRange6').val(100-$('#oilRange3').val()-$('#oilRange4').val()-$('#oilRange5').val());
            $('#readValue6').html($('#oilRange6').val());
            }
            var total= parseInt($('#oilRange3').val()) + parseInt($('#oilRange4').val())+ parseInt($('#oilRange5').val())+ parseInt($('#oilRange6').val())+ parseInt($('#oilRange7').val())+ parseInt($('#oilRange8').val())+ parseInt($('#oilRange9').val());
            $('#checkRangeValue').html(total);
            });
        $('#oilRange7').change(function(){
            var x = $('#oilRange7').val();
            $('#readValue7').html(x);
            if (100-$('#oilRange3').val()-$('#oilRange4').val()-$('#oilRange5').val()-$('#oilRange6').val()-$('#oilRange7').val()<0){
            $('#oilRange7').val(100-$('#oilRange3').val()-$('#oilRange4').val()-$('#oilRange5').val()-$('#oilRange6').val());
            $('#readValue7').html($('#oilRange7').val());
            }
            var total= parseInt($('#oilRange3').val()) + parseInt($('#oilRange4').val())+ parseInt($('#oilRange5').val())+ parseInt($('#oilRange6').val())+ parseInt($('#oilRange7').val())+ parseInt($('#oilRange8').val())+ parseInt($('#oilRange9').val());
            $('#checkRangeValue').html(total);
            });
        $('#oilRange8').change(function(){
            var x = $('#oilRange8').val();
            $('#readValue8').html(x);
            if (100-$('#oilRange8').val()-$('#oilRange3').val()-$('#oilRange4').val()-$('#oilRange5').val()-$('#oilRange6').val()-$('#oilRange7').val()<0){
            $('#oilRange8').val(100-$('#oilRange7').val()-$('#oilRange3').val()-$('#oilRange4').val()-$('#oilRange5').val()-$('#oilRange6').val());
            $('#readValue8').html($('#oilRange8').val());
            }
            var total= parseInt($('#oilRange3').val()) + parseInt($('#oilRange4').val())+ parseInt($('#oilRange5').val())+ parseInt($('#oilRange6').val())+ parseInt($('#oilRange7').val())+ parseInt($('#oilRange8').val())+ parseInt($('#oilRange9').val());
            $('#checkRangeValue').html(total);
            });
        $('#oilRange9').change(function(){
            var x = $('#oilRange9').val();
            $('#readValue9').html(x);
            if (100-$('#oilRange9').val()-$('#oilRange8').val()-$('#oilRange3').val()-$('#oilRange4').val()-$('#oilRange5').val()-$('#oilRange6').val()-$('#oilRange7').val()<0){
            $('#oilRange9').val(100-$('#oilRange8').val()-$('#oilRange7').val()-$('#oilRange3').val()-$('#oilRange4').val()-$('#oilRange5').val()-$('#oilRange6').val());
            $('#readValue9').html($('#oilRange9').val());
            }
           var total= parseInt($('#oilRange3').val()) + parseInt($('#oilRange4').val())+ parseInt($('#oilRange5').val())+ parseInt($('#oilRange6').val())+ parseInt($('#oilRange7').val())+ parseInt($('#oilRange8').val())+ parseInt($('#oilRange9').val());
            $('#checkRangeValue').html(total);
            });
         var total= parseInt($('#oilRange3').val()) + parseInt($('#oilRange4').val())+ parseInt($('#oilRange5').val())+ parseInt($('#oilRange6').val())+ parseInt($('#oilRange7').val())+ parseInt($('#oilRange8').val())+ parseInt($('#oilRange9').val());
              
        // if (total=100){
        //  var k="完成!";
        //     $('#checkRangeValue').html(k)
        // }else{var c="請繼續";
        //     $('#checkRangeValue').html(c);
            
        // };
        
        // 加強
        $('#oilRange10').change(function(){
            var x = $('#oilRange10').val();
            $('#readValue10').html(x);
        });
        $('#oilRange11').change(function(){
            var x = $('#oilRange11').val();
            $('#readValue11').html(x);
            var otherVal = (100 - $('#oilRange10').val()- $('#oilRange11').val());
            $('#oilRange12').val(otherVal);
            $('#readValue12').html($('#oilRange12').val());
            
            if (100-$('#oilRange10').val()-$('#oilRange11').val()<0){
            $('#oilRange10').val(100-$('#oilRange11').val()-$('#oilRange12').val());
            $('#readValue10').html($('#oilRange10').val());
            }
            // var k="完成!";
            // $('#checkedC').html(k)
        });
         if($('#oilRange11').val()+$('#oilRange10').val()<100){
        $('#oilRange12').change(function(){
            var x = $('#oilRange12').val();
            $('#readValue12').html(x);
        })
         };
         $('#oilRange12').change(function(){
            var x = $('#oilRange12').val();
            $('#readValue12').html(x);
            if (100-$('#oilRange10').val()-$('#oilRange12').val()<0){
                $('#oilRange10').val(100-$('#oilRange11').val()-$('#oilRange12').val());
                $('#readValue10').html($('#oilRange10').val());
            }
            else if(100-$('#oilRange10').val()-$('#oilRange12').val()>0){
                var otherVal = (100 - $('#oilRange10').val()- $('#oilRange12').val());
                $('#oilRange11').val(otherVal);
                $('#readValue11').html($('#oilRange11').val());
            }
             var k="完成!";
            $('#checkedC').html(k)
        });
        
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
$("#computeID").click(function(){
    var a1=$('#readValue0').html();
	var a2=$('#readValue1').html();
	var a3=$('#readValue2').html();
	var a4=$('#readValue3').html();
	var a5=$('#readValue4').html();
	var a6=$('#readValue5').html();
	var a7=$('#readValue6').html();
	var a8=$('#readValue7').html();
	var a9=$('#readValue8').html();
	var a10=$('#readValue9').html();
	var a11=$('#readValue10').html();
	var a12=$('#readValue11').html();
	var a13=$('#readValue12').html();
	//滋潤度計算
	var ans=(a1*2.7
			+a2*3.8
			+a3*6
			+a4*8.8
			+a5*8.7
			+a6*8.1
			+a7*8.6
			+a8*8.3
			+a9*7.4
			+a10*8.1
			+a11*6.3
			+a12*7.8
			+a13*7.9)/100;
	$("#compute").text(ans);
	//清潔力計算
    var ansA=(a1*9.6
	    	+a2*10.3
			+a3*5.6
			+a4*6.95
			+a5*7.15
			+a6*1.8
			+a7*7.2
			+a8*6.65
			+a9*6.55
			+a10*7.2
			+a11*4.15
			+a12*4.65
			+a13*7.9)/100;
	$("#computeA").text(ansA);
}); 
        
       
    });


</script>

    
</body>

</html>