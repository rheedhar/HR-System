//gettingthe modal 

          var score = document.getElementById('scoremodal');

          var modal = document.getElementById('mymodal');

          

          //getting button that opens the modal

          var addscore = document.getElementById('addscore');

          var btn = document.getElementById('mybtn');

          

          var name = document.getElementById('main');

          

          //getting the close button

          var span = document.getElementsByClassName('close')[0];

          var scoreclose = document.getElementsByClassName('scoreclose')[0];

          

          // When the user clicks on the button, open the modal 

           addscore.onclick = function() {

            score.style.display = "block";

            }



        btn.onclick = function() {

          modal.style.display = "block";

          name.style.opacity = "0.5";

        }



          // When the user clicks on <span> (x), close the modal

        scoreclose.onclick = function(){

         score.style.display = "none";

}



        span.onclick = function() {

          modal.style.display = "none";

        }



            // When the user clicks anywhere outside of the modal, close it

        window.onclick = function(event) {

           if (event.target == modal) {

        modal.style.display = "none";

      }

      

   }



   var form = $('#calender');

   form.submit(function (e) {



        e.preventDefault();



        $.ajax({

            url: 'calender.php',

            type: 'post',

            data: form.serialize(),

            success: function (response) {

                alert(response);

                form.get(0).reset();

            },

           

        });

    });

   

   

   var selectDate = document.querySelector('#selectDate');

   selectDate.addEventListener('click', function(){

      var date = document.getElementById('selectDate').value;

      var username = $('input#username').val();

      

      $.ajax({

        url: 'day.php',

        type: 'post',

        data: {data:date, username:username },

        success: function(response){

            alert(response);

        }  

      });

  })

   

    