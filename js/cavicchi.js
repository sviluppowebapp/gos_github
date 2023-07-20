<!-- SCRIPT JS PER CALENDARIO DATA PICKER -->

<script type="text/javascript">
$(function(){
     $.datepicker.setDefaults( $.datepicker.regional[ "it" ] );
     $('.datepicker').datepicker();
});
</script>

<!-- SCRIPT CONTROLLO FORMATO KM VALORIZZARE IL FORM INPUT CON IL VALORE ONKEYUP-->

<script type="text/javascript">
	function VerificaKm(ele){
        var str=document.getElementById(ele.id).value; 
        var filt=/^[0-9]+$/; 
        if(!filt.test(str)) {alert('I km devono essere solo numeri');}
}
</script>

<!-- SCRIPT CONTROLLO FORMATO TARGA VALORIZZARE IL FORM INPUT CON IL VALORE ONKEYUP-->

<script type="text/javascript">
	function VerificaTarga(ele){
        var str=document.getElementById(ele.id).value; 
        var filt=/^[a-zA-Z0-9]+$/; 
        if(!filt.test(str)) {alert('La targa è composta da solo numeri e lettere');}
}
</script>

<!-- SCRIPT ANDREA CAVICCHI HTML.IT -->

<script type="text/javascript">
$(document).ready(function(){
var regex = /^(.*)(\d)+$/i;
var cindex = 1;
    
	$('body').on('click', '.add', function() {
	cindex++;
	
	if(cindex<=15){
	var newRow = '<tr class="righe"><td><input type="text" name="itr'+cindex+'" id="itr'+cindex+'" class="t1" size="30" placeholder="Max 49 caratteri" maxlength="49"></td><td><input type="text" name="for'+cindex+'" id="for'+cindex+'" class="t1" size="10"></td><td><input type="text" name="q'+cindex+'" class="t2 somma" id="q'+cindex+'" size="3" value="0.0" onkeyup="SommaRiga('+cindex+')" placeholder="0"></td><td><input type="text" name="iu'+cindex+'" class="t2 somma"  onBlur="Format('+cindex+')" onkeyup="SommaRiga('+cindex+')" id="iu'+cindex+'" size="6" value="0.00" placeholder="0.00"></td><td><input type="text" name="sc'+cindex+'" class="t2 somma" onkeyup="Virgola('+cindex+')" id="sc'+cindex+'" size="8" value="0.0" placeholder="sconto"></td><td><input type="text" name="imp_'+cindex+'" id="imp_'+cindex+'" class="t2 somma" size="8" value="0.0" placeholder="0.00" readonly></td><td><img src="images/add.png" name="add1" width="16" height="16" id="add'+cindex+'" class="add"></td></tr>'
	$("#commessa tbody tr").eq((cindex-1)).after(newRow)
	}else{
	alert('Non puoi inserire più di 15 righe');
	return false;
	}
        $('.add').not(':last').addClass( 'addisable' ).removeClass( 'add' )
        }).on('focus','.somma', function(){
	$(this).not('input[name^="imp_"]').val('')
	})
});
function Format(ele){
	var valore = ($("#iu"+ele).val()*1)
	$("#iu"+ele).val(valore.toFixed(2))
}

function Virgola(nele){
	var cambia = $("#sc"+nele).val().replace(/\,/g,'.')
	$("#sc"+nele).val(cambia)
	SommaRiga(nele)
}

function SommaRiga(num){
var tot = 0
	var qt = $("#q"+num).val()
	var unitario = $("#iu"+num).val()
	var sc = $("#sc"+num).val()
	var Tot = (qt*1*unitario*1)
	var impsc = (Tot/100*sc)
	var somma = (Tot-impsc)
	if(somma>0){
		$("#imp_"+num).val(somma.toFixed(2))
	}else{
		$("#imp_"+num).val('')
		$("#iu"+num).val('')
	}
	var elem = $('input[name^="imp_"]')
	for(i=0; i<elem.length;i++) {
	tot += (elem.eq(i).val()*1)
    };
	$("#totale").val(tot.toFixed(2))
	//alert(num)
}
</script>

<style type="text/css">
.add{cursor:pointer;}
.addisable{opacity:0.5;}
.remove{cursor:pointer; visibility:visible;}
.removedisable{visibility:hidden;}
.uppercase{border:#999 1px solid;}
#totale{font-weight: bold;border: 1px groove #900;}
</style>