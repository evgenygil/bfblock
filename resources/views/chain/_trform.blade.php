<form method="post" action="/chain/add" class="form-group small" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-2">
            <label for="name">Name</label><input type="text" class="form-control form-control-sm" name="name" id="name">
        </div>
        <div class="col-sm-2">
            <label for="amount">Amount</label><input type="number" class="form-control form-control-sm" name="amount"
                                                     id="amount" step="0.01" min="0" max="100000">
        </div>
        <div class="col-sm-2">
            <label for="currency">Currency</label>
            <select class="custom-select form-control form-control-sm" name="currency" id="currency">
                <option>RUB</option>
                <option>USD</option>
                <option>EUR</option>
                <option>CNY</option>
            </select>
        </div>
        <div class="col-sm-5">
            <label for="memo">Memo</label><input type="text" class="form-control form-control-sm" name="memo" id="memo">
        </div>
        <div class="col-sm-1">
            <label>&nbsp;</label><input type="submit" class="btn btn-outline-info btn-sm glyphicon" style="cursor: pointer" value="Add +">
        </div>
    </div>
</form>