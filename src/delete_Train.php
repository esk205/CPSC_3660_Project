<html>
  <body>
      <title> Railroad System - Delete a Train </title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
  <?php
      if(isset($_COOKIE["username"])) {
          $username = $_COOKIE["username"];
          $password = $_COOKIE["password"];
          $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
          $sql = "select * from TRAIN";
          $result = $conn->query($sql);

          echo "<table class=\"table table-striped table-hover\">";
          echo "<thead><tr>";
          echo "<th scope=\"col\">ID</th>";
          echo "<th scope=\"col\">Assigned Route</th>";
          echo "<th scope=\"col\">Fuel</th>";
          echo "<th scope=\"col\">Type</th>";
          echo "<th scope=\"col\">Passenger Capacity</th>";
          echo "<th scope=\"col\">Delete</th>";
          echo "</tr></thead>";
          echo "<tbody>";
          while($val = mysqli_fetch_array($result)) {
            $sql2 = "select name from ROUTES where ID='$val[rID]'";
            $result2 = $conn->query($sql2);
            #$val2 = $result2->fetch_assoc();
            echo "<tr>";
            echo "<th scope=\"row\">$val[ID]</th>";
            if($result2->num_rows != 0) {
              $val2 = $result2->fetch_assoc();
              echo "<td>$val2[name]</td>";
            } else {
              echo "<td>unassigned</td>";
            }
            echo "<td>$val[Fuel]</td>";
            echo "<td>$val[Type]</td>";
            echo "<td>$val[passenger_capacity]</td>";
            echo "<td><a href=\"deleteTrain.php?id=$val[ID]\">Delete</a></td>";
            echo "</tr>";
          }
          echo "</tbody>";
          echo "</table>";
          echo "<a href=\"main.php\">Return</a> to Home Page.";
        } else {
          echo "<h1>Not logged in redirecting...</h1>";
          header("Location: index.php");
          die();
        }
  ?>
</html>
