 <!-- Footer -->
    <!-- Scripts -->
    <!-- Jquery minified -->
    <script src="https://daniellebn.mtacloud.co.il/asset/jquery/dist/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/67ecd43417.js"></script>
    <!-- bootstrap JS minified -->
    <script src="https://daniellebn.mtacloud.co.il/asset/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- datatables js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js" integrity="sha256-yUWanhHkxj+3ow0qZE6AtzP8lZkwLvPagULL6PnZMz0=" crossorigin="anonymous"></script>
    <!-- Sweet alert 2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js" integrity="sha256-7OUNnq6tbF4510dkZHCRccvQfRlV3lPpBTJEljINxao=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha256-Y1rRlwTzT5K5hhCBfAFWABD4cU13QGuRN6P5apfWzVs=" crossorigin="anonymous"></script>
    <!-- Main Javascript File -->
    <script src="asset/js/main.js"></script>
    <!-- Scripts End -->
<script>
// $(document).ready(function() {
//     setInterval(timestamp_2, 1000);
// });

function timestamp_2() {
    $.ajax({
        url: '../../timestamp.php',
        success: function(data) {
            $('#timestamp_2').html(data);
        },
    });
}
</script>
    <!-- Footer End -->

    </div>
 <!-- wrapper end -->

</body>

</html>
