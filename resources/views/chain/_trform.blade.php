<form method="post" action="/chain/add" class="form-group small" enctype="multipart/form-data">
    <label for="name">Name</label><input type="text" class="form-control form-control-sm" name="name"
                                         id="name">
    <label for="amount">Amount</label><input type="number" class="form-control form-control-sm"
                                             name="amount" id="amount" step="0.01" min="0" max="100000">
    <label for="currency">Currency</label>
    <select class="custom-select form-control form-control-sm" name="currency" id="currency">
        <option>RUB</option>
        <option>USD</option>
        <option>EUR</option>
        <option>CNY</option>
    </select>
    <label for="memo">Memo</label><input type="text" class="form-control  form-control-sm" name="memo" id="memo"><br>
    <input type="submit" class="btn btn-primary btn-sm" style="cursor: pointer" value="Add">
</form>