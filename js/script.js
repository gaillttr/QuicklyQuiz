function openForm() {
    document.getElementById("form").style.display = "block";
}
  
function closeForm() {
    document.getElementById("form").style.display = "none";
}

function openSubjectOption() {
  var x = document.getElementById("dropdown-content");
    if (x.style.display == "none") {
          x.style.display = "block";
    } else {
      x.style.display = "none";
    }
}

function displayProfile() {
  var x = document.getElementById("dropdown-content2");
    if (x.style.display == "none") {
          x.style.display = "block";
    } else {
      x.style.display = "none";
    }
}

function openForm2() {
  document.getElementById("form2").style.display = "block";
}

function closeForm2() {
  document.getElementById("form2").style.display = "none";
}