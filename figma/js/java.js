
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
  
    let bloodTypeElements = document.querySelectorAll(".bloodType");
    let bloodIdElements = document.querySelectorAll(".bloodid");
  
    for (var i = 0; i < bloodTypeElements.length; i++) {
      bloodTypeElements[i].innerHTML = bloodType;
    }
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
// function showBloodType(data) {
//     var selectedBloodId = getBloodId();
//     var bloodType = "";
  
//     for (var i = 0; i < data.bloodType.length; i++) {
//       var bloodObj = data.bloodType[i];
  
//       if (bloodObj.id == selectedBloodId) {
//         bloodType = bloodObj.Type;
//         break;
//       }
//     }
  // //  document.querySelectorAll(".bloodType").innerHTML = bloodType;
  //  let bloodType = document.querySelectorAll(".bloodType");
  //  let bloodId = document.querySelectorAll(".bloodid");

  //  for (var i = 0; i < bloodType.length; i++){
  //   bloodType[i].innerHTML = data.bloodType.Type;
  //  }
  // }

  fetch("data/bloodType.json")
  .then(response => response.json())
  .then(data => showBloodType(data));





// function updateCategory() {
//   var selectElement = document.getElementById('typeDropdown');
//   var selectedValue = selectElement.value;

//   // Create a new form data object
//   var formData = new FormData();
//   formData.append('category', selectedValue);

//   // Make a POST request to your PHP file
//   fetch('your_php_file.php', {
//     method: 'POST',
//     body: formData
//   })
//   .then(response => response.text())
//   .then(data => {
//     // Handle the response if needed
//     console.log(data);
//   })
//   .catch(error => {
//     // Handle any errors that occur during the request
//     console.error(error);
//   });
// }


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