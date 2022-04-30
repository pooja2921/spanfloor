
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