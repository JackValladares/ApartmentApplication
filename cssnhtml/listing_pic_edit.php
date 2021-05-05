<?php 
session_start();
require_once "../php/sqlFunctions.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Listing Pictures</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
</head>
<body>
<br /><br />  
    <div class="container" style="width:900px;">  
        <h3 align="center">Edit Your Listing Pictures</h3>  
        <br />
        <div align="right">
        <button type="button" name="add" id="add" class="btn btn-success">Add Image</button>
    </div>
    <br />
    <div id="image_data">

    </div>
    </div>  
</body>
</html>

<div id="imageModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Image</h4>
            </div>
            <div class="modal-body">
                <form id="image_form" method="post" enctype="multipart/form-data">
                    <p><label>Select Image</label>
                    <input type="file" name="image" id="image" /></p><br />
                    <input type="hidden" name="action" id="action" value="insert" />
                    <input type="hidden" name="image_id" id="image_id" />
                    <label for="listing_name">Listing Name</label>
                    <select name="listing_name" id="listing_name" form="image_form">
                    <?php
                    $conn = connectDB();
                    $userid = $_SESSION['user_id'];
                    $query = "SELECT listing_id FROM listing WHERE user_id = '$userid'";
                    $result = $conn->query($query);
                    while($row = $result->fetch_assoc())
                    {
                        unset($listing_id);
                        $id = $row['listing_id'];
                        echo '<option value="'.$id.'">'.$id.'</option>';
                    }
                    ?>
                    </select>
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    fetch_data();

    function fetch_data()
    {
        var action = "fetch";
        $.ajax({
            url:"listing_image_actions.php",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#image_data').html(data);
            }
        })
    }
    $('#add').click(function(){
        $('#imageModal').modal('show');
        $('#image_form')[0].reset();
        $('.modal-title').text("Add Image");
        $('#image_id').val('');
        $('#action').val('insert');
        $('#insert').val("Insert");
    });
    $('#image_form').submit(function(event){
        event.preventDefault();
        var image_name = $('#image').val();
        if(image_name == '')
        {
            alert("Please select an image.");
            return false;
        }
        else
        {
            var extension = $('#image').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['png', 'jpg', 'jpeg']) == -1)
            {
                alert("Invalid image file");
                $('#image').val('');
                return false;
            }
            else
            {
                $.ajax({
                    url:"listing_image_actions.php",
                    method:"POST",
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                        alert(data);
                        fetch_data();
                        $('#image_form')[0].reset();
                        $('#imageModal').modal('hide');
                    }
                });
            }
        }
    });
    $(document).on('click', '.delete', function(){
        var image_id = $(this).attr("id");
        var action = "delete";
        if(confirm("Are you sure you want to delete this image for your listing?"))
        {
            $.ajax({
                url:"listing_image_actions.php",
                method:"POST",
                data:{image_id:image_id, action:action},
                success:function(data)
                {
                    alert(data);
                    fetch_data();
                }
            })
        }
        else
        {
            return false;
        }
    });
});
</script>