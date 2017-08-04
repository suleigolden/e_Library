<?php 
 include_once("menubar.php");
 
$display_all_students .= '';
//$sql312 = "SELECT * FROM books_libraryusra ORDER BY book_id DESC ";

$sql312 = "";
if(isset($_GET['viwbook'])){
$viewcategory = $_GET['viwbook'];
$sql312 = "SELECT * FROM books_libraryusra WHERE status = '$viewcategory' ORDER BY book_id DESC";
}else{
$sql312 = "SELECT * FROM books_libraryusra WHERE status != 'Archive' ORDER BY book_id DESC";
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
                    <td><i class="fa fa-trash-o"  style="cursor:pointer; color:#F00; " title="Delete '.$get_title.'" onclick="delete_subject(\''.$get_book_id.'\',\''.$get_book_id.'\')"> delete</i>
					</br></br>
					<a href="book_update?updateme='.$get_book_id.'" style="cursor:pointer;background-color: #5bb75b; color:#FFF; padding:3px; border-radius:3px; "><i class="fa fa-edit"></i></a>
					</td>
                  </tr>';
			
		}
		
if(isset($_POST["deletsubjectnow"])){
   $deletevalue = $_POST['deletsubjectnow'];
   $query312 = mysql_query("SELECT * FROM books_libraryusra WHERE book_id ='$deletevalue'");
		while($rocomname22 = mysql_fetch_array($query312)){
			$get_location = $rocomname22['location'];
			}
			unlink($get_location);
   if(mysql_query("DELETE FROM books_libraryusra WHERE book_id ='$deletevalue' ")){
	   echo "";
      exit();
   }else{
	  echo " ";
      exit();
   }
}
?>

      <div id="page-wrapper" style="width:100%; margin-left:-9%;">

        <div class="row">
          <div class="col-lg-12">
            <h1><small>Books</small></h1>
            <ol class="breadcrumb" style="background-color:#bbd844;">
              <li><a href="add_book" class="bookmenu">Add Book</a></li>
			  <li><a href="books" class="bookmenu">All Books</a></li>
			  <li><a href="books?viwbook=softcopylibrary" class="bookmenu">Soft Copy </a></li>
			  <li><a href="books?viwbook=New" class="bookmenu">New Books</a></li>
			  <li><a href="books?viwbook=Old" class="bookmenu">Old Books</a></li>
			  <li><a href="books?viwbook=Lost" class="bookmenu">Lost Books</a></li>
			  <li><a href="books?viwbook=Damage" class="bookmenu">Damage Books</a></li>
			  <li><a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a></li>
            </ol>
          </div>
        </div>
			  <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
									  <tr>
										<th>Acc No.</th>                                 
                                        <th>Book Title</th>                         
                                        <th>Category</th>
										<th>Author</th>
										<th class="action">copies</th>
										<th>Book Publisher</th>
										<th>Publisher Name</th>
										<th>Copyright Year</th>
										<th>Date Added</th>
										<th>Status</th>
										<th class="action">Action</th>
									  </tr>
									</thead>
                                    <tbody>
                                         <?php echo $display_all_students; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
<!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="../bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
	
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