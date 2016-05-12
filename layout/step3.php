<h2>Complete booking - Stage 3 of 4 - Review Details</h2>

<div class="progress">
      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="75%" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
          <p style = "color:white">75%</p>
      </div>
</div>

<div class = "row">
    <div class = "col-md-6">
        <div class="panel panel-default">
            <div class="panel-body" style="padding-top: 0">
                <div class="page-header" style="margin-top:7px; margin-bottom: 7px">
                <h4 class="text-center">Booked flights</h4>
                </div>
                <div class = "page-body" id = "bookingsTable">Loading bookings...</div>
            </div>
        </div>
    </div>
    <div class = "col-md-6">
        <div class="panel panel-default">
            <div class="panel-body" style="padding-top: 0">
                <div class="page-header" style="margin-top:7px; margin-bottom: 7px">
                <h4 class="text-center">Contact information</h4>
                </div>
                <div id = "details">Loading contact information...</div>
                <div id = "payment">Loading payment...</div>
            </div>
        </div>
    </div>
</div>

<button class = "btn btn-primary" id = "toStep2nr2" onclick="show('step2nr2')">Stage 2 - Payment details</button>


<a href = "<?php echo $rootPath; ?>PHP/mail.php"><button class = "btn btn-primary" id = "toStep4" onclick="show('step4')">Stage 4 - Confirmation</button></a>