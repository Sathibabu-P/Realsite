

    $(document).ready(function() {


        $('.close').click(function(){
          $(this).parent().fadeOut(100);
        });


        // Areas Load
        $('select[name="city_id"]').on('change', function() {
            var city_id = $(this).val();
            if(city_id) {
                $.ajax({
                    url: '/realsite/properties/areas/'+city_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                     
                        $('select[name="area_id"]').empty();
                        $('select[name="area_id"]').append('<option value="">Select Areas</option>');
                        $.each(data, function(key, value) {                            
                            $('select[name="area_id"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                     
                        $('select').selectpicker('refresh');
                    }
                });
            }else{
                $('select[name="area_id"]').empty();
            }
        });

            $('#submit_enquire').click(function(e){

             
               var form = $("#form_enquire").serialize();

             
               e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "/realsite/properties/enquiry",
                    data: form,                 
                    success: function(data){
                        alert(data);
                        $("#form_enquire")[0].reset();
                    },
                    error: function() { alert("Error posting data."); }
                });


                
            });



    });
