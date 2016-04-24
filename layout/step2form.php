<h2>Complete booking - stage 2 of 4 - Payment details</h2>

<p id = "firstNameP">First Name</p>
<p id = "lastNameP">Last Name</p>

<div class="progress">
      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
          <p style = "color:white">50%</p>
      </div>
</div>


<form id = "step2Form">
            <div class = "form-group">
                <label for="cardType" id = "cardTypeL" class = "required" >Payment type: </label>
                <select class = "form-control" name = "cardType" id = "cardType">
                    <option value = "visa">
                    Visa
                    </option>
                    <option value = "diners">
                    Diners
                    </option>
                    <option value = "masterCard">
                    Master Card
                    </option>
                    <option value = "amex">
                    Amex
                    </option>
                </select>
            </div>
            <div class = "form-group">
                <label for="number" id = "number" class = "required">Card number: </label>
                <input type = "text" class = "form-control" name = "number" id = "number">
            </div>
            <div class = "form-group" class = "required">
                <label for="name" id = "name" class = "required">Name on card: </label>
                <input type = "text" class = "form-control" name = "name" id = "name">
            </div>
            <div class = "form-group" class = "required">
                <label for="expMonth" id = "expMonthL" class = "required">Exp month: </label>
                <input type = "text" class = "form-control" name = "expMonth" id = "expMonth">
            </div>
            <div class = "form-group" class = "required">
                <label for="expYear" id = "expYearL" class = "required">Exp year: </label>
                <input type = "text" class = "form-control" name = "expYear" id = "expYear">
            </div>
            <div class = "form-group" class = "required">
                <label for="secCode" id = "secCodeL" class = "required">Security code: </label>
                <input type = "text" class = "form-control" name = "secCode" id = "secCode">
            </div>
    
    
</form>

<button class = "btn btn-primary" id = "toStep1" onclick="show('step1')">Stage 1 - Personal details</button>

<button class = "btn btn-primary" id = "toStep3" onclick="show('step3')">Stage 3 - Review Bookings and Details</button>