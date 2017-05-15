<!DOCTYPE html>
<?php
@ob_start();
session_start();
?>
<html>
<head>
<ul><p>
<li><a href="indexAdmin.php">Home</a>  

<li><a href="viewAdmin.php">View Records</a>
<li><a  class="activ" href="analysis.php">Chart</a>

<li style="float:right"><a href="logout.php">Logout</a></p></ul>
<?php 
  
echo"<form action= 'logout.php' method = 'POST'>
<input class='btn-h1' type='submit' name='login' value='Log Out'/>
 </form>";
  
  
?>
</div>
  <title>Chart</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body background="images/white-background-5.jpg">
  </div>
    <div class="con-center div-login" align="center">
    <p>&nbsp;</p>
<script type="text/javascript" src="js/fusioncharts.js"></script>

<style>
.code-block-holder pre {
      max-height: 188px;  
      min-height: 188px; 
      overflow: auto;
      border: 1px solid #ccc;
      border-radius: 5px;
}
.tab-btn-holder {
  width: 100%;
  margin: 20px 0 0;
  border-bottom: 1px solid #dfe3e4;
  min-height: 30px;
}
.tab-btn-holder a {
  background-color: #fff;
  font-size: 14px;
  text-transform: uppercase;
  color: #006bb8;
  text-decoration: none;
  display: inline-block;
  *zoom:1; *display:inline;
}
.tab-btn-holder a.active {
  color: #858585;
    padding: 9px 10px 8px;
    border: 1px solid #dfe3e4;
    border-bottom: 1px solid #fff;
    margin-bottom: -1px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    position: relative;
    z-index: 300;
}
</style>




<?php
/**
* This example describes the single seriese chart preparation using FusionCharts PHP wrapper
*/
// Including the wrapper file in the page
include("fusioncharts.php");
  // Preparing the object of FusionCharts with needed informations
    /**
    * The parameters of the constructor are as follows
    * chartType   {String}  The type of chart that you intend to plot. e.g. Column3D, Column2D, Pie2D etc.
    * chartId     {String}  Id for the chart, using which it will be recognized in the HTML page. Each chart on the page should have a unique Id.
    * chartWidth  {String}  Intended width for the chart (in pixels). e.g. 400
    * chartHeight {String}  Intended height for the chart (in pixels). e.g. 300
    * containerId {String}  The id of the chart container. e.g. chart-1
    * dataFormat  {String}  Type of data used to render the chart. e.g. json, jsonurl, xml, xmlurl
    * dataSource  {String}  Actual data for the chart. e.g. {"chart":{},"data":[{"label":"Jan","value":"420000"}]}
    */

       
       require 'db.php';
    
    
       
       $result=mysqli_query($con, 'select distinct(HostelName), COUNT(TypeOfReport) from complaintreport GROUP BY HostelName');

  

      // Execute the query, or else return the error message.
     

      // If the query returns a valid response, prepare the JSON string
      
          // The `$arrData` array holds the chart attributes and data
          $arrData = array(
              "chart" => array(
                  "caption" => "Number Of Report Between Hostel",
                  "showValues" => "0",
                  "theme" => "zune"
                )
            );

          $arrData["data"] = array();
      //echo $arrData;

  // Push the data into the array
    while($row = mysqli_fetch_array($result)) {
            array_push($arrData["data"], array(
                "label" => $row["HostelName"],
                "value" => $row["COUNT(TypeOfReport)"]
                )
            );
          }
      
          

          /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

          $jsonEncodedData = json_encode($arrData);

  /*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

          $columnChart = new FusionCharts("column2D", "myFirstChart" , 1000, 300, "chart-1", "json", $jsonEncodedData);

          // Render the chart
          $columnChart->render();

          // Close the database connection

      

    ?>
<div id="chart-1"><!-- Fusion Charts will render here--></div>
 
 
 
</div>


</body>
</html>


