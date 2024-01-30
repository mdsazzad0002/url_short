<!-- 
System Requirements

--Translate script
--Js cdn
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

--HTML Elements
<div class="nav-link" style="height: 40px;overflow: hidden;" id="google_translate_element"></div>

 -->


<?php 	
	if (!defined('main')) {
		 echo "<script>window.location.href='/index.php'</script>";
	 	exit();
	 } ;
?>



<style type="text/css">
          #google_translate_element select{
            border-radius: 10px;
            border: none;
            outline: none;
          }
          .skiptranslate iframe{
            display: none;

          }
          #google_translate_element span{
          	display: none;
          }

</style>

<div class="nav-link" style="height: 30px;overflow: hidden;" id="google_translate_element"></div>

<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
	  function googleTranslateElementInit() {
	    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
	  }
	  
	  setInterval(function(){
        document.querySelector('body').style.top='0';
      },3000) 
</script>