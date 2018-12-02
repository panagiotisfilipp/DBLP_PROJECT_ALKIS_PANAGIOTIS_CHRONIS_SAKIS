/* Πηγαίος κώδικος JavaScript */

//Διαγραφή πρσ
function rss_delete(id){

	 var confirmed = confirm("Είστε σίγουροι ότι θέλετε να διαγράψετε το rss;");
	 if (confirmed == true)
	 {
	//var loc=2;
	var str="./rss_delete.php?"+"&p1="+id;
	window.location=str; 
	 }
}



//Επεξεργασία χρηστών
function rss_edit_form(id)
{
	var loc=1;
	var str="./rss_edit_form.php?"+loc+"&p1="+id;
	window.location=str; 	
}





