function myFunction() {
    var x = document.getElementById("pass_two");
    if (x.type === "password") {
      x.type = "text";
      document.getElementById("second_eye").style.color='#11bd25';
    } else {
      x.type = "password";
      document.getElementById("second_eye").style.color='#7a797e';
    }
  }