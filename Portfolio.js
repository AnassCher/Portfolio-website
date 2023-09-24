
function goTo(number){
    if(number == 1)
        document.querySelector('#projects').scrollIntoView({
            behavior: 'smooth'})
    else{
        document.querySelector('#contact').scrollIntoView({
            behavior: 'smooth'})
    }
}
function menu(){
    var x = document.getElementById('Navigation');
    var y = document.getElementById('mobile-menu');
    var z = document.querySelectorAll('a')
    var w = document.getElementById('menu-icon')
    var h = document.getElementById('logo')
    const computedStyle = window.getComputedStyle(x);

// Retrieve the value of the display property
    const displayValue = computedStyle.getPropertyValue('display');

    console.log(displayValue);
    
    if (displayValue === "block" || displayValue =="grid") {
        x.style.display = "none";
        y.style.marginTop = "0px";
      } 
      else if(displayValue == "none"){
        h.style.height ="51.91px";
        h.style.paddingBottom ="5px"
        x.style.width = "150px";
        x.style.marginRight ="-1rem"
        x.style.backgroundColor = "#333";
        x.style.display ="grid";
        x.style.marginTop ="1rem"
        x.style.textAlign ="center";
        y.style.marginTop = "132px";
        y.style.alignItems = "center";
        z.forEach(link => {link.style.margin ="0"; link.style.marginTop="5px"});
        w.style.textAlign = "right"
      }
}


function contact(event) {
  event.preventDefault();
  
  const name = document.getElementsByName("name")[0].value;
            const email = document.getElementsByName("email")[0].value;
            const message = document.getElementsByName("message")[0].value;
            if(name != "" && email != "" && message != ""){
              const formData = new FormData();
              formData.append("name", name);
              formData.append("email", email);
              formData.append("message", message);
    
              // Send data to server
              fetch("Portfolio.php", {
                method: "POST",
                body: formData
              }).then(response => response.text())
                .then(data => {
                  console.log(data); // Response from server
                });
                document.getElementsByName("name")[0].value ="";
                document.getElementsByName("email")[0].value ="";
                document.getElementsByName("message")[0].value ="";

            }
            else{
              alert("fill all fields")
            }
}



