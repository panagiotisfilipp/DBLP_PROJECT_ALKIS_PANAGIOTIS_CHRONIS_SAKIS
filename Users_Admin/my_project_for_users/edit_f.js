/* Πηγαίος κώδικος JavaScript */

//Διαγραφή πρσ
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





