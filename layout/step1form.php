<h2>Complete booking - stage 1 of 4 - Personal details</h2>
<div class="progress">
      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
          <p style = "color:white">25%</p>
      </div>
</div>

<form id = "step1Form">
            <div class = "form-group">
                <label for="firstName" id = "firstNameL" class = "required control-label">Given name:</label>
                <input type = "text" class = "form-control" name = "firstName" id ="firstName">
            </div>
            <div class = "form-group">
                <label for="lastName" id = "lastNameL" class = "required control-label">Family name:</label>
                <input type = "text" class = "form-control" name = "lastName" id = "lastName">
            </div>
            <div class = "form-group">
                <label for="address1" id = "address1L" class = "required control-label">Address 1:</label>
                <input type = "text" class = "form-control" name = "address1" id = "address1">
            </div>
            <div class = "form-group">
                <label for="address2" id = "address2L" class = "control-label">Address 2:</label>
                <input type = "text" class = "form-control" name = "address2" id = "address2">
            </div>
            <div class = "form-group">
                <label for="suburb" id = "suburbL" class = "required control-label">Suburb: </label>
                <input type = "text" class = "form-control" name = "suburb" id = "suburb">
            </div>
            <div class = "form-group">
                <label for="state" id = "stateL" class = "control-label required">State: </label>
                <a href="#" id="position" class="popups" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="" data-content="State is optional when booking from outside Australia" data-original-title="State"><span class="glyphicon glyphicon-question-sign" style="font-size: 1.0em"></span></a>
                <input type = "text" class = "form-control" name = "state" id = "state">
            </div>
            <div class = "form-group">
                <label for="country" id = "countryL" class = "required control-label" >Country: </label>
                <select class = "form-control" name = "country" id = "country">
                    <option value = "australia">
                    Australia
                    </option>
                    <option value = "newZealand">
                    New Zealand
                    </option>
                    <option value = "us">
                    United States
                    </option>
                </select>
            </div>
            <div class = "form-group">
                <label class = "control-label required" for="postcode" id = "postcodeL">Postcode: </label>
                <a href="#" id="position" class="popups" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="" data-content="Postcode is optional when booking from outside Australia" data-original-title="Postcode"><span class="glyphicon glyphicon-question-sign" style="font-size: 1.0em"></span></a>

                <input type = "text" class = "form-control" name = "postcode" id = "postcode">
            </div>
            <div class = "form-group">
                <label for="email" id = "emailL" class = "required control-label">Email address: </label>
                <input type = "text" class = "form-control" name = "email" id = "email">
            </div>
            <div class = "form-group">
                <label class = "control-label" for="mobileP" id = "mobilePL">Mobile phone: </label>
                <input type = "text" class = "form-control" name = "mobileP" id = "mobileP">
            </div>
            <div class = "form-group">
                <label class = "control-label" for="businessP" >Business phone: </label>
                <input type = "text" class = "form-control" name = "businessP" id = "businessP">
            </div>
            <div class = "form-group">
                <label class = "control-label" for="workP">Work phone: </label>
                <input type = "text" class = "form-control" name = "workP" id = "workP">
            </div>
</form>

<button class = "btn btn-primary" id = "toBookings" onclick="show('bookings')">Bookings</button>

<button class = "btn btn-primary" id = "toStep2" onclick="show('step2')">Stage 2 - Payment Details</button>