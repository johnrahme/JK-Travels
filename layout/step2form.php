<h2>Complete booking - stage 2 of 4 - Payment details</h2>



<div class="progress">
      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
          <p style = "color:white">50%</p>
      </div>
</div>

<div class = "row">
    <div class = "col-md-6">
    <!-- Step 2 form-->
    <form id = "step2Form">
            <div class = "form-group">
                <label for="cardType" id = "cardTypeL" class = "required control-label" >Payment type: </label>
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
                <label for="number" id = "numberL" class = "required control-label">Card number: </label>
                <input type = "text" class = "form-control" name = "number" id = "number">
            </div>
            <div class = "form-group">
                <label for="name" id = "nameL" class = "required control-label">Name on card: </label>
                <input type = "text" class = "form-control" name = "name" id = "name">
            </div>
            <div class = "form-group">
                <label for="expMonth" id = "expMonthL" class = "required control-label">Exp month: </label>                
                <select name = "expMonth" id = "expMonth" title="select a month" class = "form-control">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                </select>
            </div>
            <div class = "form-group">
                <label for="expYear" id = "expYearL" class = "required control-label">Exp year: </label>
                <select name = "expYear" id = "expYear" title="select a year" class = "form-control">
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>  
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                </select>
            </div>
            <div class = "form-group">
                <label for="secCode" id = "secCodeL" class = "required control-label">Security code: </label>
                <input type = "tel" class = "form-control" name = "secCode" id = "secCode">
            </div>
    
    
        </form>
    </div>
    <div class = "col-md-6">
        <div class="panel panel-default">
            <div class="panel-body" style="padding-top: 0">
                <div class="page-header" style="margin-top:7px; margin-bottom: 7px">
                <h4 class="text-center">Booking details</h4>
                </div>
                <div id = "firstNameP">Loading contact information...</div>
            </div>
        </div>
    </div>
</div>

<button class = "btn btn-primary" id = "toStep1" onclick="show('step1')">Stage 1 - Personal details</button>

<button class = "btn btn-primary" id = "toStep3" onclick="show('step3')">Stage 3 - Review Bookings and Details</button>