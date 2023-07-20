<script type="text/javascript">
$(function(){
    $('.factor').keyup(function(){
   var t=$(this).parents('tr')
        var factors=$('.factor',t);
    $('input[name^="imp_"]',t).val(Number(factors.eq(0).val())*Number(factors.eq(1).val()));
    });
});
</script>