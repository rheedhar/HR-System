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
   