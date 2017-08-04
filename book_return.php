<?php 
 include_once("menubar.php");
 

$get_book_status ="";
$display_all_students .= '';

$sql312 = "SELECT * FROM borrowlibbookin WHERE borrowedsatusbook='Return'";
		$query312 = mysql_query($sql312);
		while($rocomname22 = mysql_fetch_array($query312)){
			$get_borrow_id = $rocomname22['borrow_id'];
 	 		$Member_borrowed = $rocomname22['member_id'];
			$get_date_borrow = $rocomname22['date_borrow'];
			$get_due_date = $rocomname22['due_date'];
			$get_book_borrowed = $rocomname22['book_borrowed'];
			$get_attendy_user = $rocomname22['attendy_user'];
			$getdatereturend = $rocomname22['datereturend'];
			
			$querytitle = mysql_query("SELECT * FROM books_libraryusra WHERE book_id = '$get_book_borrowed' ");
		while($roctitle= mysql_fetch_array($querytitle)){
			$get_book_title = $roctitle['book_title'];

			include_once("a_getmember_borrow.php");
			$borrowed_member = get_display_member($Member_borrowed);
			
$display_all_students .= '<tr>
                    <td>'.$get_book_title.'</td>
                    <td>'.$borrowed_member.'</td>
					<td>'.$get_date_borrow.'</td>
					<td>'.$get_due_date.'</td>
					<td>'.$getdatereturend.'</td>
                  </tr>';
			

				}
			
		}
		

?>

      <div id="page-wrapper" style="width:100%; margin-left:-9%;">

         <div class="row">
          <div class="col-lg-12">
            <h1><small>Return Books</small></h1>
            <ol class="breadcrumb" style="background-color:#bbd844;">
              <li><a href="book_return" class="bookmenu"><i class="fa fa-book"></i> View Return Books</a></li>
			   <li><a href="book_borrowed" class="bookmenu"><i class="fa fa-book"></i> View Borrowed Books</a></li>
			   <li><a href="returnbooks" class="bookmenu"><i class="fa fa-book"></i>  Return Book</a></li>
			   <li><a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a></li>
            </ol>
            </ol>
          </div>
        </div>
			  <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
									  <tr>
										<th>BOOK TITLE</th>                      
                                        <th>BORROWER</th>                         
                                        <th>DATE BORROW</th>
										<th>DUE DATE</th>
										<th>DATE RETURNED</th>
									  </tr>
									</thead>
                                    <tbody>
                                         <?php echo $display_all_students; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

  </body>
</html>