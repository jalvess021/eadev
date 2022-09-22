<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script> $('#modalAddAv').modal('show') </script>
<script>
    $(document).ready(function(){
        $('#selectFormacao').change(function(){
            $('#selectCurso').load('/tcc/selects/select_cur.php?filter_form='+$('#selectFormacao').val());
        });
    $('#selectCurso').change(function(){
        $('#selectModulo').load('/tcc/selects/select_mod.php?filter_form='+$('#selectFormacao').val()+'&filter_cur='+$('#selectCurso').val());
    });
});
</script>