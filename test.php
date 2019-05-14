<div id="gradebook"></div>
<script src='jquery.min.js'></script>
<script>
$(document).ready(function(){
        $.ajax({
            url: 'gradebook.php',
            type: 'post',
            dataType: 'json',
            success:function(response){
                for(key in response) {
                document.getElementById("gradebook").innerHTML += key.Student;
                }
                }
            }
        });
    });

	</script>
