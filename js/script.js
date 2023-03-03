function validate() {
    let sid = document.getElementById("stud_id").value;
    let sname = document.getElementById("stud_name").value;
    let nregx = /^[a-z A-Z]{2,15}$/;
    let course = document.getElementById("course").value;
    let cregx = /^[a-z A-Z]{2,15}$/;
    if (sid == "") {
        alert("Student id is mandatory!");
        return false;
    } else if (sname == "") {
        alert("Name cannot be empty!");
        return false;
    } else if (!nregx.test(sname)) {
        alert("Name must only contain letters and atleast two characters");
        return false;
    } else if (course == "") {
        alert("Course field cannot be empty!");
        return false;
    } else if (!cregx.test(course)) {
        alert("Course name must only contain letters with a minimum of 2!");
        return false;
    } else {
        return true;
    }
}
