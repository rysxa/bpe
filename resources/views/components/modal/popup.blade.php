@if ($message = Session::get('success'))
    <!-- Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content justify-content-center">
                <div class="modal-header" style="border-bottom: none; display: flex;">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="margin-left: auto;"></button>
                </div>
                <div class="modal-body" style="border-bottom: none; text-align: center;">
                    <i class="fa fa-check-circle text-success" style="font-size: 80px;"></i>
                    <h5 id="successModalLabel">Success</h5>
                    <p>{{ $message }}</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('successModal'));
            myModal.show();
        });
    </script>
@endif
@if ($message = Session::get('error'))
    <!-- Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content justify-content-center">
                <div class="modal-header" style="border-bottom: none; display: flex;">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="margin-left: auto;"></button>
                </div>
                <div class="modal-body" style="border-bottom: none; text-align: center;">
                    <i class="fa fa-exclamation-circle text-danger" style="font-size: 80px;"></i>
                    <h5 id="errorModalLabel">Failed</h5>
                    <p>{{ $message }}</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('errorModal'));
            myModal.show();
        });
    </script>
@endif
@if ($message = Session::get('info'))
    <!-- Modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content justify-content-center">
                <div class="modal-header" style="border-bottom: none; display: flex;">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="margin-left: auto;"></button>
                </div>
                <div class="modal-body" style="border-bottom: none; text-align: center;">
                    <i class="fa  fa-info-circle text-info" style="font-size: 80px;"></i>
                    <h5 id="infoModalLabel">Info</h5>
                    <p>{{ $message }}</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('infoModal'));
            myModal.show();
        });
    </script>
@endif
