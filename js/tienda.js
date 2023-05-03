let fichero = new URL("https://my-json-server.typicode.com/Pcb1230/GrafikGames/juegos")

var juegos = [];

function busqueda(){
  var dato = document.getElementById("buscar").value;
  document.getElementById("btnbusqueda").value=dato;
  // let nombre = document.getElementById("buscar").value;
  // let row = document.getElementById("cuerpo");
  // let col = row.getElementsByClassName("col-md-3");
  
    // xhttp = new XMLHttpRequest();
    // xhttp.open("GET",fichero,true);
    // xhttp.onreadystatechange = function(){
    //   for(let i=0;i<col.length;i++){
    //       col[i].style.display="block";
    //   }
    //     if(this.readyState == 4 && this.status == 200){//We check that all is correct
    //       let datos = JSON.parse(this.responseText);//We create a variable and we parse the content of the json by responseText
    //       for(let objeto of datos){//We create a variable objeto where we put the data of the variable datos
    //           if(objeto.titulo==nombre){
    //             id = objeto.id;
    //             for(let i=0;i<col.length;i++){
    //               if(id!=col[i].id){
    //                 col[i].style.display="none";
    //                 row.className="row border-top mt-5 productos justify-content-center"
    //               }
    //             }
    //         }
    //       }
    //     }
    //   }
    // xhttp.send();
}

function vacio(){
  let dato = document.getElementById("buscar").value;
  if(dato==""){
  //location.reload()
  window.location.href="juego.php";
  }
}

function cargar(){
  xhttp = new XMLHttpRequest();
  xhttp.open("GET",fichero,true);
  xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
          let datos = JSON.parse(this.responseText);
          let id=1;
        for(let objeto of datos){
          juegos.push(objeto.titulo)
        }
      }
  }
  xhttp.send();
}

function autocomplete(inp, arr) {
  var currentFocus;
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      a = document.createElement("div");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      this.parentNode.appendChild(a);
      for (i = 0; i < arr.length; i++) {
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          b = document.createElement("DIV");
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          b.addEventListener("click", function(e) {
              inp.value = this.getElementsByTagName("input")[0].value;
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });

  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        
        currentFocus++;

        addActive(x);
      } else if (e.keyCode == 38) { //up

        currentFocus--;

        addActive(x);
      } else if (e.keyCode == 13) {
        
        e.preventDefault();
        if (currentFocus > -1) {

          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    
    if (!x) return false;
   
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);

    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {

    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {

    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

autocomplete(document.getElementById("buscar"), juegos);