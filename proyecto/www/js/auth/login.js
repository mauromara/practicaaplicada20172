var myUser = localStorage.getItem("myPoliUser");

//reemplaza el init, porque hacen conflicto
document.addEventListener('deviceready', function(event) {
  if (myUser) {
    window.location.replace("content.html");
  }
});

var authUser = function() {
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;

  //Toca buscar una forma segura ya que hacer esta comparación acá no lo es
  var urlReq = "http://10.0.2.2:8080/random?";
  //urlReq = "http://192.168.0.13:8080/random?";
  urlReq += "username=";
  urlReq += username;
  urlReq += "&";
  urlReq += "password=";
  urlReq += password;
  urlReq += "&";
  urlReq += "uuid=";
  urlReq += device.uuid;

  $.ajax({
    url: urlReq,
    timeout: 3000,
    method: 'POST',
    error: function() {
      ons.notification.alert('Problemas con la conexión');
    }
  }).done(function(data, textStatus, jqXHR) {
    if (data.token) {
      localStorage.setItem('myPoliUser', data.token);
      window.location.replace("content.html");
    }
    else {
      ons.notification.alert('Constraseña no valida');
    }
  });
};
