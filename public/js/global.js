
$(document).on('click','.deletebyid',function(){
  //alert('ghfhgfh');
    if(!confirm("Do you really want to delete?")) {
         return false;
    }
  var url=$(this).data("url");
   console.log(url);
  var id=$(this).data("id");
   console.log(id);
$.ajax({
    url: url,
    type: 'GET',
    data: {
      "id":id
    },
    success: function(data) {
      console.log(data);
      if (data.status == "success") {
        
           $(document).find("tr").find("[data-id=" + data.data + "]").closest("tr").remove();
      }
    }
  });

  console.log("It failed");
});

$(document).on('click','.editbyid',function(){
  //alert('ghfhgfh');
    
  var url=$(this).data("url");
   //console.log(url);
  var id=$(this).data("id");
   //console.log(id);
$.ajax({
    url: url,
    type: 'GET',
    data: {
      "id":id
    },
    success: function(data) {
      console.log(data.status);
      if (data.status == "success") {
          //alert(data.attr.name);
           //$('#categoryView').css('display','block');
          $("#categoryView").modal("show");
          $('.attrname').val(data.attr.name);
          $('.attrid').val(data.attr.id);
      }
    }
  });

  console.log("It failed");
});

$('.updateform').click(function(){
  alert('dgdfgdgdf');
  //var url=$(this).data("url");
  //var id=$(this).data("id");
});