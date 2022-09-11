$('.ui.fluid.dropdown').dropdown();

const prof_name = document.getElementById('prof_name');
const prof_user = document.getElementById('prof_user');
const prof_pass = document.getElementById('prof_pass');
prof_pass.setAttribute('value', Math.floor(Math.random(10) * 1000000))
// const passConfirm = document.getElementById('passConfirm');
function showPass() {

  if (prof_pass.getAttribute('type') == 'password') {
    prof_pass.setAttribute('type', 'text');
  } else {
    prof_pass.setAttribute('type', 'password');
  }
}

const add_prof = document.getElementById('add_prof');

const submitAddition = document.getElementById('submitAddition');
const classModule = document.getElementById('append_modules');
const select_spec = document.getElementById('select_spec');
const select_spec_prof = document.getElementById('select_spec_prof');
const selectDepart = document.getElementById('selectLoginFac');

add_prof.addEventListener('click', (event) => {

  let x = document.getElementById('append_modules_prof')
  let y = x.parentElement
  let classListModules = y.querySelectorAll('.ui.label.transition.visible')
  const ModuleListNames = [];
  classListModules.forEach(element => {
    ModuleListNames.push(element.textContent);
  });
  const ModuleListIds = [];
  classListModules.forEach(el => {
    ModuleListIds.push(el.getAttribute('data-value'));
  });
  let Prof_person_data = '?&prof_name=' + prof_name.value + '&prof_user=' + prof_user.value + '&prof_pass=' + prof_pass.value + '&prof_spe=' + select_spec_prof.value + '&selectDepart=' + selectDepart.value;

  $.ajax({
    url: "/php/add_prof.php",
    type: "get",
    data: Prof_person_data,
    success: function(response) {
      // window.location.reload();
      document.getElementById('addProfMessege').innerHTML = response;
      delMessegeParent();
    },
  });
  $.ajax({
    url: "/php/add_prof.php",
    type: "post",
    data:   {
      ModuleListNames : ModuleListNames,
      ModuleListIds : ModuleListIds,
      select_spec_prof : select_spec_prof.value,
      prof_user : prof_user.value
    },
    success: function(addprofResponse) {
      // window.location.reload();
      document.getElementById('addProfModuleMessege').innerHTML = addprofResponse;
      delMessegeParent();
    },
  });

})




select_spec.addEventListener('change', (event) => {
  $.ajax({
    url: "/php/select_module.php",
    type: "post",
    data: {
      data: select_spec.value
    },
    success: function(selectModuleResponseClass) {
      document.querySelector('#append_modules').innerHTML = selectModuleResponseClass;
    },
  });
})

select_spec_prof.addEventListener('change', (event) => {
  $.ajax({
    url: "/php/select_module.php",
    type: "post",
    data: {
      data: select_spec_prof.value
    },
    success: function(selectModuleResponseProf) {
      document.querySelector('#append_modules_prof').innerHTML = selectModuleResponseProf;
    },
  });
})




submitAddition.addEventListener('click', (event) => {
  let x = document.getElementById('select_etudiants')
  let y = x.parentElement
  let classListEtudiant = y.querySelectorAll('.ui.label.transition.visible')
  const etud_list = [];
  classListEtudiant.forEach(element => {
    etud_list.push(element.textContent);
  });
  console.log(etud_list);
  const etud = [];
  classListEtudiant.forEach(el => {
    etud.push(el.getAttribute('data-value'));
  });
  
  $.ajax({
    url: "/php/add_class.php",
    type: "post",
    data: {
      module: classModule.value,
      list_etudiant: etud,
      nom_etud_list: etud_list
    },
    success: function(addClassresponse) {
      let messege = `
      <div class="ui primary message">
        <i class="close icon"></i>
        <div class="header">
        ${addClassresponse}
        </div>
     </div>
      `;
      document.getElementById('class_messege').innerHTML = messege;
      delMessegeParent();
    },
  });

})
function delMessegeParent(){
let closeMessage = document.querySelectorAll('.ui.message i.close.icon')
closeMessage.forEach(el => {
  el.addEventListener('click',(e)=>{
    e.target.parentElement.remove()

  })

});
}