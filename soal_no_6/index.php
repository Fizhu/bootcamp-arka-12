<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Soal No 6</title>

    <!-- Bootstrap core CSS-->
    <link href="script/css/bootstrap.min.css" rel="stylesheet">
    <!-- Page level plugin CSS-->
    <link href="script/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="script/css/sb-admin.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-white static-top">
    <tr>
    <th>
      <div class="navbar-brand mr-1" href="index.html">
    </th>
    <th>
      <img src="https://www.arkademy.com/img/logo%20arkademy-01.9c1222ba.png" width="10%">
    </th>
    </tr>
      <font color="black"><b>ARKADEMY BOOTCAMP</b></font>
      </div>
      </nav>
    <hr>

    
    <div id="wrapper">
      <div id="content-wrapper">
        <div class="container">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal"> &nbsp; ADD + &nbsp;</button>
        <p>
          <!-- Icon Cards-->
          <div class="row">
            <table class="table table-bordered col-sm-10">
              <tr>
               <th>Name</th> 
               <th>Work</th>
               <th>Salary</th>
               <th>Action</th>
              </tr>
              <?php
                $conn = mysqli_connect("localhost", "root", "", "arka");
               // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }
                    $sql = "SELECT Name.id, Name.name, Work.name as 'work', Salary.salary
                            FROM Name
                            LEFT JOIN Work
                            ON Name.id_work = Work.id
                            LEFT JOIN Salary
                            ON Name.id_salary = Salary.id";
                    $result = $conn->query($sql);

                    if(isset($_POST['delete']))
                      {	 
                        $id = $_POST['delete'];
                        $sqls = "DELETE FROM Name WHERE id='$id'";
                        if (mysqli_query($conn, $sqls)) {
                          echo("<meta http-equiv='refresh' content='1'>");
                        } else {
                          echo "Error: " . $sqls . "
                      " . mysqli_error($conn);
                        }
                        mysqli_close($conn);
                      }
                      
                    if ($result->num_rows > 0) {
                // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>" . $row["name"]. "</td>
                    <td>" . $row["work"] . "</td>
                    <td> Rp. ".number_format($row["salary"],2,",",".")."</td>
                    <td>
                    <form action='' method='post'>
                      <button type='submit' class='btn btn-danger btn-sm' id='delete' name='delete' value='".$row['id']."'><i class='fa fa-trash'></i></button>
                      <button type='button' class='btn btn-success btn-sm'><i class='fa fa-edit' data-toggle='modal' data-target='#updateModal'></i></button>
                    </form>
                    </td>
                    </tr>";
             }
             echo "</table>";
             } else { echo "0 results"; }
             ?>
             </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /#wrapper -->

    <?php
      if(isset($_POST['insert']))
      {	 
         $name = $_POST['name'];
         $id_work = $_POST['id_work'];
         $id_salary = $_POST['id_salary'];
         $sql = "INSERT INTO Name (name, id_work, id_salary)
         VALUES ('$name', '$id_work', '$id_salary')";
         if (mysqli_query($conn, $sql)) {
          echo("<meta http-equiv='refresh' content='1'>");
         } else {
          echo "Error: " . $sql . "
      " . mysqli_error($conn);
         }
         mysqli_close($conn);
      }
        if(isset($_POST['update']))
          {	 
              $idx = $row['id'];
              $namex = $_POST['namex'];
              $id_workx = $_POST['id_workx'];
              $id_salaryx = $_POST['id_salaryx'];
              $sqlx = "UPDATE Name SET id_work='$id_workx', id_salary='$id_salaryx' WHERE id='$idx'";
              if (mysqli_query($conn, $sqlx)) {
              echo("<meta http-equiv='refresh' content='1'>");
              } else {
              echo "Error: " . $sqlx . "
          " . mysqli_error($conn);
              }
              mysqli_close($conn);
          } 
    ?>

    <!-- Modal -->
  <div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">ADD</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="post">
            <div class="form-group">
              <div class="col">
                <input type="text" class="form-control" id="name" placeholder="Name .." name="name">
              </div>
            </div>
            <div class="form-group">
              <div class="col">
              <select name="id_work" class="form-control" id="work" required>
                <option value="" disabled selected>Work ..</option>
                <option value="1">Frontend Dev</option>
                <option value="2">Backend Dev</option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col">
              <select name="id_salary" class="form-control" id="salary" required>
                <option value="" disabled selected>Salary ..</option>
                <option value="1">Rp. 10.000.000</option>
                <option value="2">Rp. 12.000.000</option>
              </select>
              </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-2 col">
                <button type="submit" name="insert" id="insert" class="btn btn-success" value="Insert" style="float: right;">&nbsp;ADD&nbsp;</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="updateModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">EDIT DATA</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="post">

          
            <div class="form-group">
              <div class="col">
                <input type="text" class="form-control" id="name" placeholder="Name .." name="namex">
              </div>
            </div>
            <div class="form-group">
              <div class="col">
              <select name="id_workx" class="form-control" id="work" required>
                <option value="" disabled selected>Work ..</option>
                <option value="1">Frontend Dev</option>
                <option value="2">Backend Dev</option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col">
              <select name="id_salaryx" class="form-control" id="salary" required>
                <option value="" disabled selected>Salary ..</option>
                <option value="1">Rp. 10.000.000</option>
                <option value="2">Rp. 12.000.000</option>
              </select>
              </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-2 col">
                <button type="submit" name="update" id="update" class="btn btn-info" value="Update" style="float: right;">&nbsp;EDIT&nbsp;</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Kecil -->
<div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Data Berhasil Dihapus</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <center>
          <p><img src="https://icon-library.net/images/check-icon-png/check-icon-png-16.jpg" width="20%"></p>
        </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <script src="script/js/jquery.min.js"></script>
    <script src="script/js/bootstrap.bundle.min.js"></script>
    <script src="script/js/jquery.easing.min.js"></script>
    <script src="script/js/sb-admin.min.js"></script>

  </body>

</html>
