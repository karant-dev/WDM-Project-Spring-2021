var selectedRow = null

function onFormSubmit() {
    if (validate()) {
        var formData = readFormData();
        if (selectedRow == null)
            insertNewRecord(formData);
        else
            updateRecord(formData);
        resetForm();
    }
}

function readFormData() {
    var formData = {};
    formData["fullName"] = document.getElementById("admin").value;
    formData["empCode"] = document.getElementById("continent").value;
    formData["salary"] = document.getElementById("country").value;
    formData["city"] = document.getElementById("contribution").value;
    return formData;
}

function insertNewRecord(data) {
    var table = document.getElementById("employeeList").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.length);
    cell1 = newRow.insertCell(0);
    cell1.innerHTML = data.admin;
    cell2 = newRow.insertCell(1);
    cell2.innerHTML = data.continent;
    cell3 = newRow.insertCell(2);
    cell3.innerHTML = data.country;
    cell4 = newRow.insertCell(3);
    cell4.innerHTML = data.contribution;
    cell4 = newRow.insertCell(4);
    cell4.innerHTML = `<a onClick="onEdit(this)">Edit</a>
                       <a onClick="onDelete(this)">Delete</a>`;
}

function resetForm() {
    document.getElementById("admin").value = "";
    document.getElementById("continent").value = "";
    document.getElementById("country").value = "";
    document.getElementById("contribution").value = "";
    selectedRow = null;
}

function onEdit(td) {
    selectedRow = td.parentElement.parentElement;
    document.getElementById("admin").value = selectedRow.cells[0].innerHTML;
    document.getElementById("continent").value = selectedRow.cells[1].innerHTML;
    document.getElementById("country").value = selectedRow.cells[2].innerHTML;
    document.getElementById("contribution").value = selectedRow.cells[3].innerHTML;
}
function updateRecord(formData) {
    selectedRow.cells[0].innerHTML = formData.admin;
    selectedRow.cells[1].innerHTML = formData.continent;
    selectedRow.cells[2].innerHTML = formData.country;
    selectedRow.cells[3].innerHTML = formData.contribution;
}

function onDelete(td) {
    if (confirm('Are you sure to delete this record ?')) {
        row = td.parentElement.parentElement;
        document.getElementById("List").deleteRow(row.rowIndex);
        resetForm();
    }
}
function validate() {
    isValid = true;
    if (document.getElementById("fullName").value == "") {
        isValid = false;
        document.getElementById("fullNameValidationError").classList.remove("hide");
    } else {
        isValid = true;
        if (!document.getElementById("fullNameValidationError").classList.contains("hide"))
            document.getElementById("fullNameValidationError").classList.add("hide");
    }
    return isValid;
}