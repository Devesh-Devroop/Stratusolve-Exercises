//ajax stuff
//ajax $.post method function

// syntax
//$.post(URL,data,callback)


// typically used in an event like button click
// good practice is to start your jquery with $(document).ready(function(){body of code}}
//NOTE: $.post is the exact same as
//$.ajax({type: "POST",url:"",data:requiredData,success:success})

//Example1 using test.html
/*'http://httpbin.org/post'*/
// $(document).ready(function(){
//     console.log("hello")
//     $("submit").click(function(){
//     $.post('http://httpbin.org/post',{
//     name: "David",
//     surname: "Smith"
//     },
//     function(data,status){
//         alert("Data: "+ data + "/nStatus: "+ status)
//     });
//     });
// });

// This is the $.post method.



// $(document).ready(function(){
    
//     $("#Button").on('click',function(e){ //$("#form=id of form").on('submit',function(e){etc.})
//         $.post('http://httpbin.org/post',{
//         name: "Jason",
//         surname: "Harry",
//         superheroAlias : "Cool Superhero name"
//         },
//         function(data,status){
            
//             document.getElementById('result').innerHTML=JSON.stringify(data);
//             console.log(JSON.stringify(data,null,4));
//         });
//         e.preventDefault();
//         e.stopPropagation();
//     });
// });



// This is the ajax version of the post method


// $(document).ready(function () {
//     $("form").submit(function (event) {
//       var formData = {
//         name: "Ted",
//         email: "Mark",
//         superheroAlias: "The Bat",
//       };
  
//       $.ajax({
//         type: "POST",
//         url: "http://httpbin.org/post",
//         data: formData,
//         dataType: "json",
//         encode: true,
//       }).done(function (data) {
//         document.getElementById('result').innerHTML=data;
//         console.log(data);
//       });
  
//       event.preventDefault();
//     });
//   });



// To use PUT and DELETE you need to use the ajax version ad change method accordingly 
// $(document).ready(function(){
    
//     $("#Button").on('click',function(e){ //$("#form=id of form").on('submit',function(e){etc.})
//         $.post('http://httpbin.org/post',{
//         name: document.getElementById('name').value,
//         surname: document.getElementById('surname').value,
//         // DOB : document.getElementById('dob'),
//         // email: document.getElementById('email'),
//         // age : document.getElementById('age')
//         },
//         function(data){
            
//             //document.getElementById('result').innerHTML=JSON.stringify(data);
//             console.log(JSON.stringify(data));
//         });
//         e.preventDefault();
//         e.stopPropagation();
//     });
// });

$(document).ready(function(){
    // $("#Button").on('click',function(e){ //$("#form=id of form").on('submit',function(e){etc.})
    //     e.preventDefault();
    //     e.stopPropagation();
    //     console.log(document.getElementById('name').value);
    //     console.log(document.getElementById('surname').value);
    //     console.log(document.getElementById('date').value);
    //     console.log(document.getElementById('email').value);
    //     console.log(document.getElementById('age').value);

    //     $.post('http://httpbin.org/post',{
    //     name: document.getElementById('name').value,
    //     surname: document.getElementById('surname').value,
    //     Date : document.getElementById('date').value,
    //     email: document.getElementById('email').value,
    //     age : document.getElementById('age').value
    //     },
    //     function(data){
            
    //         document.getElementById('result').innerHTML=JSON.stringify(data);
    //         console.log(JSON.stringify(data));
    //     });
    //     // e.preventDefault();
    //     // e.stopPropagation();
    // });
//});
///Create Button
    
    $("#create_person").on('click',function(e){ //$("#form=id of form").on('submit',function(e){etc.})
        e.preventDefault();
        e.stopPropagation();
        var create_var = "create boi";
        console.log(document.getElementById('name').value);
        console.log(document.getElementById('surname').value);
        console.log(document.getElementById('date').value);
        console.log(document.getElementById('email').value);
        console.log(document.getElementById('age').value);
        console.log(create_var);

        //'http://httpbin.org/post'
        $.post('Task7_initial.php',{
        create_var: create_var,    
        name: document.getElementById('name').value,
        surname: document.getElementById('surname').value,
        Date : document.getElementById('date').value,
        email: document.getElementById('email').value,
        age : document.getElementById('age').value
        },
        function(data){
            
            //document.getElementById('result').innerHTML=JSON.stringify(data);
            console.log(data);
        });
         e.preventDefault();
         e.stopPropagation();
    });
// });
//'http://httpbin.org/post'
//DELETE BUTTON
    $('.deletebutton').on('click',function(e){
        e.preventDefault();
        e.stopPropagation();
        var delete_var = "Delete brah"
        var val1 = $(this).val();
        console.log(val1)

        $.post('Task7_initial.php',{
            delete_var : delete_var,
            email : val1//document.getElementById('delete').value
        },
        function(data){
            console.log("Successfully deleted post");
        });  
    }); 

    /////////Update button
    $("#update_person").on('click',function(e){ //$("#form=id of form").on('submit',function(e){etc.})
        e.preventDefault();
        e.stopPropagation();
        var update_user = "Update user";
        console.log(document.getElementById('id').value);
        // console.log($("#name").change());
        // console.log($("#surname").change());
        // console.log($("#email").change());
        // console.log($("#date").change());
        // console.log($("#age").change());
        console.log(update_user);
        console.log(document.getElementById('name').value);
        console.log(document.getElementById('surname').value);
        console.log(document.getElementById('date').value);
        console.log(document.getElementById('email').value);
        console.log(document.getElementById('age').value);

        
        $.post(/*'http://httpbin.org/post'*/'Task7_initial.php',{ 
        update_user:update_user,    
        id : document.getElementById('id').value,//$("#id").val(),        
        name: document.getElementById('name').value,
        surname: document.getElementById('surname').value,
        Date : document.getElementById('date').value,
        email: document.getElementById('email').value,
        age : document.getElementById('age').value
        },
        function(data){
            
            //document.getElementById('result').innerHTML=JSON.stringify(data);
            console.log("Got data");
            console.log(data);
        });
         e.preventDefault();
         e.stopPropagation();
    });
});


/// YOU HAVE CREATE IN PHP SO FAR SO DELETE WON'T ACTUALLY DELETE RIGHT NOW, HOWEVER CREATE NOW WORKS AND DELETE SEPERATELY.
// POSSIBLE WAYS AROUND IS A SWITCH STATEMENT AND PASS SOME ACTION IN AJAX.


// on page load...