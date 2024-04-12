
      </div>
      <!-- End of Main Content -->

        <!-- Footer -->
		<footer class="sticky-footer bg-white">
		<div class="container my-auto">
		  <div class="copyright text-center my-auto">
		    <span>Copyright &copy; Chemicea 2023 - <?php echo date('Y'); ?></span>
		  </div>
		</div>
		</footer>
		<!-- End of Footer -->



    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

    


      <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
<?php if ($_SESSION['user_id'] != 0) { ?>          
          <a class="btn btn-primary" href="<?php echo base_url('login/logout'); ?>">Logout</a>
<?php } ?>          
        </div>
      </div>
    </div>
  </div>




  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/vendor/fontawesome-free/js/sb-admin-2.min.js'); ?>"></script>

    <!-- Page level plugins -->
<!--   <script src="vendor/chart.js/Chart.min.js"></script> -->

  <!-- Page level custom scripts -->
<!--   <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
 -->


  <!-- Page level custom scripts -->
<script src="<?php echo base_url('assets/vendor/fontawesome-free/js/demo/datatables-demo.js'); ?>"></script>

<?php /*
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
*/ ?>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>


<!-- TinyMCE Editor -->
<script src="<?php echo base_url(); ?>resources/tinymce/tinymce.min.js"></script>

<style type="text/css">
  thead input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
  #id_cname {font-size:18px;font-weight: bold;color:red;}
  #error_note {color: red;}
</style>

<script>

  $('#filename').change(function() {
  $('#filename').css("color", "red");
}); 

// Send Notification Country 
$("#selectAll").click(function() {
    $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
});

$("input[type=checkbox]").click(function() {
    if (!$(this).prop("checked")) {
        $("#selectAll").prop("checked", false);
    }
});

			tinymce.init({ 
				selector:'.editor',
				theme: 'modern',
				height: 200,
        plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fontselect fontsizeselect",

			});

      

		</script>



</body>

</html>
