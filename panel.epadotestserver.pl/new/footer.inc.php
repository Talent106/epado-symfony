        <!-- ============================================================== -->
		<!-- 						Content End		 						-->
		<!-- ============================================================== -->

		
        <!-- Common Plugins -->
        <script src="assets/lib/jquery/dist/jquery.min.js"></script>
		<script src="assets/lib/bootstrap/js/popper.min.js"></script>
        <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/lib/pace/pace.min.js"></script>
        <script src="assets/lib/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
        <script src="assets/lib/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/lib/nano-scroll/jquery.nanoscroller.min.js"></script>
        <script src="assets/lib/metisMenu/metisMenu.min.js"></script>
        <script src="assets/js/custom.js"></script>
			
        <!--Chart Script-->
        <script src="assets/lib/chartjs/chart.min.js"></script>
		<script src="assets/lib/chartjs/chartjs-sass.js"></script>

		<!--Vetor Map Script-->
		<script src="assets/lib/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="assets/lib/vectormap/jquery-jvectormap-us-aea-en.js"></script>
		
		<!-- Chart C3 -->
        <script src="assets/lib/chart-c3/d3.min.js"></script>
        <script src="assets/lib/chart-c3/c3.min.js"></script>
	
        <!-- Datatables-->
        <script src="assets/lib/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/lib/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/lib/toast/jquery.toast.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
		
		
		
		
		
      <!-- Datatables-->
		<script src="assets/lib/datatables/dataTables.buttons.min.js"></script>
		<script src="assets/lib/datatables/jszip.min.js"></script>
		<script src="assets/lib/datatables/pdfmake.min.js"></script>
		<script src="assets/lib/datatables/vfs_fonts.js"></script>
		<script src="assets/lib/datatables/buttons.html5.min.js"></script>
 
	  <!-- DataTimePicker -->
        <script type="text/javascript" src="assets/lib/bootstrap-daterangepicker/moment.js"></script>
		<script type="text/javascript" src="assets/lib/bootstrap-daterangepicker/daterangepicker.js"></script>


		<script type="text/javascript" src="assets/js/jquery-editable-select.js"></script>





	
		
		<script>
		try {
			//koszty			
			$( document ).ready(function() {
				filterKoszty();
			});		
			
			$("#searchFilter").click(function(){
				filterKoszty();
			});
			
			
			function filterKoszty(){			
				var search = $("#search").val();
				var from   = $("#from").val();
				var to     = $("#to").val();
				
			  $.ajax({url: "ajax/filterKoszty.php?id=<?echo $_GET['open'];?>&search="+search+"&from="+from+"&to="+to+"", success: function(result){
				$("#kosztyFilter").html(result);
			  }});			
			}
			
			
			//naprawy			
			$( document ).ready(function() {
				filterNaprawy();
			});		
			
			$("#NsearchFilter").click(function(){
				filterNaprawy();
			});
			
			
			function filterNaprawy(){			
				var search = $("#Nsearch").val();
				var from   = $("#Nfrom").val();
				var to     = $("#Nto").val();
				
			  $.ajax({url: "ajax/filterNaprawy.php?id=<?echo $_GET['open'];?>&search="+search+"&from="+from+"&to="+to+"", success: function(result){
				$("#naprawyFilter").html(result);
			  }});			
			}	
		

			$("#UsearchFilter").click(function(){
				filterUsterki();
			});		
			
			function filterUsterki(){			
				var from   = $("#Ufrom").val();
				var to     = $("#Uto").val();
				
			  $.ajax({url: "ajax/filterUsterki.php?id=<?echo $_GET['open'];?>&from="+from+"&to="+to+"", success: function(result){
				$("#usterki_content").html(result);
			  }});			
			}				


			function showNaprawy(){				
			  $.ajax({url: "ajax/filterNaprawy.php?id=<?echo $_GET['open'];?>&search=all", success: function(result){
				$("#naprawyFilter").html(result);
			  }});					
			}
			
			
			$("#searchAll").click(function(){
				showNaprawy();
			});			
			
			
			
			
			
$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});			
			
		} catch(err){
			console.log('Blad tworzenia pola z data: '+ err);
		}		
		
		
		function validate(form) {
				return confirm('Czy jesteś pewien?');
		}	



		function copyToClipboard(txt) {
		  var $temp = $("<input>");
		  $("body").append($temp);
		  $temp.val(txt).select();
		  document.execCommand("copy");
		  $temp.remove();
		  alert('Skopiowano obiekt logistyczny');
		}
		
		
		
		function copySelected(){
			
			var checked = "";
			var i = 0;
			$("input[name='dane[]']:checked").each(function ()
			{
				checked += $(this).val() + ', ';
				i++;
			});		

			  var $temp = $("<input>");
			  $("body").append($temp);
			  $temp.val(checked).select();
			  document.execCommand("copy");
			  $temp.remove();	

			  alert('Skopiowano '+ i +' obiektów');
			
		}
		
	
		  $("#printServices").click(function(){
		  // Before printing show all the tab panel contents
		  $('#repairs_list').show();
		  // Print the page
		  var divToPrint=document.getElementById('repairs_list');

		  var newWin=window.open('','Print-Window');

		  newWin.document.open();

		  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

		  newWin.document.close();

		  setTimeout(function(){newWin.close();},10);
		  // After printing hide back all the tab panel contents which are supposed to be hidden
		  $('#repairs_list').hide();
		  });			


		
		
<?if($show_all_repairs == 'yes'){?>		
		
			showNaprawy();
<?}?>		





			document.getElementById('data_badania_check').onchange = function() {
				document.getElementById('data_badania').disabled = !this.checked;
			};
			
			document.getElementById('data_legalizacji_tacho_check').onchange = function() {
				document.getElementById('data_legalizacji_tacho').disabled = !this.checked;
			};
			
			document.getElementById('data_odczytu_tacho_check').onchange = function() {
				document.getElementById('data_odczytu_tacho').disabled = !this.checked;
			};
			
			document.getElementById('data_ubezpieczenia_check').onchange = function() {
				document.getElementById('data_ubezpieczenia').disabled = !this.checked;
			};
			
			document.getElementById('dozor_check').onchange = function() {
				document.getElementById('dozor').disabled = !this.checked;
			};




			
		</script>		
		
		
		
    </body>
</html>