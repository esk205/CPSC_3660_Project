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
          $sql = "select * from Apart_Of";
          $result = $conn->query($sql);

          echo "<table class=\"table table-striped table-hover\">";
          echo "<thead><tr>";
          echo "<th scope=\"col\">ID</th>";
          echo "<th scope=\"col\">Name</th>";
          echo "<th scope=\"col\">Station Number</th>";
          echo "<th scope=\"col\">Delete</th>";
          echo "</tr></thead>";
          echo "<tbody>";
          while($val = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<th scope=\"row\">$val[ID]</th>";
            echo "<td>$val[name]</td>";
            echo "<td>$val[stationNumber]</td>";
            echo "<td><a href=\"deleteApartOf.php?id=$val[ID]\">Delete</a></td>";
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
