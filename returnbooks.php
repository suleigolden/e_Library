<?php 
 include_once("menubar.php");
 include_once('a_membersconnect.php');
if(isset($_GET['checkmemeber'])){ 
	$Borrowed_boked =$_POST['bookid'];

		$querybook = mysql_query("SELECT * FROM books_libraryusra WHERE book_id = '$Borrowed_boked' ");
			$book_check = mysql_num_rows($querybook);
			if($book_check < 1){
				echo "<script type='text/javascript'>window.location.href = 'returnbooks?bookrerror';</script>";
					exit();
			}else{
		$return_book = "Return";
		$query_book = mysql_query("SELECT * FROM borrowlibbookin WHERE book_borrowed ='$Borrowed_boked' AND borrowedsatusbook='Pending'");
		$member_book = mysql_num_rows($query_book);
		if($member_book > 0){
		$datereturn = date('Y/m/d H:i:s');
				if(mysql_query("UPDATE borrowlibbookin SET borrowedsatusbook = '$return_book', datereturend ='$datereturn' WHERE book_borrowed ='$Borrowed_boked' AND borrowedsatusbook='Pending'")){
				echo "<script type='text/javascript'>window.location.href = 'returnbooks?borrowedbookedsaved=".$Borrowed_boked."';</script>";
						exit();
				}else{
					echo "<script type='text/javascript'>window.location.href = 'returnbooks?borrowedbookedrerrorsaved=".$Borrowed_boked."';</script>";
						exit();
				}
		}else{
		echo "<script type='text/javascript'>window.location.href = 'returnbooks?borrowedbookyes=".$Borrowed_boked."';</script>";
						exit();
		}
  }
	
}
$save_mesage = '';
if(isset($_GET['bookrerror'])){
	$save_mesage = '<h3 style="color:#F00; text-align:center;">Invalid Book ID</h3>';
 }else if(isset($_GET['borrowedbookyes'])){
	$save_mesage = '<h3 style="color:#F00; text-align:center;">This Book Has Already Being Returned.</h3>';
 }else if(isset($_GET['borrowedbookedrerrorsaved'])){
	$save_mesage = '<h3 style="color:#F00; text-align:center;">ERROR---Try Again</h3>';
 }else if(isset($_GET['borrowedbookedsaved'])){
	$save_mesage = '<h3 style="color:green; text-align:center;">Book Return Successful</h3>';
 }else{
	$save_mesage = '';
 }
?>

<div id="page-wrapper">

         <div class="row">
          <div class="col-lg-12">
            <h1><small>Return Book</small></h1>
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
                        <form role="form" action="returnbooks.php?checkmemeber=true" method="post">
                            <fieldset>
                              
								<div class="form-group">
								BOOK ID
                                   <input class="form-control" placeholder="Book ID" name="bookid" type="text"  required/>
                                </div>
								
												
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Return Book" />
                                
                               
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