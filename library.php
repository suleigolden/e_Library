<?php 
 include_once("studentmenubar.php");
 
$display_all_students .= '';
//$sql312 = "SELECT * FROM books_libraryusra ORDER BY book_id DESC ";

$sql312 = "";
if(isset($_GET['viwbook'])){
$viewcategory = $_GET['viwbook'];
$sql312 = "SELECT * FROM books_libraryusra WHERE category_id ='$viewcategory' AND status = 'softcopylibrary' ORDER BY book_id DESC";
}else{
$sql312 = "SELECT * FROM books_libraryusra WHERE status = 'softcopylibrary' ORDER BY book_id DESC";
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
			
			if($get_status == "softcopylibrary"){
				$get_status = "Soft Copy";
			}else{
				$get_status = "Hard Copy";
			}
			
$display_all_students .= '<tr id="deleteme'.$get_book_id.'">
                    <td>'.$get_title.'</td>
					<td>'.$get_category.'</td>
					<td>'.$get_author.'</td>
					<td>'.$get_book_copies.'</td>
					<td>'.$get_book_pub.'</td>
                    <td>'.$get_publsh_name.'</td>
					<td>'.$get_copyright_year.'</td>
                    <td>
					<a href="library_book?viwbook='.$get_book_id.'" target="_blank" style="cursor:pointer;background-color: #5bb75b; color:#FFF; padding:3px; border-radius:3px; "><i class="fa fa-desktop"></i></a>
					</td>
                  </tr>';
			
		}
		

?>

      <div id="page-wrapper" style="width:100%; margin-left:-9%;">

        <div class="row">
          <div class="col-lg-12">
            <h1><small>Books</small></h1>
            <ol class="breadcrumb" style="background-color:#bbd844;">
			  <li><a href="library" class="bookmenu"><i class="fa fa-book"></i> All Books</a></li>
			  <li>
			  <form>
				<select name="viwbook" class="form-control" required>
										<option value="">Select book Category</option>
										<option value="English">English</option>
										<option value="Encyclopedia">Encyclopedia</option>
										<option value="General">General</option>
										<option value="Islamic">Islamic</option>
										<option value="Newspaper">Newspaper</option>
										<option value="Maths">Math</option>
										<option value="References">References</option>
										<option value="Science">Science</option>
									</select>
									</li>
									<li>
				<button type="submit" class="btn btn-success">Search Book</button>
			 </form></li>
            </ol>
          </div>
        </div>
			  <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
									  <tr>
										                 
                                        <th>Book Title</th>                         
                                        <th>Category</th>
										<th>Author</th>
										<th class="action">copies</th>
										<th>Book Publisher</th>
										<th>Publisher Name</th>
										<th>Copyright Year</th>
										<th class="action">View Book</th>
									  </tr>
									</thead>
                                    <tbody>
                                         <?php echo $display_all_students; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

	
    <!-- Bootstrap core JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js_two/ajax.js"></script>
    <script src="js_two/main.js"></script>
    
  <script type="text/javascript">

function delete_subject(posttype,id){
	
	 var u = posttype;
	 var idd = id;
	 
    if(u != ""){
		//alert("yyy"+idd+"__"+u);
     	_("deleteme"+idd).innerHTML = 'Deleting...';
		var ajax = ajaxObj("POST", "books.php");
		ajax.onreadystatechange = function() {
		if(ajaxReturn(ajax) == true) {
				
          var id_value =  _("deleteme"+idd).innerHTML = ajax.responseText; 

		  var valid_extensions = /(.jpg|.jpeg|.gif|.!)$/i;   
  		 if(valid_extensions.test(id_value)){
			 
			  var id_value =  _("deleteme"+idd).innerHTML = ajax.responseText; 
		  
           	 //document.getElementById(message_label).value = "Error.. please try again";
 		  }
 		 else
 		 {
  		  //alert('Invalid File')
  		 }
		   
       }
        }
        ajax.send("deletsubjectnow="+idd);
	}
	
}

</script>
  </body>
</html>