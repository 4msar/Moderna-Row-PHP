<!-- Essential javascripts for application to work-->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="assets/js/plugins/pace.min.js"></script>
    <!-- TinyMce  -->
    <script type="text/javascript" src="assets/js/plugins/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '.editor',
            height: 350,
            menubar: false,
            plugins: [
            'advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code help wordcount'
            ],
            toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
        });
    </script>
	<!-- Essential javascripts for application to work-->
    <script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/fontawesome-iconpicker.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript">
        // Data Table 
        $('.dataTable').DataTable();
        // FA Icon Picker
        $('.icon-pick').iconpicker();
        
    </script>
    
  </body>
</html>