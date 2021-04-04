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
    formData["immigrant"] = document.getElementById("immigrant").value;
    formData["places_to_visit"] = document.getElementById("places_to_visit").value;
    formData["schools"] = document.getElementById("schools").value;
    formData["hospitals"] = document.getElementById("hospitals").value;
    return formData;
}

function insertNewRecord(data) {
    var table = document.getElementById("List").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.length);
    cell1 = newRow.insertCell(0);
    cell1.innerHTML = data.immigrant;
    cell2 = newRow.insertCell(1);
    cell2.innerHTML = data.places_to_visit;
    cell3 = newRow.insertCell(2);
    cell3.innerHTML = data.schools;
    cell4 = newRow.insertCell(3);
    cell4.innerHTML = data.hospitals;
    cell4 = newRow.insertCell(4);
    cell4.innerHTML = `<a onClick="onEdit(this)">Edit</a>
                       <a onClick="onDelete(this)">Delete</a>`;
}

function resetForm() {
    document.getElementById("immigrant").value = "";
    document.getElementById("places_to_visit").value = "";
    document.getElementById("schools").value = "";
    document.getElementById("hospitals").value = "";
    selectedRow = null;
}

function onEdit(td) {
    selectedRow = td.parentElement.parentElement;
    document.getElementById("immigrant").value = selectedRow.cells[0].innerHTML;
    document.getElementById("places_to_visit").value = selectedRow.cells[1].innerHTML;
    document.getElementById("schools").value = selectedRow.cells[2].innerHTML;
    document.getElementById("hospitals").value = selectedRow.cells[3].innerHTML;
}
function updateRecord(formData) {
    selectedRow.cells[0].innerHTML = formData.immigrant;
    selectedRow.cells[1].innerHTML = formData.places_to_visit;
    selectedRow.cells[2].innerHTML = formData.schools;
    selectedRow.cells[3].innerHTML = formData.hospitals;
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