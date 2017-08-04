<?php 
 include_once("menubar.php");
 
if(isset($_GET['memberborrow'])){
$Member_ID =$_GET['memberborrow'];
$_SESSION['Member_IDDborrowed'] = $Member_ID;
$borrow_users = $_SESSION['libraryborrowuser'];
$Borrowed_boked = $_SESSION['Broored_bokedID'];
$Bookdue_Date = $_SESSION['Book_due_Date'];

$sql312 = "SELECT * FROM books_libraryusra WHERE book_id = '$Borrowed_boked' ";
		$querybook = mysql_query($sql312);
			$member_book = mysql_num_rows($querybook);
			if($member_book < 1){
				echo "<script type='text/javascript'>window.location.href = 'borrow?borrowedbookedrerror=".$Borrowed_boked."';</script>";
					exit();
			}else{
			
		while($rocomname22 = mysql_fetch_array($querybook)){
			$get_book_id = $rocomname22['book_id'];
 	 		$get_title = $rocomname22['book_title'];
			$get_book_copies = $rocomname22['book_copies'];
			$get_category = $rocomname22['category_id'];
			$get_author = $rocomname22['author'];
			$get_book_pub = $rocomname22['book_pub'];
			$get_publsh_name = $rocomname22['publisher_name'];
			$get_isbn = $rocomname22['isbn'];
			$get_copyright_year = $rocomname22['copyright_year'];
			$get_date_added = $rocomname22['date_added'];
			$get_status = $rocomname22['status'];
			$get_copyright_year = $rocomname22['copyright_year'];
			if($get_status == "softcopylibrary"){
				$get_status = "Soft Copy";
			}else{
				$get_status = "Hard Copy";
			}
$display_all_students = '<tr id="deleteme'.$get_book_id.'">
                    <td>'.$get_book_id.'</td>
                    <td>'.$get_title.'</td>
					<td>'.$get_category.'</td>
					<td>'.$get_author.'</td>
					<td>'.$get_book_copies.'</td>
					<td>'.$get_book_pub.'</td>
                    <td>'.$get_publsh_name.'</td>
					<td>'.$get_copyright_year.'</td>
					<td>'.$get_date_added.'</td>
					<td>'.$get_status.'</td>
                  </tr>';
			}
		}
 
 }

if(isset($_GET['insertconfirmborrowed'])){
$Member_IDD = $_SESSION['Member_IDDborrowed'];
$borrow_users = $_SESSION['libraryborrowuser'];
$Borrowed_boked = $_SESSION['Broored_bokedID'];
$Bookdue_Date = $_SESSION['Book_due_Date'];
$usernamein = $_SESSION['adminlibusralogincheck'];
$borrowd_status = "Pending";
	if(mysql_query("INSERT INTO borrowlibbookin VALUES ('','$Member_IDD',Now(),'$Bookdue_Date','$Borrowed_boked','$usernamein','$borrowd_status','')")){
		echo "<script type='text/javascript'>window.location.href = 'borrow?borrowedbookedsaved';</script>";
		exit();
	}else{
		echo "<script type='text/javascript'>window.location.href = 'borrow?borrowedbookedrerrorsaved';</script>";
		exit();
	}

}
?>

<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1><small>Confirm Borrow Book</small></h1>
            <ol class="breadcrumb" style="background-color:#bbd844;">
              <li><a href="book_borrowed?viewbook=Return" class="bookmenu"><i class="fa fa-book"></i> View Return Books</a></li>
			   <li><a href="book_borrowed?viewbook=Borrowed" class="bookmenu"><i class="fa fa-book"></i> View Borrowed Books</a></li>
			    <li><a href="returnbooks" class="bookmenu"><i class="fa fa-book"></i>  Return Book</a></li>
			
            </ol>
          </div>
        </div>
         
		 
		 
        <div class="container">
        <div class="row">
		<div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
									  <tr>
										<th>Acc No.</th>                                 
                                        <th>Book Title</th>                         
                                        <th>Category</th>
										<th>Author</th>
										<th class="action">copies</th>
										<th>Book Pub</th>
										<th>Publisher Name</th>
										<th>Copyright Year</th>
										<th>Date Added</th>
										<th>Status</th>
									  </tr>
									</thead>
                                    <tbody>
                                         <?php echo $display_all_students; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default" style="background-color:#b4c756; color:#FFF; border-radius:3px; padding:4px;">
                    
                    <div class="panel-body">
                        <form role="form" action="borrow_book.php?insertconfirmborrowed=true" method="post">
                            <fieldset>
                              <div class="form-group">
								MEMBER: <?php echo $borrow_users; ?>
                               </div>
							   <div class="form-group">
								DUE DATE: <?php echo $Bookdue_Date; ?> 
                               </div>
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Confirm Borrow" />
                                
                               
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>