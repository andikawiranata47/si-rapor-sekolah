<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<footer class="footer">
    <div class="footer-inner-wraper">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block  text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020 <br> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
            <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> </span> -->
        </div>
    </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?php echo base_url(); ?>/assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?php echo base_url(); ?>/assets/vendors/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?php echo base_url(); ?>/assets/js/off-canvas.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/hoverable-collapse.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="<?php echo base_url(); ?>/assets/js/dashboard.js"></script>
<!-- End custom js for this page -->

</body>

<form action="/login/logout" method="post">
    <?= csrf_field(); ?>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: #001737 !important;">Apakah anda yakin ingin keluar?</h5>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="nis" class="nis2">
                    <button type="submit" class="btn btn-success">Ya</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>
</form>

</html>