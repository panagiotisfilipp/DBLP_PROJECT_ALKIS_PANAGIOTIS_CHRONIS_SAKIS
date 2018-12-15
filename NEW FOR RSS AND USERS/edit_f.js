/* Πηγαίος κώδικος JavaScript */

//Διαγραφή rss
function rss_delete(id){

	 var confirmed = confirm("Είστε σίγουροι ότι θέλετε να διαγράψετε το rss;");
	 if (confirmed == true)
	 {
	//var loc=2;
	var str="./rss_delete.php?"+"&p1="+id;
	window.location=str; 
	 }
}



//Επεξεργασία rss
function rss_edit_form(id)
{
	var loc=1;
	var str="./rss_edit_form.php?"+loc+"&p1="+id;
	window.location=str; 	
}


//Διαγραφή user
function users_delete(user_id){

	 var confirmed = confirm("Είστε σίγουροι ότι θέλετε να διαγράψετε τον χρήστη;");
	 if (confirmed == true)
	 {
	//var loc=2;
	var str="./users_delete.php?"+"&p1="+user_id;
	window.location=str; 
	 }
}



//Επεξεργασία χρηστών
function users_edit_form(user_id)
{
	var loc=1;
	var str="./users_edit_form.php?"+loc+"&p1="+user_id;
	window.location=str; 	
}


