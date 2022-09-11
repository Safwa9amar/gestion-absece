// const tableEtudiant = document.getElementById("tableEtudiant");
// const tr = tableEtudiant.querySelectorAll("tr");
const delRow = document.querySelectorAll("#delTrow");
const edtiRow = document.querySelectorAll("#editTrow");
//
const showOper = document.getElementById("operations");
const SaveEdition = document.getElementById("checkRwo");
//function to use
const equals = (a, b) => JSON.stringify(a) === JSON.stringify(b);

Globaleventlisterner("click", delRow, (el, ev) => {
  let delbtn = el.parentElement.parentElement.querySelector("[etId]");

  console.log(ev.target, el, delbtn.getAttribute("etId"));

  $(".ui.basic.test.modal")
    .modal({
      closable: false,
      onDeny: function () {},
      onApprove: function () {
        const data = delbtn.getAttribute("etId");
        console.log(data);

        $.ajax({
          url: "php/edit_etudiant.php",
          type: "post",
          data: { data: data },
          success: function (response) {
            window.location.reload();
          },
        });
      },
    })
    .modal("show");
});
// }):

Globaleventlisterner("click", edtiRow, (el, ev) => {
  edtiOptions(el, ev);
});

function edtiOptions(el, ev) {
  el.parentElement.parentElement.setAttribute("editedTr", true);
  //
  el.parentElement.parentElement.setAttribute("contentEditable", true);
  el.parentElement.parentElement.classList.add("ui", "olive", "message");

  document.querySelectorAll("#checkRwo").forEach((element) => {
    element.parentNode.setAttribute("contentEditable", false);
  });
  document.querySelectorAll("#editTrow").forEach((element) => {
    element.parentNode.setAttribute("contentEditable", false);
  });
  document.querySelectorAll("#delTrow").forEach((element) => {
    element.parentNode.setAttribute("contentEditable", false);
  });

  const editedTrAttr = document.querySelectorAll("[editedTr]");

  Globaleventlisterner(
    "mouseleave",
    editedTrAttr,
    (el, ev) => {
      _RecDateChane(el, ev);
    },
    true
  );
}

function _RecDateChane(el, event) {
  let oldArr = [];

  let newarr = el.children;

  for (let i = 2; i < newarr.length; i++) {
    oldArr.push(newarr[i].getAttribute("origin-value"));
  }

  oldArr.splice(9, 10);

  const filtredOldarr = oldArr.filter((val) => val != "");

  // let arr = el.innerText.split();
  let arr = el.innerText.split(/(\t+|\n+)/);

  const newfiltered = arr.filter(function (value, index, arr) {
    // return value > " ";
    return value.trim().length > 0;
  });
  console.table(filtredOldarr);
  console.table(newfiltered);

  if (equals(filtredOldarr, newfiltered)) {
    // resetOriginData(el,filtredOldarr)
    el.removeAttribute("contentEditable");
    el.removeAttribute("editedTr");
    el.classList.remove("ui", "olive", "message");
    el.querySelector("i").classList.remove("green");
  } else {
    el.querySelectorAll("i")[0].classList.add("green");
    el.querySelectorAll("i")[1].classList.add("red");
    el.querySelectorAll("a")[1].addEventListener(
      "click",
      () => {
        resetOriginData(el, true);
      },
      { once: true }
    );
    el.querySelectorAll("a")[0].addEventListener(
      "click",
      (event) => {
        $(".ui.basic.test.modal")
          .modal({
            closable: false,
            onDeny: function () {
              resetOriginData(el, true);
            },
            onApprove: function () {
              resetOriginData(el);

              let DataObj = {
                id: el.querySelectorAll("a")[0].getAttribute("etId"),
                num_inscr: newfiltered[0],
                pass: newfiltered[1],
                nom: newfiltered[2],
                prenom: newfiltered[3],
                dob: newfiltered[4],
                fac: newfiltered[5],
                dep: newfiltered[6],
                spec: newfiltered[7],
                grp: newfiltered[8],
              };
              var jsonD = JSON.stringify(DataObj);
              // alert(jsonD)
              $.ajax({
                url: "php/edit_etudiant.php",
                type: "post",
                data: { json: jsonD },
                success: function (response) {
                  // console.log(response)
                  window.location.reload();
                },
              });
              // SenDataTodb();
            },
          })
          .modal("show");
      },
      { once: true }
    );
  }
}

function resetOriginData(el, bol) {
  el.removeAttribute("contentEditable");
  el.removeAttribute("editedTr");
  el.classList.remove("ui", "olive", "message");
  el.querySelector("i").classList.remove("green");
  el.querySelectorAll("i")[1].classList.remove("red");

  if (bol === true) {
    el.querySelectorAll("[origin-value]").forEach((el) => {
      el.textContent = el.getAttribute("origin-value");
    });
  }
}

function Globaleventlisterner(type, selector, callback, runBol) {
  selector.forEach((element) => {
    element.addEventListener(
      type,
      (event) => {
        callback(element, event);
      },
      { once: runBol }
    );
  });
}
