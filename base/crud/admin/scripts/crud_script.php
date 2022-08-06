<!-- Área do script global do crud -->
<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  })

  $(document).ready(function(){
      inputsFilter = document.querySelectorAll(".filter-input-table");
        for (let i = 0; i < inputsFilter.length; i++) {
        const fm = inputsFilter[i];
              filter = document.querySelectorAll(".bt-crud-filter");
                for (let bt = 0; bt < filter.length; bt++) {
                const ft = filter[bt];
                    fm.addEventListener('change', function(e){
                      if ($(this).find(':selected').val() != "all") {
                          setTimeout(() => {
                            ft.classList.add("bt-filter-treme");
                          }, 0); 
                          ft.classList.remove("bt-filter-treme");
                      }
                      
                        
                    });
                  }
        }
  });

</script>

