<!DOCTYPE html>
<html>

<head>
    <title>
        operation
    </title>
    <link rel="stylesheet" href="{{ url('stylesSadm.css') }}" />
</head>

<body>
    <table>
        <tr>
            <td>
                <form onsubmit="event.preventDefault();onFormSubmit();" autocomplete="off">
                    <div>
                        <label>Admin*</label><label class="validation-error hide" id="fullNameValidationError">This field is required.</label>
                        <input type="text" name="admin" id="admin">
                    </div>
                    <div>
                        <label>Continent</label>
                        <input type="text" name="continent" id="continent">
                    </div>
                    <div>
                        <label>Country</label>
                        <input type="text" name="country" id="country">
                    </div>
                    <div>
                        <label>Contribution</label>
                        <input type="text" name="contribution" id="contribution">
                    </div>
                    <div  class="form-action-buttons">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </td>
            <td>
                <table class="list" id="List">
                    <thead>
                        <tr>
                            <th>Admin</th>
                            <th>Continent/th>
                            <th>Country</th>
                            <th>Contribution</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </td>
        </tr>
    </table>
    <script src="scriptSadm.js"></script>
</body>

</html>