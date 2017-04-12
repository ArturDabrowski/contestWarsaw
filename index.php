<?php
    require_once 'config/Config.php';
    require_once 'config/Switch.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title;?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
        require_once "page/{$page}.php";
    ?> 
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script>
    $('body').scrollspy({
        target: ".navbar",
        offset: 100
    });
    $("nav li a").on('click', function(event) {
        var margin = $(this).data('margin') || 0;
        var address = $(this).attr('href');
        if (!address) return;
        event.preventDefault();
        $('html, body').animate({
            scrollTop: $(address).offset().top - margin
        }, 800);
    });
</script>

<script>
    
$(function() {
    $('#Question2').hide();
//    $('#Question3').hide();
//    $('#Question4').hide();
    $('#Question').change(function() {
        if ($(this).is(":selected")) {
            $('#Question2').hide();
        } else {
            $('#Question2').show();
        }
    })

    
});
   </script>

</html>