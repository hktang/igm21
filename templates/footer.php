      <div class="footer">
        <p>&copy; 2015–2016 APN Secretariat</p>
      </div>

    </div> <!-- .container -->

	<?php 
		apn_enqueue_js('includes/jquery-1.11.2.min.js');
		apn_enqueue_js('includes/jqui/js/jquery-ui-1.10.3.custom.min.js'); 
		apn_enqueue_js('includes/bootstrap/js/bootstrap.min.js');
	?>
	<?php $ps_script ? print $ps_script : print '' ; ?>
  </body>
</html>