/*
	-----------------------------------------------------||
	DevAdm - A New Admin Panel For Devana
	Version	: 0.3.1 Beta
	Author : I Putu Yoga Permana
	Date Released	: 02 January 2009
	
	Visit http://devana.eu/forum/viewtopic.php?f=20&t=81
	for News and update
	------------------------------------------------------||
*/

//Delete Confirmation
function delconf(obj) {
	if(confirm('Deleted '+obj+' can not be restored again !!! are you really want delete it ?') == true) {
		window.document.form.submit();
	}
}


