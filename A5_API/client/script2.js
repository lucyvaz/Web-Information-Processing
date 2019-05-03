

//This is the Create function

//Source code: https://www.airpair.com/js/jquery-ajax-post-tutorial

$(document).ready(function() {
    $('#readingform').submit(function(e) {
        e.preventDefault();
       $.ajax({
    url: '../service/api.php/products',
    dataType: 'json',
    type: 'POST',
    contentType: 'application/json',
    data: JSON.stringify( { "date": $('#date').val(), "name": $('#name').val(), "url": $('#url').val(), "description": $('#description').val() } ),
    processData: false,
    success: function( data, textStatus, jQxhr ){
      //alert('success');
        $('#response pre').html( JSON.stringify( data ) );
    },
    error: function( jqXhr, textStatus, errorThrown ){
        console.log( errorThrown );
            }
        });
     });
  });

//This is the get method

//var dataretrieve =( "serachterm": user_id, "serachtype": );

$(document).ready(function(){
  $("#inputget").click(function(event){

    var id = $('#identifier').val();
    console.log('id', id);
    event.preventDefault();
      $.ajax({
      url: '../service/api.php/products/' + id,
      dataType: 'text',
      type:'GET',
      contentType: 'application/x-www-form-urlencoded',
      data: $(this).serialize(),
          success: function(data, textStatus, jQxhr){
            //JSONObject myObject = new JSONObject(data);
            console.log('data', JSON.parse(data));
            $("#get_results").html(data);
      },
      error: function(jqXhr, textStatus, errorThrown){
        console.log( errorThrown );
         }
      });
     });
 });


//This is the get method by NAME

$(document).ready(function(){
  $("#inputget2").click(function(event){
  event.preventDefault();
  // var inputValue = $('#identifier2').val();
    
  //   var dataRetrieve = {
  //     "SearchTerm": inputValue
  //   };
  
      var x =  $('#identifier2').val();
      $.ajax({
      url: '../service/api.php/products/' +  x, //removed this
      type:'GET',
      contentType: 'application/x-www-form-urlencoded',
      data: $(this).serialize(),
      success: function(data, textStatus, jQxhr){
        console.log('data', JSON.parse(data));
        var data = JSON.parse(data);
        for(var i = 0; i < data.length; i++){
          if(data[i].name == x){
            $('#get_results2').text("NAME: " + data[i].name + "   DESCRIPTION: " + data[i].description + "   DATE: " + data[i].date
           + "   ID: " + data[i].id + "   URL: " + data[i].url);
          };
        }
      },
      error: function(jqXhr, textStatus, errorThrown){
        console.log( errorThrown );
         }
     });
     });
 });


//This is the update method by Name

//Source: https://stackoverflow.com/questions/13056810/how-to-implement-a-put-call-with-json-data-using-ajax-and-jquery

$(document).ready(function() {
    $("#upbtn1").click(function(event){
      var id = $('#IDset1').val();
$.ajax({
    url: '../service/api.php/products/' + id,
    type : "PUT",
    contentType : 'application/json',
    headers: {"X-HTTP-Method-Override": "PUT"},
    data : JSON.stringify( { "name": $('#IDname').val() } ),
    success : function(result) {
        // product was created, go back to products list
         $('#response pre').html( JSON.stringify( data ) );
    },
    error: function(xhr, resp, text) {
        // show error to console
        console.log(xhr, resp, text);
        }
        });
         });
     });



//This is the update method by URL

//Source: https://stackoverflow.com/questions/13056810/how-to-implement-a-put-call-with-json-data-using-ajax-and-jquery

$(document).ready(function() {
    $("#upbtn3").click(function(event){
      var id = $('#IDset3').val();
$.ajax({
    url: '../service/api.php/products/' + id,
    type : "PUT",
    contentType : 'application/json',
    headers: {"X-HTTP-Method-Override": "PUT"},
    data : JSON.stringify( { "url": $('#IDurl').val() } ),
    success : function(result) {
        // product was created, go back to products list
         $('#response pre').html( JSON.stringify( data ) );
    },
    error: function(xhr, resp, text) {
        // show error to console
        console.log(xhr, resp, text);
        }
        });
         });
     });

//This is the update method by Description

//Source: https://stackoverflow.com/questions/13056810/how-to-implement-a-put-call-with-json-data-using-ajax-and-jquery

$(document).ready(function() {
    $("#upbtn2").click(function(event){
      var id = $('#IDset2').val();
$.ajax({
    url: '../service/api.php/products/' + id,
    type : "PUT",
    contentType : 'application/json',
    headers: {"X-HTTP-Method-Override": "PUT"},
    data : JSON.stringify( { "description": $('#IDdesc').val() } ),
    success : function(result) {
        // product was created, go back to products list
         $('#response pre').html( JSON.stringify( data ) );
    },
    error: function(xhr, resp, text) {
        // show error to console
        console.log(xhr, resp, text);
        }
        });
         });
     });
// This is delete method

$(document).ready(function(){
  $("#delbtn").click(function(event){
     var id = $('#IDdelete').val();
    //console.log('id' + id);
    event.preventDefault();
    $.ajax({
      url: '../service/api.php/products/' + id,
      //dataType: 'json',
      type: 'DELETE',
      data: $(this).serialize(),
          success: function(data, textStatus, jQxhr){
            $("#delbtn_results").html(data);
      },
      error: function(jqXhr, textStatus, errorThrown){
        console.log( errorThrown );
      }
    });

    });

 });

