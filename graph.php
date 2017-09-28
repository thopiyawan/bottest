
 <?php

$conn_string = "host=ec2-54-163-233-201.compute-1.amazonaws.com port=5432 dbname=dchdrsngrf50pd user=njppbbukwreesq password=c6b890bd6e0dccc4a5db3308869ba5e2735fe0e5df7a3f0de6f114cc24752e04";
$dbconn = pg_pconnect($conn_string);
if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}


$user = $_GET["data"];
$user_id = pg_escape_string($user);
 // echo $user_id;

   // $des_preg = pg_query($dbconn,"SELECT his_preg_week ,his_preg_weight  FROM history_preg WHERE user_id  = $user_id  ");
   //            while ($row = pg_fetch_row($des_preg)) {
   //                echo $des = $row[0]; 
   //                echo $img = $row[1]; 
 
   //              }



$check_q = pg_query($dbconn,"SELECT seqcode, sender_id ,updated_at  FROM sequentsteps  WHERE sender_id = '{$user_id}' order by updated_at desc limit 1   ");
                while ($row = pg_fetch_row($check_q)) {
                  echo $seqcode =  $row[0];
                  echo $sender = $row[1]; 
                } 
?>

<html>
  <head>
   
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      
//       alert(data);
      
      function drawChart() {
       
          w1 = <?php  echo $data1; ?> ;
          w2 = <?php  echo $data2; ?>;
          w3 = 30;
          w4 = 15;
        var data = google.visualization.arrayToDataTable([
          ['week', 'BMI'],
          ['1', w1 ],
          ['2', w2 ],
          ['3', w3 ],
          ['4', w4 ]
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    
    <div id="curve_chart" style="width: 900px; height: 500px"></div>


  </body>
</html>
