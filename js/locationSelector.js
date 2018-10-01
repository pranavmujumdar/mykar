/*This function is called when state dropdown value change*/
      function selectState(state_id){
        if(state_id!=""){
          loadData('city',state_id);
        }else{
          $("#city").html("<option value=''>Select City</option>");
        }
      }
      
      /*This function is called when city dropdown value change*/
      function selectCity(country_id){
        if(country_id!=""){
          loadData('state',country_id);
          $("#city").html("<option value=''>Select City</option>");
        }else{
          $("#state").html("<option value=''>Select State</option>");
          $("#city").html("<option value=''>Select City</option>");
        }
      }
      
      /*This is the main content load function, and it will
      called whenever any valid dropdown value changed.*/
      function loadData(loadType,loadId){
        var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
        $("#"+loadType+"_loader").show();
        $("#"+loadType+"_loader").fadeIn(400).
        html('Please wait... <img src="img/loading.gif" />');
        $.ajax({
         type: "POST",
         url: "php_loadData.php",
         data: dataString,
         cache: false,
         success: function(result){
           $("#"+loadType+"_loader").hide();
           $("#"+loadType+"_dropdown").
           html("<option value=''>Select "+loadType+"</option>");
           $("#"+loadType+"_dropdown").append(result);
         }
       });
      }