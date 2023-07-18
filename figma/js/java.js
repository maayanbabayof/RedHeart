
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
        bloodType = bloodObj.bloodType;
        break;
      }
    }
    document.querySelector("#bloodType").innerHTML = bloodType;
  }

  fetch("data/bloodType.json")
  .then(response => response.json())
  .then(data => showBloodType(data));




  const typeDropdown = document.getElementById('typeDropdown');


typeDropdown.addEventListener('change', function () {
    const selectedBloodId = typeDropdown.value;
    filterType(selectedBloodId);
});

function filterType(bloodType) {
    const types = document.getElementsByClassName('type');
    for (let i = 0; i < bloodType.length; i++) {
        const type = bloodType[i];
        const bloodType = type.dataset.Type;
        if (Type === '' || bloodType === Type) {
            type.style.display = 'block';
        } else {
            type.style.display = 'none';
        }
    }
}