
(() => {
    'use strict'
  
    
    const forms = document.querySelectorAll('.needs-validation')
  
    
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated')
      }, false)
    })
  })()


  function getBloodId(){
    var aKeyValue = window.location.search.substring(1).split("&");
    var bloodId = aKeyValue[0].split("=")[1];
    return bloodId;
  }

  function showBloodType(data) {
    var selectedBloodId = getBloodId();
    var bloodType = "";
  
    for (var i = 0; i < data.bloodType.length; i++) {
      var bloodObj = data.bloodType[i];
  
      if (bloodObj.id == selectedBloodId) {
        bloodType = bloodObj.Type;
        break;
      }
    }
  
  //   let bloodTypeElements = document.querySelectorAll(".bloodType");
  //   let bloodIdElements = document.querySelectorAll(".bloodid");
  
  //   for (var i = 0; i < bloodTypeElements.length; i++) {
  //     bloodTypeElements[i].innerHTML = bloodType;
  //   }
  }
  
  // Make an AJAX request to fetch the blood type from the PHP file
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var data = JSON.parse(xhr.responseText);
      showBloodType(data);
    }
  };
  xhr.open('GET', 'bloodStock.php?blood_id=' + getBloodId(), true);
  xhr.send();


  fetch("data/bloodType.json")
  .then(response => response.json())
  .then(data => showBloodType(data));





const typeDropdown = document.getElementById('typeDropdown');


typeDropdown.addEventListener('change', function () {
    const selectedBloodType = typeDropdown.value;
    filterType(selectedBloodType);
});

function filterType(type) {
    const bloodtype = document.getElementsByClassName('types');
    for (let i = 0; i < bloodtype.length; i++) {
        const types = bloodtype[i];
        const BloodType = types.dataset.type;
        console.log('BloodType');
        if (type === '' || BloodType === type) {
            book.style.display = 'block';
        } else {
            book.style.display = 'none';
        }
    }
}


function enteredit(){

  let formElements = document.getElementsByClassName("editmode");

  for(let element of formElements) {
    element.removeAttribute("disabled");
  }
}

function exitedit(){
 
  let formElements = document.getElementsByClassName("editmode");

  for(let element of formElements) {
    element.toggleAttribute("disabled");
  }
}