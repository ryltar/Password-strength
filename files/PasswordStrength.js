var currentPage = null;

$(document).ready( function(){
  var map = new Map();
  map.set("account_page.php", ".row");
  map.set("verify.php", ".widget-main");
  checkPassword(map);
});

function checkCurrentLocation(targetPages){
  let flag = false
  for (var [key, value] of targetPages){
    if(window.location.pathname.split("/").slice(-1)[0] === key){
      currentPage = value;
      return true;
    }
  }
  if(!flag){
    return false;
  }
}

function displayAlert(htmlElement){
  let alert = '<div id="passwordAlert" class="alert alert-danger">'+
    '<ul><li><strong>Warning : </strong>'+
    'Your password is not very strong. Your password : '+
    '<ul><li><strong>MUST</strong> contain at least 8 characters</li>'+
    '<li><strong>MUST</strong> contain at least one uppercase letter</li>'+
    '<li><strong>MUST</strong> contain at least one lowercase letter</li>'+
    '<li><strong>MUST</strong> contain at least one number</li>'+
    '<li><strong>MUST</strong> contain at least one special characters</ul></ul>';
  $(htmlElement).prepend($(alert))
  $(".login-container").parent().removeClass('col-md-3').addClass('col-md-6');
  $(".login-container").parent().removeClass('col-sm-offset-1').addClass('col-sm-offset-2');
  $("#passwordAlert").fadeIn('fast').delay(8000).fadeOut('slow');
}

function checkPassword(map){
  if(checkCurrentLocation(map)){
    console.log(currentPage);
    $("#account-update-form").submit(event =>{
      var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
      if(!strongRegex.test($("#password").val())){
        event.preventDefault();
        displayAlert(currentPage);
      }
    })
  }
}