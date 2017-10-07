<?
 
		
    $newAccount=  '';
    $modifyAccount =  '';
    $AccountListAlias =  '';
    $AccountListName =  '';

		
	

		function applicateLinks()
		{
				 	echo'<!-- this begins the applicate links-->';

		   	echo' <div class="container">';
          	echo'  <div class="row">';
			echo' 	  <div class="col-1">			  		   </div>';
          	echo'  	  <div class="col-10 text-center"><a href="index.php" class="btn btn-primary active" role="button" aria-pressed="true"><img src="images/great_blue_heron_9.jpg" width="30" height="30" alt="" border="0"></a>';
 			echo' 	  <a href="Applicate.php" class="btn btn-primary active" role="button" aria-pressed="true">Applicate</a>';
			echo' 	  <a href="ApplicateHistory.php" class="btn btn-primary active" role="button" aria-pressed="true">Application History</a>';
			echo' 	  <a href="blog" class="btn btn-primary active" role="button" aria-pressed="true">blogger</a>';
			echo' 	  <a href="" class="btn btn-primary active" role="button" aria-pressed="true">dead link</a></div>';
			echo' 	  <div class="col-1">			  		   </div>';
          	echo'  </div>';
          	echo' </div>';
				
		}
		
		
		function manageLinks()
		{
				 	echo'<!-- this begins the manage links-->';

		   	echo' <div class="container">';
          	echo'  <div class="row">';
			echo' 	  <div class="col-1">			  		   </div>';
          	echo'  	  <div class="col-10 text-center"><a href="index.php" class="btn btn-primary active" role="button" aria-pressed="true"><img src="images/great_blue_heron_9.jpg" width="30" height="30" alt="" border="0"></a>';
 			echo' 	  <a href="NewAccount.php" class="btn btn-primary active" role="button" aria-pressed="true">New Account</a>';
			echo' 	  <a href="ModifyAccount.php" class="btn btn-primary active" role="button" aria-pressed="true">View / Modify Account</a>';
			echo' 	  <a href="AcctListAlias.php" class="btn btn-primary active" role="button" aria-pressed="true">Accounts by Alias</a>';
			echo' 	  <a href="AcctListName.php" class="btn btn-primary active" role="button" aria-pressed="true">Accounts by Name</a>';
			echo' 	  <div class="col-1">			  		   </div>';
          	echo'  </div>';
          	echo' </div>';
				
		}

	    ?>