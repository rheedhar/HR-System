/*var changeStatus = document.querySelectorAll('.changeStatus');

  for(var i=0; i < changeStatus.length; i++){
      changeStatus[i].addEventListener('click', function(){
          var staff_id = this.getAttribute('data-staff-id');
          
         var active = this.parentElement.parentElement.querySelector('span.active');
         
            if(active.innerText=='active'){
                active.innerText='inactive';
            } else {
                active.innerText='active';
            }
      })
  }

*/

var changeStatus = document.querySelectorAll('.changeStatus');

  for(var i=0; i < changeStatus.length; i++){

      changeStatus[i].addEventListener('click', function(){

          var staff_id = this.getAttribute('data-staff-id');

          

         var active = this.parentElement.parentElement.querySelector('span.active');

         var user = this.parentElement.parentElement.querySelector('span.user').innerText;

         

            if(active.innerText=='active'){

                var data = active.innerText='inactive';

                $.ajax({

                    url: 'message.php',

                    type: 'post',

                    data: {data:data, staff:staff_id },

                    success: function(response){

                        console.log(response);

                    }

                });



            } else {

                var data = active.innerText='active';

                $.ajax({

                    url: 'message.php',

                    type: 'post',

                    data: {data:data, staff:staff_id },

                    success: function(response){

                        console.log(response);

                    }

                });



            

            }

      })

  }

  $(document).ready(function(){

      var dom = document.getElementsByTagName("tr");

   for(i=1; i<dom.length; i++){

       if(dom[i].cells[6].innerText=="inactive"){

           dom[i].cells[7].firstElementChild.setAttribute("checked", "checked");

       }

   }

  });

   