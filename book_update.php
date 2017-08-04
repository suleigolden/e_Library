<?php 
 include_once("menubar.php");
 if(isset($_GET['updateme'])){
 $updateId = $_GET['updateme'];
 $sql312 = "SELECT * FROM books_libraryusra WHERE book_id = '$updateId' ";
 }else if(isset($_GET['saved'])){
 $updateId = $_GET['saved'];
 $sql312 = "SELECT * FROM books_libraryusra WHERE book_id = '$updateId' ";
 }
		$query312 = mysql_query($sql312);
		while($rocomname22 = mysql_fetch_array($query312)){
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
			}
 
 
if(isset($_GET['updatemetbook'])){ 
	$ibook_title=$_POST['book_title'];
	$icategory_id=$_POST['category_id'];
	$iauthor=$_POST['author'];
	$ibook_copies=$_POST['book_copies'];
	$ibook_pub=$_POST['book_pub'];
	$ipublisher_name=$_POST['publisher_name'];
	$icopyright_year=$_POST['copyright_year'];
	$istatus=$_POST['status'];
	$iupdateme =$_POST['updateme'];
	
	if(mysql_query("UPDATE books_libraryusra SET book_title ='$ibook_title',category_id='$icategory_id',author='$iauthor', book_copies='$ibook_copies',book_pub='$ibook_pub',publisher_name='$ipublisher_name',copyright_year='$icopyright_year',status='$istatus' WHERE book_id='$iupdateme'")){
	 echo "<script type='text/javascript'>window.location.href = 'book_update?saved=".$iupdateme."';</script>";
					exit();
	}else{
	 echo "<script type='text/javascript'>window.location.href = 'book_update?inserterror=true';</script>";
	  exit();
	}
	
}
$save_mesage = '';
 if(isset($_GET['saved'])){
	$save_mesage = 'Book Updated!.. <a href="books" style="color:green;"></i><i class="fa fa-book"></i> View Books</a>';
 }else if(isset($_GET['inserterror'])){
	$save_mesage = '<p style="color:#F00;">Error.... try again.</p>';
 }else{
	$save_mesage = '';
 }
?>

      <div id="page-wrapper">

               <div class="row">
          <div class="col-lg-12">
            <h1><small>Add new Book</small></h1>
            <ol class="breadcrumb" style="background-color:#bbd844;">
              <li><a href="books" class="bookmenu"><i class="fa fa-book"></i> View Books</a></li>
			  <li><a href="#" class="bookmenu"><i class="fa fa-edit"></i> Add soft copy Book</a></li>
            </ol>
          </div>
        </div>
              <div class="row">
				<?php echo $save_mesage; ?>
			  </div>
        <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default" style="background-color:#b4c756; color:#FFF; border-radius:3px; padding:4px;">
                    
                    <div class="panel-body">
                        <form role="form" action="book_update.php?updatemetbook=true" method="post">
						<input type="hidden" name="updateme" value="<?php echo $get_book_id; ?>" />
                            <fieldset>
                              <div class="form-group">
								BOOK TITLE
                                   <input class="form-control" placeholder="Book Title" name="book_title" value="<?php echo $get_title; ?>" type="text" autofocus required>
                                </div>
								<div class="form-group">
								CATEGORY
                                   <select name="category_id" class="form-control" required>
										<option value="<?php echo $get_category; ?>"><?php echo $get_category; ?></option>
										<option value="English">English</option>
										<option value="Encyclopedia">Encyclopedia</option>
										<option value="General">General</option>
										<option value="Islamic">Islamic</option>
										<option value="Newspaper">Newspaper</option>
										<option value="Maths">Math</option>
										<option value="References">References</option>
										<option value="Science">Science</option>
									</select>
                                </div>
								<div class="form-group">
								AUTHOR
                                   <input class="form-control" placeholder="Author" name="author" value="<?php echo $get_author; ?>" type="text" autofocus required>
                                </div>
								<div class="form-group">
								BOOK COPIES
                                   <select name="book_copies" class="form-control" required>
										<option value="<?php echo $get_book_copies;?>"><?php echo $get_book_copies;?></option>
										<?php  include_once("add_options.php"); ?>
									</select>
                                </div>
								<div class="form-group">
								BOOK PUBLICATION
                                   <input class="form-control" placeholder="Book Publication" name="book_pub" value="<?php echo $get_book_pub; ?>" type="text" autofocus required>
                                </div>
								<div class="form-group">
								PUBLISHER NAME
                                   <input class="form-control" placeholder="Publisher Name" name="publisher_name" value="<?php echo $get_publsh_name; ?>" type="text" autofocus required>
                                </div>
								<div class="form-group">
								COPYRIGHT YEAR
                                   <input class="form-control" placeholder="Copyright Year" name="copyright_year" value="<?php echo $get_copyright_year; ?>" type="text" autofocus required>
                                </div>
								<div class="form-group">
								STATUS
                                   <select name="status" class="form-control" required>
										<option value="<?php echo $get_status; ?>"><?php echo $get_status; ?></option>
										<option value="New">New</option>
										<option value="Old">Old</option>
										<option value="Lost">Lost</option>
										<option value="Damage">Damage</option>
									</select>
                                </div>
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Save Book" />
                                
                               
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