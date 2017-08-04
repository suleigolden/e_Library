<?php 
 include_once("menubar.php");
 include_once('a_membersconnect.php');
if(isset($_GET['checkmemeber'])){ 
	$Member_ID =$_POST['memberid'];
	$Borrowed_boked =$_POST['bookid'];
	$Bookdue_Date =$_POST['due_date'];
	
	$query_member = mysql_query("SELECT * FROM all_studentsrec WHERE studentid ='$Member_ID'");
	$member_check = mysql_num_rows($query_member);
	if($member_check > 0){
	while($rocomname22 = mysql_fetch_array($query_member)){
			$get_fname = $rocomname22['FirstName'];
			$get_lname = $rocomname22['LastName'];
			}
			session_start();
				$_SESSION['libraryborrowuser'] = $get_fname.' '.$get_lname;
				$_SESSION['Broored_bokedID'] = $Borrowed_boked;
				$_SESSION['Book_due_Date'] = $Bookdue_Date;
			
			echo "<script type='text/javascript'>window.location.href = 'borrow_book?memberborrow=".$Member_ID."';</script>";
					exit();
			
			
			
	
	}else{
	echo "<script type='text/javascript'>window.location.href = 'borrow?membererror';</script>";
					exit();
	}
	
}
$save_mesage = '';
if(isset($_GET['membererror'])){
	$save_mesage = '<h3 style="color:#F00; text-align:center;">Invalid Member ID</h3>';
 }else if(isset($_GET['borrowedbookedrerror'])){
	$save_mesage = '<h3 style="color:#F00; text-align:center;">Invalid Book ID</h3>';
 }else if(isset($_GET['borrowedbookedrerrorsaved'])){
	$save_mesage = '<h3 style="color:#F00; text-align:center;">ERROR---Try Again</h3>';
 }else if(isset($_GET['borrowedbookedsaved'])){
	$save_mesage = '<h3 style="color:green; text-align:center;">Borrowed Book Successful</h3>';
 }else{
	$save_mesage = '';
 }
?>

<div id="page-wrapper">

         <div class="row">
          <div class="col-lg-12">
            <h1><small>Borrow Book</small></h1>
            <ol class="breadcrumb" style="background-color:#bbd844;">
              <li><a href="book_return" class="bookmenu"><i class="fa fa-book"></i> View Return Books</a></li>
			   <li><a href="book_borrowed" class="bookmenu"><i class="fa fa-book"></i> View Borrowed Books</a></li>
			    <li><a href="returnbooks" class="bookmenu"><i class="fa fa-book"></i>  Return Book</a></li>
			
            </ol>
          </div>
        </div>
              
        <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default" style="background-color:#b4c756; color:#FFF; border-radius:3px; padding:4px;">
                    <div class="row">
				<?php echo $save_mesage; ?>
			  </div>
                    <div class="panel-body">
                        <form role="form" action="borrow.php?checkmemeber=true" method="post">
                            <fieldset>
                              <div class="form-group">
								MEMBER ID
                                   <input class="form-control" placeholder="Member ID" name="memberid" type="text"  required/>
                                </div>
								<div class="form-group">
								BOOK ID
                                   <input class="form-control" placeholder="Book ID" name="bookid" type="text"  required/>
                                </div>
								<div class="form-group">
								DUE DATE
                                   <input type="text"  class="w8em format-d-m-y highlight-days-67 range-low-today" name="due_date" id="sd" maxlength="10" style="border: 3px double #CCCCCC;" required/>
                                </div>
												
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Check Member" />
                                
                               
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