<h2>Complete booking - Stage 3 of 4 - Review Details</h2>

<p id = "details">Details</p>
<p id = "payment">Payment</p>

<div class="progress">
      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="75%" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
          <p style = "color:white">75%</p>
      </div>
</div>


<button class = "btn btn-primary" id = "toStep2nr2" onclick="show('step2nr2')">Stage 2 - Payment details</button>


<a href = "<?php echo $rootPath; ?>PHP/mail.php"><button class = "btn btn-primary" id = "toStep4" onclick="show('step4')">Stage 4 - Confirmation</button></a>