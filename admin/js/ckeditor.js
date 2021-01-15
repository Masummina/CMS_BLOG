
$(document).ready(function(){
	ClassicEditor
	.create( document.querySelector( '#posteditor' ) )
	.catch( error => {
	    console.error( error );
	} );
	ClassicEditor
	.create( document.querySelector( '#postupdate' ) )
	.catch( error => {
	    console.error( error );
	} );postupdate
});
