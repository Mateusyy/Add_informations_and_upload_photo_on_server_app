<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 24.09.2018
 * Time: 18:12
 */

?>

<h2>Strona główna</h2>
<br>


<div class="form-group">
    <form enctype="multipart/form-data" method="post" id="myForm" action="Home/setDB">
        <input name="imie" id="imie" placeholder="Imię" required><br>
        <input name="nazwisko" id="nazwisko" placeholder="Nazwisko" required><br>
        <br>
        <input id="file_to_upload" name="file_to_upload" type="file" class="form-control" accept="image/jpeg, image/png"/><br>

    </form>
</div>
<div class="form-group">
    <button onclick="submit()" class="btn btn-primary">Submit</button>
</div>
<br><br><br>
<a href="Home/displayData">Zobacz dane!</a>

<script>
    function submit(){
        uploadFile();
        ClearInputs();
    }

    function uploadFile()
    {
        if($("#file_to_upload").val() != "" && $("#imie").val() != "" && $("#nazwisko").val() != "")
        {
            var file_data = $('#file_to_upload').prop('files')[0];
            var myName = $('#imie').val();
            var myLastName = $('#nazwisko').val();
            var form_data = new FormData();

            form_data.append('file', file_data);
            form_data.append('firstName', myName);
            form_data.append('lastName', myLastName);


            $.ajax({
                url: 'Home/setDB',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(data) {
                    alert(data);
                }
            });
        }
        else{
            alert("Podaj wszystkie dane: imie, naziwsko oraz wybierz zdjęcie!");
        }
    }

    function ClearInputs(){
        $('#myForm :input').each(function(){
            $(this).val('');
        });
    }
</script>

