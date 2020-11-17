 

function hide()
{
 document.getElementById('creditcard').classList.add('hidden');
 document.getElementById('checkout').classList.remove('hidden');
}

function show(){
	 document.getElementById('creditcard').classList.remove('hidden');
	 document.getElementById('checkout').classList.add('hidden');
}


function submit(){

 $('form input').change(function() {
    $(this).closest('form').submit();
});

}

