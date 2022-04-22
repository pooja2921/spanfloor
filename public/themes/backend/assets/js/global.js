$('.productstatus').change(function() {
  //alert('fghfhgfhgf');

  var scope = $(this).closest('tr'); 
  var id = $(this).data("id");
  console.log(id);
  var url=$(this).data("url");
  console.log(url);
  var stat=$('.productstatus option:selected', scope).val();
  console.log(stat);
  $.ajax({
    url: url,
    type: 'GET',
    data: {
      "stat":stat
    },
    success: function(data) {
      console.log(data);
    }
  });

  console.log("It failed");
});

$(".prtnrstatus").change(function() {
  //alert('test');
  var scope = $(this).closest('tr'); 
  var id = $(this).data("id");
  //console.log(id);
  var url=$(this).data("url");
  //console.log(url);
  var email=$(this).data("email");
  console.log(email);
  var status=$('.prtnrstatus option:selected', scope).val();
  //console.log(status);
  $.ajax({
    url: url,
    type: 'GET',
    data: {
      "status":status,"email":email
    },
    success: function(data) {
      console.log(data);
    }
  });

  console.log("It failed");
});


/* chngestatus for blog*/
$('.chngstatus').change(function() {
  //alert('fghfhgfhgf');

  var scope = $(this).closest('tr'); 
  var id = $(this).data("id");
  console.log(id);
  var url=$(this).data("url");
  console.log(url);
  var stat=$('.chngstatus option:selected', scope).val();

console.log(stat);
  $.ajax({
    url: url,
    type: 'GET',
    data: {
      "stat":stat
    },
    success: function(data) {
      console.log(data);
    }
  });

  console.log("It failed");
});



/* chngestatus for customer*/

$(".changestatus").change(function() {
  //alert('test');
  var scope = $(this).closest('tr'); 
  var id = $(this).data("id");
  console.log(id);
  var url=$(this).data("url");
  console.log(url);
  var status=$('.changestatus option:selected', scope).val();
  console.log(status);
  $.ajax({
    url: url,
    type: 'GET',
    data: {
      "status":status
    },
    success: function(data) {
      console.log(data);
    }
  });

  console.log("It failed");
});


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