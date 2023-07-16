
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

  
  var filterLabel = document.querySelector('label[for="filter-toggle"]');
  var selectField = document.getElementById('filter-select');

  
  filterLabel.addEventListener('click', function() {
  
    selectField.style.display = selectField.style.display === 'none' ? 'block' : 'none';
  });

 