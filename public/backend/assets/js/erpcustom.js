//income Select Price
  $(document).ready(function(){
                    $('#mobileNumber').append(`Select At frist Income Catagory`);
       $('#custo_name').on('change',function(){
                    let custo_name = $(this).val();
                    if(custo_name){
                       $('#mobileNumber').empty();
                    $('#mobileNumber').append(`Processing...`);

                    $.ajax({
                      type: 'GET',
                      url: 'ownerSelect/'+ custo_name,
                      success: function (response) {
                      var response = JSON.parse(response);
                      console.log(response);   
                      $('#mobileNumber').empty();
                      response.forEach(element => {
                      $('#mobileNumber').val(`${element['mobile']}`);
                        });
                      }
                  });
                    }else{
                      $('#mobileNumber').empty();
                      $('#mobileNumber').append(`Select At frist Income Catagory`);
                    }

                   
                });
          });