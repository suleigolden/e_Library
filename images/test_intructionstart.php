<?php 
 include_once("menubar.php");
?>
<?php 
error_reporting(E_ALL);
error_reporting(E_ERROR);
ini_set('display_errors', '1');
include_once('admin/dialogconnectnowin.php');
session_start();


$count = 1;
if(isset($_GET['insertnewstudent'])){//to run PHP script on submit
    
$subjecin_in = mysql_real_escape_string( htmlentities($_POST['subjecin']));
$fiest_name = mysql_real_escape_string( htmlentities($_POST['fname']));
$last_name = mysql_real_escape_string( htmlentities($_POST['lname']));



 $sql312 = "SELECT * FROM subject_allinyes WHERE id ='$subjecin_in'";
		$query312 = mysql_query($sql312);
                $countsub = mysql_num_rows($query312);
		while($rocomname22 = mysql_fetch_array($query312)){
 	 		$get_subject = $rocomname22['subject'];
		}
 $querysub1 = mysql_query("SELECT * FROM test_num_question_tonanswer WHERE subject ='$get_subject'");
$countsub1 = mysql_num_rows($querysub1);
          while($rocsub= mysql_fetch_array($querysub1)){
                        $get_subnumquestion = $rocsub['num'];   
          }
          if($countsub1 < 1){
              header("location:index.php?numbernotset");
          }else{
            $_SESSION['$number_of_question_to_answer'] = $get_subnumquestion;
            $limitget = $get_subnumquestion; 
          }
$querysubtime = mysql_query("SELECT * FROM test_time_school WHERE subject ='$get_subject'");
$countsubtime = mysql_num_rows($querysubtime);
          while($rocsubtime= mysql_fetch_array($querysubtime)){
                        $get_subnumtime = $rocsubtime['timesetinyes'];           
          }
           if($countsubtime < 1){
              header("location:index.php?timenotset");
          }else{
                $_SESSION['$number_of_question_to_answer_examtime'] = $get_subnumtime;
          }
                
               if($countsub > 0){   
		$queryexnum = mysql_query("SELECT * FROM test_result_school");
                $countexnum = mysql_num_rows($queryexnum);
                $exam_number = 'S'.$countexnum; 
                   $_SESSION['subject_nowexam'] = $get_subject;
                   $_SESSION['exam_number'] = $exam_number;
                   $_SESSION['examfname'] = $fiest_name;
                   $_SESSION['examlname'] = $last_name;
                   
      $sql = "SELECT * FROM subject_schoolall WHERE activesubject='$get_subject' ORDER BY RAND() LIMIT $limitget";
 	 $get_sql = mysql_query($sql);
while($inset_test = mysql_fetch_array($get_sql)){
 	 $ques_id_getin = $inset_test['id'];
	 
	 $qtypeyes_inset = $inset_test['qtypeyes'];
	 $questioninyesimg_inset =$inset_test['questioninyes'];
	 
	 $tionatypeyes_inset = $inset_test['tionatypeyes'];
	 $tionainyesimg_inset = $inset_test['tionainyes'];
	 
	 $tionbtypeyes_inset = $inset_test['tionbtypeyes'];
	 $tionbinyesimg_inset =$inset_test['tionbinyes'];
	 
	 $tionctypeyes_inset = $inset_test['tionctypeyes'];
	 $tioncinyesimg_inset = $inset_test['tioncinyes'];
	 
	 $tiondtypeyes_inset = $inset_test['tiondtypeyes'];
	 $tiondinyesimg_inset = $inset_test['tiondinyes'];
	 
	 $tionanstypeyes_inset = $inset_test['tionanstypeyes'];
	 $tionansinyesimg_inset = $inset_test['tionansinyes'];
         
         $result = mysql_query("SELECT * FROM test_school_begintest WHERE ucomname='$exam_number' AND subject = '$get_subject'");
		$rowsss = mysql_num_rows($result);
	if($rowsss < $limitget ){
		$count = $rowsss  + 1; 
		
	mysql_query("INSERT INTO test_school_begintest VALUES ('','$ques_id_getin','$count','$exam_number','$get_subject',
	'$qtypeyes_inset','$questioninyesimg_inset',
	'$tionatypeyes_inset','$tionainyesimg_inset',
	'$tionbtypeyes_inset','$tionbinyesimg_inset',
	'$tionctypeyes_inset','$tioncinyesimg_inset',
	'$tiondtypeyes_inset','$tiondinyesimg_inset',
	'$tionanstypeyes_inset','$tionansinyesimg_inset')");
	
	$count ++;
	}else{
		$count ++;
	}
$count ++;
}


               }else{
                   
                    header("location:index.php?invalidsubject=true");
               }
		

}
 $get_subject = $_SESSION['subject_nowexam'];
 $countexnum = $_SESSION['exam_number'];
 $fiest_name = $_SESSION['examfname'];
 $last_name = $_SESSION['examlname'];
 
 

 
  
$display_all_instruction .= '';
$sql312 = "SELECT * FROM test_instruction WHERE type ='school' ORDER BY id DESC ";
		$query312 = mysql_query($sql312);
		while($rocomname22 = mysql_fetch_array($query312)){
			$get_subID = $rocomname22['id'];
 	 		$get_instruction = $rocomname22['instruction'];
			
			
$display_all_instruction .= '<li id="deleteme'.$get_subID.'">'.$get_instruction.'</li></br>';
			
		}
?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
              <div style="background-color: #051e46; color: #FFF; padding: 10px;">
                  <h1 style="text-align: center;">Exam Instructions</h1>
                <label>Welcome: <?php echo $fiest_name.' '.$last_name; ?></label></br>
                <label>Exam Number: <?php echo $countexnum; ?></label></br>
                <label>Subject: <?php echo $get_subject; ?></label>
              </div>
          </div>
        </div><!-- /.row -->
        
        <ul style=" font-size: 18px; margin-top: 10px;">
                
                 <?php echo $display_all_instruction; ?>
            </ul>
            
        <h1 style="text-align: center;">Wish you all the best</h1>
        
        <h1 style="text-align: center;"><a href="admin/test_exam_school_startnow" class="btn btn-success"  target="_blank" title="Start Exam" >Start Exam</a></h1>
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>