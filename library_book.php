<?php 
 include_once("studentmenubar.php");
 
$sql312 = "";
if(isset($_GET['viwbook'])){
$viewcategory = $_GET['viwbook'];
$sql312 = "SELECT * FROM books_libraryusra WHERE book_id ='$viewcategory'";
}else{
$sql312 = "";
}
		$query312 = mysql_query($sql312);
		while($rocomname22 = mysql_fetch_array($query312)){
			$get_location = $rocomname22['location'];
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
			  <div class="row">
                   
						
     <iframe src="<?php echo $get_location; ?>" style="width:100%; height:750px;"></iframe>    
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