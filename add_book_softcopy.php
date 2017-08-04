<?php 
 include_once("menubar.php");
if(isset($_GET['insertbook'])){ 
	$ibook_title=$_POST['book_title'];
	$icategory_id=$_POST['category_id'];
	$iauthor=$_POST['author'];
	$ibook_copies= '1'; //$_POST['book_copies'];
	$ibook_pub=$_POST['book_pub'];
	$ipublisher_name=$_POST['publisher_name'];
	$icopyright_year=$_POST['copyright_year'];
	$istatus= "softcopylibrary";//$_POST['status'];
	
	$book_type = 'softcopylibrary';
	
$folder = "librarybooks";
   if (is_uploaded_file($_FILES['softbook']['tmp_name'])) {

      if ($_FILES['softbook']['type'] != "application/pdf") {
         echo "<script type='text/javascript'>window.location.href = 'add_book_softcopy?pdfformaterror=true';</script>";
	  exit();
      } else {
	  
$result = move_uploaded_file($_FILES['softbook']['tmp_name'], $folder."/$ibook_title.pdf");
         if ($result == 1){
		 $directory  = $folder."/$ibook_title.pdf";
		 	if(mysql_query("INSERT INTO books_libraryusra VALUES ('','$ibook_title','$icategory_id','$iauthor','$ibook_copies','$ibook_pub','$ipublisher_name','null','$icopyright_year',Now(),'$istatus','$book_type','$directory')")){
	 echo "<script type='text/javascript'>window.location.href = 'add_book_softcopy?saved';</script>";
					exit();
	}else{
	 echo "<script type='text/javascript'>window.location.href = 'add_book_softcopy?inserterror=true';</script>";
	  exit();
	}
		 }else{
		 echo "<script type='text/javascript'>window.location.href = 'add_book_softcopy?inserterror=true';</script>";
			exit();
		 }
      } 
   } 
   

	
}
$save_mesage = '';
 if(isset($_GET['saved'])){
	$save_mesage = 'Record Save!.. <a href="books"></i><i class="fa fa-book"></i> View Books</a></li>';
 }else if(isset($_GET['inserterror'])){
	$save_mesage = '<p>Error.... try again.</p>';
 }else if(isset($_GET['pdfformaterror'])){
	$save_mesage = '<p>Book must be in PDF format!</p>';
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
			  <li><a href="add_book" class="bookmenu"><i class="fa fa-edit"></i> Add Book</a></li>
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
                        <form role="form" action="<?php print $PHP_SELF?>?insertbook=true" enctype="multipart/form-data" method="post">
                            <fieldset>
                              <div class="form-group">
								SELECT BOOK
                                 <input type="file" name="softbook" class="form-control" required/>
                                </div>
								<div class="form-group">
								BOOK TITLE
                                   <input class="form-control" placeholder="Book Title" name="book_title" type="text" autofocus required>
                                </div>
								<div class="form-group">
								CATEGORY
                                   <select name="category_id" class="form-control" required>
										<option value="">Select Category</option>
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
                                   <input class="form-control" placeholder="Author" name="author" type="text" autofocus required>
                                </div>
								
								<div class="form-group">
								BOOK PUBLICATION
                                   <input class="form-control" placeholder="Book Publication" name="book_pub" type="text" autofocus required>
                                </div>
								<div class="form-group">
								PUBLISHER NAME
                                   <input class="form-control" placeholder="Publisher Name" name="publisher_name" type="text" autofocus required>
                                </div>
								<div class="form-group">
								COPYRIGHT YEAR
                                   <input class="form-control" placeholder="Copyright Year" name="copyright_year" type="text" autofocus required>
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