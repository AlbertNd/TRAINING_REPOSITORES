  // Lorsque l'utilisateur scrolle la page, la fonction "myFunction" s'execute
  window.onscroll = function() {myFunction()};

  // Récuperation de la barre de navigation par son id: idBarNavContenu
  var navbar = document.getElementById("navbar");

  // Récupperation dela position décalée de la barre de navigation
  var sticky = navbar.offsetTop;

  // Ajout de la classe "stycky" à la barre de navigation lorsque l'utilisateur atteind 

  function myFunction() {
      if (window.pageYOffset >= sticky) {
          navbar.classList.add("sticky")
      } else {
          navbar.classList.remove("sticky");
      }
  }