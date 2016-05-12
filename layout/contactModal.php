<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id = "contactForm" method="POST" action="<?echo $baseDir.'/PHP/contactMail.php';?>" onsubmit="return validateContact()" accept-charset="UTF-8" class="form-horizontal"><input name="_token" type="hidden" value="E00UnFqWsW44LqqpeDs2YZ0yr7W41hizCHWqXeKZ">
          <div class="modal-header">
                <h3>Please send us an mail if you have any questions</h3>

            </div>
                        <div class="modal-body">
                <div class="form-group">

					<label for="contact-name" class="control-label col-lg-2" control-label="" >Name:</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="contact-name" name="contact-name" placeholder="Full name" value="">

						</div>

				</div>
				<div class="form-group">
					<label for="contact-email" class="control-label col-lg-2 required" control-label="">Email:</label>
						<div class="col-lg-10">
								<input type="email" class="form-control" id="contact-email" name="contact-email" placeholder="u@example.com">

						</div>

				</div>
                            
                <div class="form-group">
					<label for="contact-email" class="control-label col-lg-2 required" control-label="">Subject:</label>
						<div class="col-lg-10">
								<input type="text" class="form-control" id="contact-subject" name="contact-subject" >

						</div>

				</div>

				<div class="form-group">
					<label for="contact-text" class="control-label col-lg-2 required" control-label="">Text: </label>
						<div class="col-lg-10">
							<textarea class="form-control" rows="7" id="contact-text" name="contact-text" style="resize:none"></textarea>

						</div>

				</div>

            </div>
                        <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-default">Close</a>
                <input class="btn btn-success" type="submit" value="Send">

            </div>
           </form>
    </div>
  </div>
</div>