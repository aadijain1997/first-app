<?php 
include "../admin-header.php";
?>
<head>
<script>
function showUser(str) {
	if (str == "") {
	  document.getElementById("txtHint").innerHTML = "";
	  return;
	} else {
	  var xmlhttp = new XMLHttpRequest();
	  xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		  document.getElementById("txtHint").innerHTML = this.responseText;
		}
	  };
	  xmlhttp.open("GET","getuser.php?p="+str,true);
	  xmlhttp.send();
	}
  }
  
  
  function showResult(str) {
	if (str.length==0) {
	  document.getElementById("livesearch").innerHTML="";
	  document.getElementById("livesearch").style.border="0px";
	  return;
	}
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
	  if (this.readyState==4 && this.status==200) {
		document.getElementById("livesearch").innerHTML=this.responseText;
		document.getElementById("livesearch").style.border="1px solid #A5ACB2";
	  }
	}
	xmlhttp.open("GET","get_user.php?q="+str,true);
	xmlhttp.send();
  }
  $(document).ready(function(){
		  $('a[href^="http://"]').each(function(){ 
			  var oldUrl = $(this).attr("href"); // Get current url
			  var newUrl = oldUrl.replace("http://", "https://"); // Create new url
			  $(this).attr("href", newUrl); // Set herf value
		  });
    });
</script>
              <h1 class="info">Info about People</h1>
              <form>
                <select name="users" onchange="showUser(this.value)">
                  <option value="">Select a person:</option>
                  <option value="1">Aditya jain</option>
                  <option value="2">Ashish jain</option>
                  <option value="3">Sanjay jain</option>
                  <option value="4">Madhu jain</option>
                </select>
                  <br>
                  <div id="txtHint"></div>
              </form>

              <br>
              <h1 class="basic">Basic HTML Tags</h1>

              <form>
                  <input type="text" size="30" placeholder="write your tag u want to search" onkeyup="showResult(this.value)">
                  <div id="livesearch"></div>
              </form>

                      <!-- curl operation
                      <?php 
                    
                    // // From URL to get webpage contents. 
                    // $url = "https://www.youtube.com/"; 
                      
                    // // Initialize a CURL session. 
                    // $ch = curl_init();  
                      
                    // // Return Page contents. 
                    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                      
                    // //grab URL and pass it to the variable. 
                    // curl_setopt($ch, CURLOPT_URL, $url); 
                      
                    // $result = curl_exec($ch); 
                      
                    // echo $result;  
                      
                    ?>  


        </div>

        </div>
        </div>
  </section>


</body>
</html>



