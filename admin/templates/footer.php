<footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="#">JuanBm</a>.</strong> All rights
    reserved.
  </footer>
 
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
 
<!-- jQuery -->
<script src="/proyecto-curso/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/proyecto-curso/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/proyecto-curso/admin/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/proyecto-curso/admin/js/demo.js"></script>
<!-- Sweet Alert -->
<script src="/proyecto-curso/admin/js/sweetalert2.min.js"></script>

<!-- Modelos -->
<script src="/proyecto-curso/admin/js/admin_ajax.js"></script>
<script src="/proyecto-curso/admin/js/eventos_ajax.js"></script>

<!-- DataTables  & Plugins -->
<script src="/proyecto-curso/admin/js/jquery.dataTables.min.js"></script>
<script src="/proyecto-curso/admin/js/dataTables.bootstrap4.min.js"></script>
<script src="/proyecto-curso/admin/js/dataTables.responsive.min.js"></script>
<script src="/proyecto-curso/admin/js/responsive.bootstrap4.min.js"></script>
<script src="/proyecto-curso/admin/js/dataTables.buttons.min.js"></script>
<script src="/proyecto-curso/admin/js/buttons.bootstrap4.min.js"></script>
<!-- Fechas -->
<script src="/proyecto-curso/admin/js/moment.min.js"></script>
<script src="/proyecto-curso/admin/js/jquery.inputmask.min.js"></script>

<!-- date-range-picker -->
<script src="/proyecto-curso/admin/js/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="/proyecto-curso/admin/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/proyecto-curso/admin/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Select2 -->
<script src="/proyecto-curso/admin/js/select2.full.min.js"></script>

<!-- Icon picker -->
<script src="/proyecto-curso/admin/js/fontawesome-iconpicker.min.js"></script>

<!-- bs-custom-file-input -->
<script src="/proyecto-curso/admin/js/bs-custom-file-input.min.js"></script>

<script src="/proyecto-curso/js/cotizador.js"></script>

<!-- ChartJS -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script>

$(document).ready(function(){
  $("#lista_admin").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "paging" : true, "ordering" : true, "info": true, 
      "language" :{
        paginate : {
          next: 'Siguiente',
          previous: 'Anterior',
          last : 'Último',
          first: 'Primero'
        },
        info : 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
        emptyTable: 'No hay registros',
        infoEmpty: '0 Registros',
        search : 'Buscar'
      }
      
    });

    $('#fecha').datetimepicker({
        locale: 'es',
        format: 'YYYY-MM-DD'
    });

    $('#time').datetimepicker({
      format: 'LT'
    });

    $('#icono').iconpicker();

    bsCustomFileInput.init();

   // GRAFICAS -----------------------------------------------


  
  });

 

</script>
</body>
</html>