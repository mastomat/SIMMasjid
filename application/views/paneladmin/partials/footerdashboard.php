<?php require_once('footer.php') ?>

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
</div>

<script src="<?php echo base_url() ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->

<script src="<?php echo base_url() ?>assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)

</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- overlayScrollbars -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js">
</script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/adminlte/js/adminlte.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js">
</script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
</script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/toastr/toastr.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/chart.js/Chart.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/moment/moment.min.js"></script>

<?php
        foreach($grafikpemasukan as $data){
            $bulan[] = $data->bulan;
            $pemasukan[] =  $data->jumlahpemasukan;
        }

		foreach($grafikpengeluaran as $data){
            
            $pengeluaran[] =  $data->jumlahpengeluaran;
        }
?>

<script>
function PrayerTimesApi() {
    var userLang = navigator.language || navigator.userLanguage;
    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            if (request.status === 200) {
                var prayer_results = JSON.parse(request.responseText);
                console.log(JSON.stringify(prayer_results.results.location.local_offset));
                var prayer_date = new Date(prayer_results.results.datetime[0].date.gregorian);

                var local_offset = prayer_results.results.location.local_offset;
                document.getElementById("prayer_city").innerHTML = prayer_results.results.location.city;
                document.getElementById("prayer_date").innerHTML = prayer_date.toLocaleDateString(userLang, options);
                document.getElementById("Imsak").innerHTML = prayer_results.results.datetime[0].times.Imsak;
                document.getElementById("Fajr").innerHTML = prayer_results.results.datetime[0].times.Fajr;
                document.getElementById("Dhuhr").innerHTML = prayer_results.results.datetime[0].times.Dhuhr;
                document.getElementById("Asr").innerHTML = prayer_results.results.datetime[0].times.Asr;
                document.getElementById("Maghrib").innerHTML = prayer_results.results.datetime[0].times.Maghrib;
                document.getElementById("Isha").innerHTML = prayer_results.results.datetime[0].times.Isha;
                SetTheClock(local_offset);

            } else {
                console.log('An error occurred during your request: ' + request.status + ' ' + request.statusText);
            }
        }
    };
    request.open('Get', api_url, true);
    request.send();
}
function time(offset) {
    var location_date = new Date(new Date().getTime() + (offset * 60000));
    var hours = location_date.getUTCHours(),
        minutes = location_date.getUTCMinutes(),
        seconds = location_date.getUTCSeconds();
    hours = addZero(hours);
    minutes = addZero(minutes);
    seconds = addZero(seconds);
    document.getElementById("prayer_clock").innerHTML = hours + ':' + minutes + ':' + seconds;
}
function addZero(val) {
    return (val <= 9) ? ("0" + val) : val;
}
function SetTheClock(local_offset) {
    time(local_offset);
    setInterval(function () { time(local_offset); }, 1000);
}
	$(function () { 
		var areaChartData = {
      labels  : <?php echo json_encode($bulan);?> ,
      datasets: [
        {
          label               : 'Pemasukan',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : <?php echo json_encode($pemasukan);?>
        },
        {
          label               : 'Pengeluaran',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : <?php echo json_encode($pengeluaran);?>
        },
      ]
    }
	var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })


	 });
</script>




</body>

</html>