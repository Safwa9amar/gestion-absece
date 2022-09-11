let justfyAbs = document.querySelectorAll('select');
  justfyAbs.forEach(el => {
    el.addEventListener('change', (e) => {
      let absId = e.target.id;
      let just = e.target.value

      let targ = e.target.parentElement.nextElementSibling.firstElementChild;

      if (e.target.value == 'oui') {
        targ.removeAttribute('disabled');
        targ.addEventListener('change', (event) => {
         
              $.ajax({
                url: "/php/justify_abs.php",
                type: "post",
                data: {
                  absJust: event.target.value,
                  absId: absId,
                  just: just
                },
                success: function(response) {
                  console.log(response);
                  window.location.reload();
                },
              });
        })
      } 
      
      else if (e.target.value == 'non') {
        targ.setAttribute('disabled', true);
        $.ajax({
          url: "/php/justify_abs.php",
          type: "post",
          data: {
            absId: absId,
            Nonjust: 'non'
          },
          success: function(response) {
            console.log(response);
            window.location.reload();

          },
        });
      }
    })
  });